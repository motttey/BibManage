<html>
<meta http-equiv="Content-Script-Type" content="text/javascript">
<link href='outputstyle.css' rel='stylesheet' type='text/css' />
<body>
<?php
error_reporting(E_ALL & ~E_NOTICE);
$post_check=$_POST['search'];
  //入力があるか否かの確認
if ($post_check != ""){
  //データベースへの接続
	$mysqli = new mysqli("127.0.0.1", "root", "0718", "webapp");
 	if (!$mysqli) {
   		exit('データベースに接続できませんでした。');
 	}
  //各入力の取得
 	$mysqli->set_charset('utf8');

 	//$abst = $_POST['abstract_q'];
 	$author = $_POST['author_q'];
 	$title =$_POST['title_q'];
 	$magazine = $_POST['magazine_q'];
 	$year =$_POST['year_q'];
 	$type = $_POST['type'];
 	$yeartype = $_POST['yeartype'];

 	//$titles =  explode (" ", $title);
  //$authors = explode (" ", $author);

  //最小限のクエリの生成
	if($type == 1){
		$query =  "SELECT * FROM webapp.bib join webapp.book on bib.bibindex = book.bibindex";
	}
	else if($type == 2){
		$query =  "SELECT * FROM webapp.bib join webapp.fullpaper on bib.bibindex = fullpaper.bibindex";

	}
	else if($type == 3){
 		$query =  "SELECT * FROM webapp.bib join webapp.shortpaper on bib.bibindex = shortpaper.bibindex";

	}
	else if($type == 0){
		//  $query =  "SELECT * from ((bib left join book on bib.bibindex=book.bibindex) left join fullpaper as fullpaper on bib.bibindex=fullpaper.bibindex)left join shortpaper as shortpaper on bib.bibindex=shortpaper.bibindex";
	}
  //タイトルについてのクエリの付加
	if($title!= null){
      //タイトルをスペースで分割
      $titles =  explode (" ", $title);
      //スペースの数だけクエリを付加
    	for($i = 0; $i < count($titles); $i++){
    		if($i == 0){
    			$query = $query . " WHERE title like '%" .$titles[0]. "%' ";
  		 	}
   		 	else{
     	 		$query = $query . " and title like '%" .$titles[$i]. "%' ";
    		}
   		}
  		
	}
/*
	if($abst != null){
 		$query = $query . " && abstract like '%" .$abstract. "%' ";
	}
*/ 
  //著者名についてのクエリの付加 
	if($author != null){
 		$query = $query . " && author like '%" .$author. "%' ";
	}
  
  //出版社名,大会名,掲載誌名についてのクエリの付加
	if($magazine != null){
  		if($type == 1){
    		$query = $query . " && publisher like '%" .$magazine. "%' ";
  		}else{
    		$query = $query . " && magazine like '%" .$magazine. "%' ";
  		}
	}
  //出版年についてのクエリの付加
	if($year != null){
  		if($yeartype == 1){
    		$query = $query . " && year >= " .$year ;
  		}else if ($yeartype ==2) {
    		$query = $query . " && year <= " .$year ;
   # code...
  		}else if($yeartype == 3){
   			$query = $query . " && year = " .$year ;
  		}
	}

	$result = $mysqli->query($query);
	//データが検索できた場合
	if (!$result) {
  		exit('データを検索できませんでした。');
	}else{
		echo "検索結果<br>";
	}

	$dup = 0;
	while ($data = mysqli_fetch_array($result)) {
  //重複判定
  	if($data['bibindex'] == $dup){
    	continue;
  	}else{
    //文献のタイプによって分岐
 		if($data['bibtype'] == 1){
   			//クエリの生成,表示についてはwebapp_main.phpと同様
   	 		$bookquery = 'select * from book where bibindex = '.$data['bibindex'] ; 
    		$bookresult = $mysqli->query($bookquery);
    		$bookdata = mysqli_fetch_array($bookresult);
    		echo '<h3 style="display:inline">【' .$bookdata['bibindex'] .'】 </h3><h1 style="display:inline">'. $bookdata['title'] . '</h1><br>';
    		$authorquery = 'select author,authorindex from book where bibindex = '.$data['bibindex'] ; 
    		$authorresult = $mysqli->query($authorquery);
    		echo '著者名:';
    		while ($authordata = mysqli_fetch_array($authorresult)) {    
      		//$author = " ";
      			if($authordata['authorindex'] == 1){
        			$author = $authordata['author'];
      			}else{
        			$author .= ", " . $authordata['author'];
      			}  
    	}
      	echo '<h2 style="display:inline"> ' .$author. '</h2> ' ;
      	echo '<br>出版社名:<h3 style="display:inline">' .$bookdata['publisher'] . '</h3><br>' ;
      	echo '出版年:<h3 style="display:inline">' .$data['year'] . '</h3><br>';

		}else if($data['bibtype'] == 2){
    		$fullpaperquery = 'SELECT * FROM fullpaper where bibindex = '.$data['bibindex']; 
    		$fullpaperresult = $mysqli->query($fullpaperquery);
    		$fullpaperdata = mysqli_fetch_array($fullpaperresult);

    		echo '<h3 style="display:inline">【' .$fullpaperdata['bibindex'] .'】 </h3><h1 style="display:inline">'. $fullpaperdata['title'] . '</h1><br>';
    		$authorquery = 'select author,authorindex from fullpaper where bibindex = '.$data['bibindex'] ; 
    		$authorresult = $mysqli->query($authorquery);
    		echo '著者名:';
    		while ($authordata = mysqli_fetch_array($authorresult)) {    
      	//$author = " ";
      			if($authordata['authorindex'] == 1){
        			$author = $authordata['author'];
      			}else{
        			$author .= ", " . $authordata['author'];
      			}  
    		}
      		echo '<h2 style="display:inline"> ' .$author. '</h2> ' ;
    		echo '<br>掲載誌名:<h3 style="display:inline">' .$fullpaperdata['magazine'] . '  第'.$fullpaperdata['vol']. '巻 第'  .$fullpaperdata['no']. '号</h3><br>' ;
     		echo '掲載年:<h3 style="display:inline">' .$data['year'] . '</h3><br>';
     		echo '掲載ページ:<h3 style="display:inline">'.$fullpaperdata['page']. '</h3><br>';
  
  		}else if($data['bibtype'] == 3){
    		$shortpaperquery = 'SELECT * FROM shortpaper where bibindex = '.$data['bibindex']; 
    		$shortpaperresult = $mysqli->query($shortpaperquery);
    		$shortpaperdata = mysqli_fetch_array($shortpaperresult);

    		echo '<h3 style="display:inline">【' .$shortpaperdata['bibindex'] .'】</h3><h1 style="display:inline">'. $shortpaperdata['title'] . '</h1><br>';
      		$authorquery = 'select author,authorindex from shortpaper where bibindex = '.$data['bibindex'] ; 
      		$authorresult = $mysqli->query($authorquery);
      		echo '著者名:';
    		while ($authordata = mysqli_fetch_array($authorresult)) {    
      //$author = " ";
      			if($authordata['authorindex'] == 1){
        			$author = $authordata['author'];
      			}else{
        			$author .= ", " . $authordata['author'];
     			}  
    		}
    		echo '<h2 style="display:inline"> ' .$author. '</h2> ' ;
    	  	echo '<br>大会名:<h3 style="display:inline">' .$shortpaperdata['magazine'] . '</h3><br>' ;
      		echo '掲載年:<h3 style="display:inline">' .$data['year']. '</h3><br>';

  		}else{
     		echo 'Unknown Type Article.</h3><br>';
  		}
    	$dup = $data['bibindex'];
	}
}

  //file_put_contents( 'searchresult.html', ob_get_contents() );

  //データベースへの接続の終了
	$con = mysqli_close($mysqli);
	if (!$con) {
		exit('データベースとの接続を閉じられませんでした。');
	}

}else{
	echo "ここに検索結果が表示されます。";
}

?>

</body>
</html>
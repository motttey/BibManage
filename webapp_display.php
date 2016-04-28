<html>
<meta http-equiv="Content-Script-Type" content="text/javascript">
<link href='outputstyle.css' rel='stylesheet' type='text/css' />
<body>
<?php
//データベースへの接続
$mysqli = new mysqli("127.0.0.1", "root", "0718", "webapp");
if (!$mysqli) {
	exit('データベースに接続できませんでした。');
}
$mysqli->set_charset('utf8');
//bibテーブルへの暮裏
$query = 'select * from bib order by bibindex ASC';
$result = $mysqli->query($query);
//表示
while ($data = mysqli_fetch_array($result)) {
    //文献タイプによって分岐,文献1つごとに判定する
  	if($data['bibtype'] == 1){
      //クエリの生成
    	$bookquery = 'select * from book where bibindex = '.$data['bibindex'] ; 
   		$bookresult = $mysqli->query($bookquery);
    	$bookdata = mysqli_fetch_array($bookresult);
      //各データの取得と表示
    	echo '<h3 style="display:inline">【' .$bookdata['bibindex'] .'】 </h3><h1 style="display:inline">'. $bookdata['title'] . '</h1><br>';
    	$authorquery = 'select author,authorindex from book where bibindex = '.$data['bibindex'] ; 
    	$authorresult = $mysqli->query($authorquery);
    	echo '著者名:';
    	while ($authordata = mysqli_fetch_array($authorresult)) {    
      //複数著者名を連結させて表示
    	  	if($authordata['authorindex'] == 1){
      			$author = $authordata['author'];
      		}
      		else{
      			$author .= ", " . $authordata['author'];
      		}  
    	}
   		echo '<h2 style="display:inline"> ' .$author. '</h2> ' ;
    	echo '<br>出版社名:<h3 style="display:inline">' .$bookdata['publisher'] . '</h3><br>' ;
    	echo '出版年:<h3 style="display:inline">' .$data['year'] . '</h3><br>';
  //echo "<br>";
  //echo nl2br(htmlspecialchars($data['abstract'], ENT_QUOTES)) . '<br><br>';

  	}else if($data['bibtype']==2){
    
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

  //echo "<br>";
  //echo nl2br(htmlspecialchars($data['abstract'], ENT_QUOTES)) . '<br><br>';
  
  	}else if($data['bibtype']==3){
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
  //echo nl2br(htmlspecialchars($data['abstract'], ENT_QUOTES)) . '<br><br>';
  	}else{
    	echo 'Unknown Type Article.</h3><br>';
  	}
 // echo "<br></p>";
}
//データベースへの接続の終了
$con = mysqli_close($mysqli);
if (!$con) {
	exit('データベースとの接続を閉じられませんでした。');
}

?>

</body>
</html>
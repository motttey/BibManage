<?php
//データベースへの接続
$mysqli = new mysqli("127.0.0.1", "root", "password", "webapp");
if (!$mysqli) {
  exit('データベースに接続できませんでした。');
}
	//データベースのレコード数を算出し文献番号を決定
	$query = "SELECT * FROM bib";
	$countres = $mysqli->query($query);
	$count = $countres->num_rows;
	$bibindex = $count + 1;

    $mysqli->set_charset('utf8');
    //フォームからの入力値
    $type = $_POST['type'];
	$year 	 = $_POST['year'];

	$title   = $_POST['title'];
	$author  = $_POST['author'];


	//	$abstract = $_POST['abstract'];

	//authorをカンマ記号で分割
	$authors =  explode ( "," , $author);

	//bibへのデータに登録
	$result = $mysqli->query("INSERT INTO bib(bibindex, bibtype, year) VALUES($bibindex,$type,$year)");
	if (!$result) {
  		exit('データを登録できませんでした。');
	}
	//文献の種類により分岐
	if($type == 1){
		$publisher = $_POST['publisher'];
		//複数authorを別レコードとして登録
		for($i = 0; $i < count($authors); $i++){
			$authorindex = $i + 1;
			$result_book = $mysqli->query("INSERT INTO book(bibindex,authorindex,title,author,publisher) 
				VALUES($bibindex,$authorindex,'$title','$authors[$i]','$publisher')");
			if (!$result_book) {
  				exit('データを登録できませんでした。');
			}
		}	

	}else if($type == 2){
		$magazine = $_POST['magazine_f'];
		$vol 	= $_POST['vol'];
		$no 	= $_POST['issue'];
		$page 	= $_POST['page'];

		for($i = 0; $i < count($authors); $i++){
			$authorindex = $i + 1;
			$result_fullpaper= $mysqli->query("INSERT INTO fullpaper(bibindex,authorindex,title,author,magazine,vol,no,page) 
				VALUES($bibindex,$authorindex ,'$title','$authors[$i]','$magazine',$vol,$no,'$page')");
			if (!$result_fullpaper) {
  				exit('データを登録できませんでした。');
			}
		}	

	}else if($type == 3){
		$magazine = $_POST['magazine_s'];


		for($i = 0; $i < count($authors); $i++){
			$authorindex = $i + 1;
			$result_shortpaper = $mysqli->query("INSERT INTO shortpaper(bibindex, authorindex,title,author,magazine) 
				VALUES($bibindex,$authorindex,'$title','$authors[$i]','$magazine')");
			if (!$result_shortpaper) {
  				exit('データを登録できませんでした。');  
  			}	
  		}
  	}
  	//データベースへの接続の終了
	$con = mysqli_close($mysqli);
	if (!$con) {
  		exit('データベースとの接続を閉じられませんでした。');
	}

	//メイン画面へ戻る
	header("Location: webapp_main.php");
?>

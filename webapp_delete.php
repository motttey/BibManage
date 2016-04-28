<?php
//データベースへの接続
$mysqli = new mysqli("127.0.0.1", "root", "password", "webapp");
if (!$mysqli) {
	exit('データベースに接続できませんでした。');
}

$mysqli->set_charset('utf8');
//削除する文献番号
$bibindex=$_POST["no"];
//クエリの生成と実行
$res_type = $mysqli->query("SELECT bibtype FROM bib WHERE bibindex = $bibindex");
$res_val = mysqli_fetch_row($res_type);
//bibテーブルから削除
$result = $mysqli->query("DELETE FROM bib WHERE bibindex = $bibindex");
if (!$result) {
	exit('データを削除できませんでした。');
}
//文献タイプごとの削除処理
if($res_val[0] == 1 ){
	$book_result = $mysqli->query("DELETE FROM book WHERE bibindex = $bibindex");
	if (!$book_result) {
  		exit('データを削除できませんでした。');
	}
}
else if($res_val[0] == 2 ){
	$fullpaper_result = $mysqli->query("DELETE FROM fullpaper WHERE bibindex = $bibindex");
	if (!$fullpaper_result) {
  		exit('データを削除できませんでした。');
	}
}
else if($res_val[0] == 3 ){
	$shortpaper_result = $mysqli->query("DELETE FROM shortpaper WHERE bibindex = $bibindex");
	if (!$shortpaper_result) {
  		exit('データを削除できませんでした。');
	}

}

//接続の終了
$con = mysqli_close($mysqli);
if (!$con) {
	exit('データベースとの接続を閉じられませんでした。');
}

//メイン画面へと戻る
header("Location: webapp_main.php");
?>

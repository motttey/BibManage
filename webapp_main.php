<html>
<!--ヘッダ-->
<head><title>文献データベース</title><link href='style.css' rel='stylesheet' type='text/css' />
<meta http-equiv="Content-Script-Type" content="text/javascript">
<link href='style.css' rel='stylesheet' type='text/css' />
</head>
<body>
<!--ページ全体を中央揃え-->>
<div align = "center">
<!--見出し-->
<div class="about">  
	<div class="border">  
	<h3>文献データベース</h3><br>
	</div>
</div>
<!--表示機能-->
<div class="display">  
	<div class="border">  
  		<!--インラインフレーム-->
  		<iframe src="webapp_display.php" name="display" width="100%" height="100%">
  		</iframe>

	</div>
</div>
<!--登録機能-->
<div class="insert">  
	<div class="border">
  登録する文献の種類を選び、必要な項目を入力してください。<br>  
	<FORM  METHOD="post" ACTION="webapp_insert.php">
	<INPUT TYPE="submit" VALUE="登録"  name = "search">
  <!--ラジオボタンにより表示されるフォームの変更-->
  	<input type="radio" name="type" value="1" onclick="visible(1)" checked>書籍
  	<input type="radio" name="type" value="2" onclick="visible(2)" >論文
  	<input type="radio" name="type" value="3" onclick="visible(3)">研究発表
  	<br>
      <label for="title">タイトル:</label>
      <INPUT TYPE="text" NAME="title"><br>
      <label for="title">年:</label>
      <INPUT TYPE="text" NAME="year"><br>
      <label for="author">著者名(カンマ区切り):</label>
      <INPUT TYPE="text" NAME="author">
      <BR>
    <!--書籍-->
  	<div id="book"> 
 		<br>
      	<label for="publisher">出版社名:</label>
      	<INPUT TYPE="text" NAME="publisher"> <BR>
  	</div>
    <!--論文-->
  	<div id="fullpaper" style = "display:none;" > 
  	<br>
      <label for="magazine_f">雑誌名:</label>
      <INPUT TYPE="text" NAME="magazine_f">
      <label for="vol">巻:</label>
      <INPUT TYPE="text" NAME="vol" style="width:30px;"> 
      <label for="issue">号:</label>
      <INPUT TYPE="text" NAME="issue" style="width:30px;"> <BR>
      <label for="page">ページ数:</label>
      <INPUT TYPE="text" NAME="page"><br>
      <!-- <label for="abstract">Abst:</label>
      <textarea name="abstract" cols="50" rows="7"></textarea><BR> -->
  	</div>
    <!--研究発表-->
    <div id="shortpaper"  style = "display:none;"> 
  	　　<br>
      <label for="magazine_s">大会名:</label>
      <INPUT TYPE="text" NAME="magazine_s"><BR>
      <!-- <label for="abstract">Abst:</label>
      <textarea name="abstract" cols="50" rows="7"></textarea><BR> -->
 	</div>
   	</FORM>  
	</div>  
</div>

<div class="delete">  
	<div class="border">  
 	削除する文献の文献番号を入力してください。<br>
 
	<FORM METHOD="post" ACTION="webapp_delete.php">
 	<label for="no">番号:</label>
  	<INPUT TYPE="text" NAME="no" >
	<INPUT TYPE="submit" VALUE="削除" >
	</FORM>
 	
 	</div>  
</div>
<!--フォームの切り替えを行うvisible関数-->
<script>
function visible(num)
{
  if (num == 1)
  {
  	document.getElementById("book").style.display="block";
    document.getElementById("fullpaper").style.display="none";
    document.getElementById("shortpaper").style.display="none";

   
  }
  else if(num == 2)
  {
    document.getElementById("book").style.display="none";
    document.getElementById("fullpaper").style.display="block";
    document.getElementById("shortpaper").style.display="none";
  }
  else if(num == 3){
    document.getElementById("book").style.display="none";
    document.getElementById("fullpaper").style.display="none";
    document.getElementById("shortpaper").style.display="block";

  }
}

</script>
<!--検索機能-->
<div class="search">  
	<div class="border">  
    文献の種類を選んで、各項目に入力してください。<br>
		<FORM METHOD="post" ACTION = "webapp_select.php" target="select">
     	文献タイプ:
  		<!--<input type="radio" name="type" value="0" >指定しない-->
  		<input type="radio" name="type" value="1" checked>書籍
  		<input type="radio" name="type" value="2" >論文
  		<input type="radio" name="type" value="3" >研究発表<BR>
  		<BR>

  		<INPUT TYPE="submit" VALUE="検索"  name = "search">
    	<label for="title_q">タイトル:</label>
    	<INPUT TYPE="text" NAME="title_q"><BR>
		<BR>
      
      	<label for="author_q">著者名:</label>
     	<INPUT TYPE="text" NAME="author_q"> <BR>
      	<label for="magazine_q">雑誌名(出版社名):</label>
      	<INPUT TYPE="text" NAME="magazine_q"> <BR>
      	<!--<label for="abstract_q">Abst:</label>
      	<INPUT TYPE="text" NAME="abstract_q"> <BR>-->
      	<label for="yeartype">年:</label>
      	
      	<select name="yeartype" size="1" > 
	   		<option value="1" label="newer" selected>is later than </option>
    	  	<option value="2" label="prov" selected>is prior to </option>
      		<option value="3" label="equal" selected>is</option> 
      	</select>
      	<INPUT TYPE="text" NAME="year_q"><BR><BR>
		</FORM>

	
	</div>  
</div>

<!--検索結果-->
<div class="searchresult">  
	<div class="border">  
    <!--インラインフレーム-->
		<iframe src="webapp_select.php" name="select" width="100%" height="100%">
		</iframe>
	</div>
</div>

</div>
</body>
</html>
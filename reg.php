<?php 
session_start();
header("Content-Type: text/html; charset=utf-8");
	require_once("bd.php"); 
	$link = mysql_connect(DB_SERVER, DB_USER, DB_PASS);
	if (!$link) {
		die('Don\'t connect: ' . mysql_error());
	}
	$db_selected = mysql_select_db(DB_NAME, $link);
	if (!$db_selected) {
		die ('Don\'t connect to database: ' . mysql_error());
	}
	mysql_set_charset('utf8');
	$result = mysql_query($query);
	
$id = $_POST['id'];
$mail = $_POST['mail'];
$pass = $_POST['pass'];
$kod =rand(100000,999999);

$result2 = mysql_query ("INSERT INTO reg(id, mail, pass,kod,status) VALUES ('','$mail','$pass','$kod',0)");
if ($result2=='TRUE'){
		
$sql = "SELECT * FROM reg where id = (SELECT MAX(id) FROM reg)";
$result = mysql_query($sql);
$maxid = mysql_fetch_array($result);

	
echo "<link rel='stylesheet' type='text/css' href='bootstrap.min.css'> 
<div class='panel panel-primary'>
<div class='panel-heading'>Вы успешно зарегистрированы!
 Ваш пароль активации $kod, запомните его! </div>
 <a href=http://practika.ru/activ.php?id=$maxid[0]>Пройдите по ссылке: http://practika.ru/activ.php?id=$maxid[0]</a> </div>";
}
else {
echo "<script>alert(\"Ошибка! Вы не зарегистрированы.\");</script>";
}

?>
<br>
<input type="submit" value="На главную"onclick="javascript:window.location.href='news.php'" class="btn btn-primary">
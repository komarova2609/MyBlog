<?php 

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

if(isset($_POST['vhod'])){
$mail=$_POST['mail'];
$parol=$_POST['pass'];
$query=mysql_query("SELECT * FROM reg WHERE mail='$mail'", $link) or die(mysql_error());
$usersdata=mysql_fetch_array($query);
if($usersdata['pass']==$parol){
$chek=true;
$_SESSION['name']=$mail;
echo "<script>alert
(\"успешно!\");
function changeurl(){eval(self.location='news.php');}
window.setTimeout('changeurl();',1);</script>";
}
else{
echo"<p style=\"color:red;\" >Неверный логин или пароль!</p>";
}}
?>
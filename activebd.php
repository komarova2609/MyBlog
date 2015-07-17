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

$id_u = $_POST['id_u'];

$kod = $_POST['kod'];

$sql = "SELECT kod FROM reg where id = '$id_u'";
$result = mysql_query($sql);
$id_p = mysql_fetch_array($result);

if ($id_p[0]==$kod){
$result2 = mysql_query ("UPDATE reg SET status='1' WHERE id = '$id_u'");
if ($result2=='TRUE'){
echo "<script>alert(\"Пользователь активирован.\");</script>";
}
else {
echo "<script>alert(\"Пользователь не активирован.\");</script>";
}
}
else{
echo "<script>alert(\"Код введен не верно.\");</script>";
}
?>
<script language="JavaScript" type="text/javascript">
function changeurl(){eval(self.location="news.php");}
window.setTimeout("changeurl();",1);
</script>
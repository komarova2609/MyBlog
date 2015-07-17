<?php 
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
	
$comment = $_POST['comment'];
$pr = $_POST['id_z'];



$result2 = mysql_query ("INSERT INTO comment(id,id_z, comment) VALUES ('','$pr ','$comment')");
if ($result2=='TRUE'){
 echo "<script>alert(\"Комментарий успешно добавлен. $pr \");</script>";
}
else {
 echo "<script>alert(\"Комментарий не добавлен. $pr  $comment\");</script>";
}
?>

<script language="JavaScript" type="text/javascript">
function changeurl(){eval(self.location="anew.php?id=<? echo $pr; ?>");}
window.setTimeout("changeurl();",1);
</script>

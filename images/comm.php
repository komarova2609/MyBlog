<?php 
session_start();
	require_once("bd.php"); 
	$link = mysql_connect(DB_SERVER, DB_USER, DB_PASS);
	if (!$link) {
		die('Don\'t connect: ' . mysql_error());
	}
	$db_selected = mysql_select_db(DB_NAME, $link);
	if (!$db_selected) {
		die ('Don\'t connect to database: ' . mysql_error());
	}
	
echo " <div> <div><p> Отзыв: </p></div> ";
$id=1;
$sql = "SELECT * FROM comment where id =(SELECT MAX(id) FROM comment)";
$result = mysql_query($sql);
$maxid = mysql_fetch_array($result);
$pr = $_POST['id_z'];

$max=0;

while ($maxid['id'] >= $id){ 
$max=$maxid['id'];
$sql = "SELECT * FROM comment where id = '$max' && id_z= '$pr'";
$result = mysql_query($sql);
$otv = mysql_fetch_array($result);
$_SESSION['id'] = $otv['id'];
$_SESSION['id_z'] = $otv['id_z'];
$_SESSION['comment'] = $otv['comment'];


echo "
<div>   
<div><p>{$_SESSION['comment']}</p></div>
</div>";
$maxid['id']--;
}

?>

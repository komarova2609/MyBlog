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
$id=1;
$prov = $_GET['id'];
$sql = "SELECT * FROM news where id = '$prov' ";
$result = mysql_query($sql);
$otv = mysql_fetch_array($result);
$_SESSION['zag'] = $otv['zag'];
$_SESSION['text'] = $otv['text'];
$_SESSION['polntext'] = $otv['polntext'];
$_SESSION['image'] = $otv['image'];
echo " 
<div class='post'>
<div class='zag'><H2 ALIGN='center'>{$_SESSION['zag']}</H2></div> 
<div class='text'><p ALIGN='center'>{$_SESSION['polntext']}</p></div> 
<div class='img'> <img src='{$_SESSION['image']}' width='250'></div>
</div>";
$result=null;
?> 
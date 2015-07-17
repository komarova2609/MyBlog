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
$flag=1;
$id=1;
$sql = "SELECT * FROM news where id =(SELECT MAX(id) FROM news)";
$result = mysql_query($sql);
$maxid = mysql_fetch_array($result);

$max=0;
while ($maxid['id'] >= $id){ 
$max=$maxid['id'];
$sql = "SELECT * FROM news where id = '$max' ";
$result = mysql_query($sql);
$otv = mysql_fetch_array($result);
$_SESSION['id'] = $otv['id'];
$_SESSION['zag'] = $otv['zag'];
$_SESSION['text'] = $otv['text'];
$_SESSION['polntext'] = $otv['polntext'];
$_SESSION['image'] = $otv['image'];

$sql = "SELECT COUNT(*) FROM comment where id_z = '$max'";
$result = mysql_query($sql);
$coll = mysql_fetch_row($result);

if (isset($otv['image']) and $flag==1)
{
echo " <div class='post'>
<div class='zag'><H2 ALIGN='center'>{$_SESSION['zag']}</H2></div> 
<div class='text'><p ALIGN='center'> <a href='anew.php?id={$_SESSION['id']}'>{$_SESSION['text']} </a></p></div> 
<div class='img'> <img src='{$_SESSION['image']}' width='250'></div>
<div class='kolcom'><p>Комментариев к данной записи:{$coll[0]}</p></div> 
</div>";
$result=null; 
$flag=0;
}
else
{
echo " 
<div class='post1'>
<div class='zag1'><H2 ALIGN='center'>{$_SESSION['zag']}</H2></div> 
<div class='text1'><p ALIGN='center'> <a href='anew.php?id={$_SESSION['id']}'>{$_SESSION['text']}</a></p></div> 
<div class='img1'> <img src='{$_SESSION['image']}' width='250'></div><div class='kolcom1'>
<p>Комментариев к данной записи:{$coll[0]}</p></div> 
</div>";
$result=null;
$flag=1;
}
$result=null;
$maxid['id']--;
}
?>
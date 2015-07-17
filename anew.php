
<html>
<head>

<title>Новости</title>

<script language="javascript" type="text/javascript">
function validate() {
    
	var input = document.getElementById('comment');	// поиск элемента 'comment' 	
	
	// проверка заполнения имени
	if(input.value == null || input.value == '') {
		alert('Пожалуйста, введите коммантарий!');
		return false;								// отменяет отправку http-запроса и переход
	

					// отменяет отправку http-запроса и переход
	}



	return true;		// разрешит отправку http-запроса из формы
}
</script> 


<link rel="stylesheet" type="text/css" href="anew.css">
<link rel="stylesheet" type="text/css" href="bootstrap.min.css"> 
</head>

<body>


 <!--кусок,который раньше был в другом файле --> 
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
$_SESSION['id_z'] = $prov ;
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
<br>

<div class="panel-heading">
<h3 class="panel-title">Комментарии:</h3>
</div>

	<div class="panel-body">


<form action="commen.php" method="POST" class="form-horizontal">
	
		<div class="form-group">

<label for="comment" class="col-sm-1 control-label"> Ваш комментарий </label>
		<div class="col-sm-11">
	<input type="text" value="" maxlength="1000" name="comment" id="comment" class="form-control" />
	<input type="hidden" value="<?php echo $_GET['id'] ?>" maxlength="1000" name="id_z" class="form-control" />
				</div>
			</div>

		

			<div class="form-group">
				<label class="col-sm-1 control-label"></label>
				<div class="col-sm-10">
					<input type="submit" value="Отправить коммантарий" onclick="return validate();" class="btn btn-primary">				
</div>
</div>			
</form>	

<hr>
 <div>

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
$sql = "SELECT * FROM comment where id =(SELECT MAX(id) FROM comment)";
$result = mysql_query($sql);
$maxid = mysql_fetch_array($result);
$pr = $_GET['id'];

$max=0;

while ($maxid['id'] >= $id){ 
$max=$maxid['id'];
$sql = "SELECT * FROM comment where id = '$max' && id_z= '$pr'";
$result = mysql_query($sql);
$otv = mysql_fetch_array($result);
$_SESSION['id'] = $otv['id'];
$_SESSION['id_z'] = $otv['id_z'];
$_SESSION['comment'] = $otv['comment'];

if (isset($otv['id_z']))
{
echo "<div> <div><p> Отзыв: </p></div> 
<div>   
<div><p>{$_SESSION['comment']}</p></div>
</div>";
}
$maxid['id']--;
}

?>
</div>
<hr>


<input type="submit" value="Вернуться на главную страницу"
onclick="javascript:window.location.href='news.php'" class="btn btn-primary">	
</body>
</html>
 
<?php
session_start();
?>
<html>
<head>

	<title>Авторизация</title>

<script language="javascript" type="text/javascript">
	function validate() {
		var input = document.getElementById('mail');	// поиск элемента 'mail' 	
	
	// проверка заполнения mail
	if(input.value == null || input.value == '') {
		alert('Пожалуйста, введите mail!');
		return false;								// отменяет отправку http-запроса и переход
	

					// отменяет отправку http-запроса и переход
	}
	
	var input = document.getElementById('pass');	// поиск элемента 'pass' 	
	
	// проверка заполнения pass
	if(input.value == null || input.value == '') {
		alert('Пожалуйста, введите пароль!');
		return false;								// отменяет отправку http-запроса и переход
	

					// отменяет отправку http-запроса и переход
	}

	return true;		// разрешит отправку http-запроса из формы
}
</script> 

<link rel="stylesheet" type="text/css" href="bootstrap.min.css"> 


</head>
<body>

<div class="panel panel-primary">
	<div class="panel-heading">
<h3 class="panel-title">Авторизация</h3>
</div>
	<div class="panel-body">
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



<form action="avt.php" method="POST" class="form-horizontal">

<div class="form-group">
<label for="mail" class="col-sm-1 control-label"> e-mail </label>
		<div class="col-sm-11">
	<input type="text" value="" maxlength="100" name="mail" id="mail" class="form-control" />
		</div>
		</div>

<div class="form-group">

<label for="pass" class="col-sm-1 control-label"> Пароль </label>
		<div class="col-sm-11">
	<input type="text" value="" maxlength="30" name="pass" id="pass" class="form-control" />
				</div>
			</div>


			<div class="form-group">
				<label class="col-sm-1 control-label"></label>
				<div class="col-sm-10">
					<input type="submit" value="Авторизоваться" name="vhod" onclick="return validate();" class="btn btn-primary">				
</div>
</div>			
</form>	
<label class="col-sm-1 control-label"></label>
<input type="submit" value="Вернуться на главную страницу" onclick="javascript:window.location.href='news.php'" class="btn btn-primary">	
	</div>
</div>

</body>
</html>

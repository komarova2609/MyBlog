
<html>
<head>

	<title>Регистрация</title>

<script language="javascript" type="text/javascript">
	function validate() {
		var input = document.getElementById('mail');	// поиск элемента 'mail' 	
	
	// проверка заполнения mail
	if(input.value == null || input.value == '') {
		alert('Пожалуйста, введите mail!');
		return false;								// отменяет отправку http-запроса и переход
	

					// отменяет отправку http-запроса и переход
	}

var re = new RegExp("[а-яА-Я]");	// регулярное выражение для поиска русских символов
var foundString = re.exec(input.value);	// поиск подстроки по регулярному выражению

	if(foundString != null) {
		alert('Некорректный e-mail!: ' + foundString);
		return false;					// отменяет отправку http-запроса и переход
	}

	
	var input = document.getElementById('pass');	// поиск элемента 'pass' 	
	
	// проверка заполнения pass
	if(input.value == null || input.value == '') {
		alert('Пожалуйста, введите пароль!');
		return false;								// отменяет отправку http-запроса и переход
	

					// отменяет отправку http-запроса и переход
	}

var foundString = re.exec(input.value);
if(foundString) {
		alert('Найдены русские буквы!: ' );
		return false;					
	}
	
    if(input.value.length < 4) {
		alert('Слишком короткий пароль!: ' );
		return false;					
	}
	
	var input = document.getElementById('pass1');	// поиск элемента 'pass1' 	
	
	// проверка заполнения pass1
	if(input.value == null || input.value == '') {
		alert('Пожалуйста, подтвердите пароль!');
		return false;								// отменяет отправку http-запроса и переход
	

					// отменяет отправку http-запроса и переход
	}

var re = new RegExp("[а-яА-Я]");	// регулярное выражение для поиска русских символов
	var foundString = re.exec(input.value);	// поиск подстроки по регулярному выражению

	if(foundString != null) {
		alert('Некорректный пароль!: ' + foundString);
		return false;					// отменяет отправку http-запроса и переход
	}
	
	
	var input = document.getElementById('pass1'); // поиск элемента 'pas1'
var input1 = document.getElementById('pass'); // поиск элемента 'pas'

// проверка заполнения пароля
if(input1.value != input.value) {
alert(' Пароли не совпадают!!!');
return false; 
}

	return true;		// разрешит отправку http-запроса из формы
}
</script> 

<link rel="stylesheet" type="text/css" href="bootstrap.min.css"> 

</head>
<body>
<div class="panel panel-primary">
	<div class="panel-heading">
<h3 class="panel-title">Регистрация</h3>
</div>
	<div class="panel-body">


<form action="reg.php" method="POST" class="form-horizontal">

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

<label for="pass1" class="col-sm-1 control-label"> Подтвердите пароль </label>
		<div class="col-sm-11">
	<input type="text" value="" maxlength="30" name="pass1" id="pass1" class="form-control" />
				</div>
			</div>


			<div class="form-group">
				<label class="col-sm-1 control-label"></label>
				<div class="col-sm-10">
					<input type="submit" value="Зарегистрироваться" onclick="return validate();" class="btn btn-primary">				
</div>
</div>			
</form>	
<label class="col-sm-1 control-label"></label>
<input type="submit" value="Вернуться на главную страницу" onclick="javascript:window.location.href='news.php'" class="btn btn-primary">	
	</div>
</div>

</body>
</html>

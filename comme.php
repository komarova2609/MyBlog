

<html>

<head>
<title> Гостевая книга </title>


<script language="javascript" type="text/javascript">
<!-- кнопка
            function showAlert()
            {
               alert("Назад")
            }
       
</script>
	<script language="javascript" type="text/javascript">

function validate() {

var input = document.getElementById('imya');	// поиск элемента 'imya' 	
	
	// проверка заполнения фамилии
	if(input.value == null || input.value == '') {
		alert('Пожалуйста, введите имя!');
		return false;	

}


var re = new RegExp("[0-9]");				// регулярное выражение для поиска цифр
	var foundString = re.exec(input.value);			// поиск подстроки по регулярному выражению

	if(foundString != null) {
		alert('Недопустимый символ: ' + foundString);
		return false;								// отменяет отправку http-запроса и переход
	}

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

<link rel="stylesheet" type="text/css" href="bootstrap.min.css"> 

<style>
   body {
   background-image: url("images/фон.jpg");
   }  

A:hover { color: red;}   <!--при наведении курсора на ссылку,цвет меняется-->
 
 </style>
 
 
</head>

<body>

<div class="panel panel-primary">
	<div class="panel-heading">
<h3 class="panel-title">Отзывы:</h3>
</div>
	<div class="panel-body">


<form action="commentf1to.php" method="POST" class="form-horizontal">

<div class="form-group">

<label for="imya" class="col-sm-1 control-label"> Имя </label>
		<div class="col-sm-11">
	<input type="text" value="" maxlength="100" name="imya" id="imya" class="form-control" />
				</div>
			</div>
	
		<div class="form-group">

<label for="comment" class="col-sm-1 control-label"> Ваш комментарий </label>
		<div class="col-sm-11">
	<input type="text" value="" maxlength="1000" name="comment" id="comment" class="form-control" />
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
 <table border="0" cellspacing="20">

  <?php
  require_once 'commentf1.php';
  ?> 
</table> 
<hr>
<input type="button" class=ssilka onclick="window.location.href='index.html'" value="<< На главную страницу"/>

</body>

</html>
 
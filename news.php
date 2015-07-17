<?php
session_start();

?> 

<html>

<head>

<title> Главная </title>

<script language="javascript" type="text/javascript">

<!-- Дата
var d = new Date();

var month=new Array("января","февраля","марта","апреля","мая","июня",
"июля","августа","сентября","октября","ноября","декабря");


document.write(d.getDate()+ " " + month[d.getMonth()]
+ " " + d.getFullYear() + " г.");

</script> 

<link rel="stylesheet" type="text/css" href="bootstrap.min.css"> 
<link rel="stylesheet" type="text/css" href="news.css">  <!--ссылка на css --> 

</head>

<body>
<div class="panel panel-primary">

	<div class="panel-heading">
<h3 class="panel-title">МойБлог</h3>


<?php
if(isset($_SESSION['name'])){
$log = $_SESSION['name'];
echo"<div class='iavt'> <form method=\"post\" action=\"news.php\">
<p><label>$log<label></p>
<p><input class=\"knopka\" type =\"submit\" name=\"vihod\" id=\"vihod\" value=\"Выйти\" /></p>
</form> </div>";
if(isset($_POST['vihod'])){
unset($_SESSION['name']);
session_destroy();
echo "<meta http-equiv='Refresh' content='0; URL=news.php'>"; 
}
}
else
{
	echo "<a  class='regist' class=ssilka href=regist.php>Регистрация</a>
<a  class='avt' class=ssilka href=avt.php>Авторизация</a>";
}
?>
</div>


<div id="container">


<?php
require_once 'new.php';
?> 

</div>


<a href="#" id="toTop">Наверх</a>
<script src="http://ageta.ru/js/toTop.js" type="text/javascript"></script> 
<script type="text/javascript"> 
$(function() { 
$("#toTop").scrollToTop(); 
}); 
</script>

<p class='copyright'>©Комарова А.О. & Прог-Форс</p> 
</div>

</body>
</html>
 
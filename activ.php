<?php
session_start();
?> 

<html>
<head>
<title>Активация</title>
<link rel="stylesheet" type="text/css" href="bootstrap.min.css">

</head>
<body>
<div class="panel panel-primary">
<div class="panel-heading">

<h2 class="panel-title">Активация</h2>
</div>
<form action='activebd.php' method="POST" class="form-horizontal">
<div class="form-group"> 
<div class="col-sm-10">
<input type="text" placeholder="Введите свой проверочный код" value="" maxlength="1000" name="kod" id="kod" class="form-control" />
<input type="hidden" placeholder="" value="<?php echo $_GET['id'] ?>" maxlength="10000" name="id_u" class="form-control" />
</div>
</div>
<div class="form-group">
<div class="col-sm-10"> 
<input type="submit" value="Активировать" name="vhod" class="btn btn-primary"> 
<input type="submit" value="На главную"onclick="javascript:window.location.href='news.php'" class="btn btn-primary">
</div> 
</div> 
</form> 
</body>
</html>
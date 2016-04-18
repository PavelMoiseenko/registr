<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="avtoriz.php" method="POST">
	<input type="text" name = "login"><br><br>
	<input type="text" name = "password"><br><br>
	<input type="submit" value = "Войти" name = "submit">

	<a href = "registr.php">Регистрация</a><br><br><br>
</form>
</body>
</html>

<?php
if (empty($_SESSION['login']))
    {

    echo "Для доступа к ссылке авторизуйтесь<br><a href='#'>Эта ссылка  доступна только зарегистрированным пользователям</a>";
    }
    else
    {

    echo "Вы вошли на сайт под логином ".$_SESSION['login']."<br><a  href='http://unian.net'>ПОЗДРАВЛЯЮ!!! Теперь можете смотреть новости</a>";
    }
   

?>






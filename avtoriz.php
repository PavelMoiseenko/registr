<?php 
	session_start();
	header("Content-type:text/html;charset=utf-8");	
	

	if(isset($_POST["submit"])){
		if(!empty($_POST['login']) && !empty($_POST['password'])){
			$login = $_POST['login'];
			$password = $_POST['password'];
			

			if(to_identify($login, $password)){
				echo "Вы авторизовались под логином <b>$login</b><br>";
				echo "Теперь вы можете зайти на сайт и вам будут доступны некоторые опции <a href = 'index.php'>ГЛАВНАЯ</a>";
			}
			else{
				echo "Вам отказано в авторизации";
			}
			
			
		}
		else{
			echo "Вы не ввели значения логин/пароль";
		}	
	}


	function to_identify($login, $password){
		$fp = fopen("db_log.txt", "r");
		while($line = fgetcsv($fp)){
			$a[] = $line;
		}
		foreach ($a as $pairs) {
			if($pairs[0] == $login && $pairs[1] == $password){
				$_SESSION['login'] = $login; 
				return true;
			}
		}
		return false;
	}

?>

<form action="" method="POST">
	<input type="text" name = "login"><br><br>
	<input type="text" name = "password"><br><br>
	<input type="submit" value = "Авторизоваться" name = "submit">
</form>

<a href = "registr.php">Зарегистрироваться</a>
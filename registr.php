<?php 
	header("Content-type:text/html;charset=utf-8");	
	if(isset($_POST["submit"])){
		if(!empty($_POST['login']) && !empty($_POST['password'])){
			$login = $_POST['login'];
			$password = $_POST['password'];
			

			if(to_verify($login, $password)){
				record($login, $password);
				echo "Вы зарегистрированы под логином <b>$login</b><br>";
				echo "<a href = 'index.php'>Теперь можете зайти на сайт </a>";
			}
			else{
				echo "Пользователь с логином <b>$login</b> уже зарегистрирован";
			}
			
			
		}
		else{
			echo "Вы не ввели значения логин/пароль";
		}	
	}

	
	function record($login, $password){
		$fp = fopen("db_log.txt", "a+");
		return fputcsv($fp, [$login, $password]);
	}

	function to_verify($login, $password){
		$fp = fopen("db_log.txt", "r");
		while($line = fgetcsv($fp)){
			$a[] = $line;
		}
		foreach ($a as $pairs) {
			if($pairs[0] == $login){
				return false;
			}
		}
		return true;
	}



	
?>



<form action="" method="POST">
	<input type="text" name = "login"><br><br>
	<input type="text" name = "password"><br><br>
	<input type="submit" value = "Зарегистрироваться" name = "submit">
</form>
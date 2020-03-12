<?php
	$response = "";
	$response = check_input($_POST["name"], $_POST['email'], $_POST['theme'], $_POST['message']);
	echo $response;
	
	function check_input($name, $email, $theme, $message) {
		$name = trim($name);
		if (empty($name)) {
			$nameErr = "Заполните все поля!";
			return $nameErr;
		} else {
			if (!preg_match("/^[а-яёa-z ]+$/msiu",$name)) {
				$nameErr = "В имени могут содержаться только буквы и пробел!";
				return $nameErr;
			}
		}
		
		$email = trim($email);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$emailErr = "Неверный формат E-mail!"; 
			return $emailErr;
		}
		
		$theme = trim($theme);
		if (empty($name)) {
			$themeErr = "Заполните все поля!";
			return $themeErr;
		}
		
		$message = trim($message);
		if (empty($message)) {
			$messageErr = "Заполните все поля!";
			return $messageErr;
		}

		mail("Darkraver2012@gmail.com", $theme, "Имя: ".$name."\nЭлектронная почта: ".$email."\n".$message);
		return 1;
	}
?>
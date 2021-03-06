<?php
	if(isset($_COOKIE["user"])) {
		header('Location: lk/index.php');
	}

	if(isset($_GET['logout'])) {
		setcookie("user", "", time()-3600);
		unset($_COOKIE["user"]);
	}
?>
<!doctype html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/auth.css">
	<link rel="stylesheet" href="css/header.css">
	<link rel="stylesheet" href="css/footer.css">
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<title>E-Zанятость | Авторизация</title>
</head>
<body>
	<script src="js/check_login.js"></script>
	<div class="wrapper">
		<?php include 'includes/header.php'; ?>
		<main>
			<section class="auth section-padding-both">
				<img src="img/logo.png">
				<h2>Авторизация</h2>
				<div class="alert alert-danger">
				</div>
				<form name="auth_form" method="post">
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-prepend"><i class="fas fa-user"></i></div>
							<input type="text" name="auth_login" class="form-control" placeholder="Логин">
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-prepend"><i class="fas fa-lock"></i></div>
							<input type="password" name="auth_password" class="form-control form-control-bottom" placeholder="Пароль">
						</div>
					</div>
					<div class="form-group">
						<input type="button" name="auth_submit" class="btn btn-outline-primary" value="Войти">
					</div>
				</form>
			</section>
		</main>
		<?php include 'includes/footer.php'; ?>
	</div>
</body>
</html>
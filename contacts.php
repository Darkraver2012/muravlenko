<!doctype html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/contacts.css">
	<link rel="stylesheet" href="css/header.css">
	<link rel="stylesheet" href="css/footer.css">
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<title>E-Zанятость | Контакты</title>
</head>
<body>
	<script src="js/send_mail.js"></script>
	<div class="wrapper">
		<?php include 'includes/header.php'; ?>
		<main>
			<section class="contacts section-padding-both">
				<div class="container">
					<h2>Контакты</h2>
					<div class="contacts-upper">
						<div class="contacts-column">	
							<p class="text">
								Оставьте свое сообщение в этой форме, мы получим его на e-mail и обязательно ответим!
							</p>						
							<form name="contacts_form" method="post">
								<div class="alert alert-success">
									Сообщение успешно отправлено!
								</div>
								<div class="alert alert-danger">
								</div>
								<div class="form-group">
									<input class="form-control" type="text" name="name" placeholder="Имя" required>
								</div>
								<div class="form-group">
									<input class="form-control" type="email" name="email" placeholder="Электронная почта" required>
								</div>
								<div class="form-group">
									<input class="form-control" type="text" name="theme" placeholder="Тема">
								</div>
								<div class="form-group">
									<textarea class="form-control" name="message" placeholder="Сообщение"></textarea>
								</div>
								<div class="form-group">
									<button type="button" class="btn btn-outline-primary" name="submit_btn">Отправить</button>
								</div>
							</form>
						</div>
						<div class="contacts-column">
								<p class="text">
									<b>Расположение:</b><br>
									ЯНАО г. Муравленко ул. Ленина, 65,<br> 
									Муравленко, Тюменская область, 629601
								</p><br>
								<p class="text">
									<b>Управление образования:</b> + 7 (985) 415-59-75<br>
									<b>Заказчик:</b> <a href="javascript:void(0);" class="link-primary">Snychevam@mail.ru</a><br>
									<b>Менеджер:</b> <a href="javascript:void(0);" class="link-primary">Zaikogalina59@mail.ru</a><br>
									<b>Разработчик:</b> <a href="javascript:void(0);" class="link-primary">Darkraver2012@gmail.com</a>
								</p>
						</div>
					</div>
					<div class="map-handler">
						<script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A9d5347b8ba692ab9cb3c013b2cd5ede20cfa04ad76765a5e9d9c3adb5671e63d&amp;width=100%25&amp;height=520&amp;lang=ru_RU&amp;scroll=true"></script>
					</div>	
				</div>
			</section>
		</main>
		<?php include 'includes/footer.php'; ?>
	</div>
</body>
</html>
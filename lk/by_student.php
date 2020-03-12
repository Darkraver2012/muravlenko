<?php include("includes/check_auth.php"); ?>
<!doctype html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/courses.css">
	<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
	<title>Е-Занятость | Панель администратора</title>
</head>
<body>
	<script src="js/get_by_student.js"></script>
	<script src="js/show_sidebar.js"></script>
		<?php include("includes/sidebar.php"); ?>
		<div class="wrapper">
			<?php include("includes/navbar.php"); ?>
			<main>
				<section class="section-padding-both">
					<div class="container">
						<h1>Охват дополнительным образованием по обучающемся</h1>
						<div class="form-group">
							Школа: 
							<select class="form-control" name="organisation_select">
								<option disabled selected value>Школа</option>
							</select>
						</div>
						<div class="form-group">
							Класс: 
							<select class="form-control" name="class_select">
								<option disabled selected value> Класс </option>
							</select>
						</div>
						<div class="form-group">
							Ф.И.О. обучающегося: 
							<select class="form-control" name="student_select">
								<option disabled selected value> Обучающийся </option>
							</select>
						</div>
						<div class="table-wrapper">

						</div>
					</div>
				</section>				
			</main>
		</div>
</body>
</html>
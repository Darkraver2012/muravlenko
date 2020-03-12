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
	<script src="js/get_courses.js"></script>
	<script src="js/show_sidebar.js"></script>
		<?php include("includes/sidebar.php"); ?>
		<div class="wrapper">
			<?php include("includes/navbar.php"); ?>
			<main>
				<section class="section-padding-both">
					<div class="container">
						<h1>Перечень направлений внеурочной деятельности</h1>
						<div class="form-group">
							Выберите направление: 
							<select class="form-control" name="course_select">
								<option value="0">Все</option>
								<?php
									$result_courses = mysqli_query($conn, "SELECT * FROM courses");
									while($row_courses=mysqli_fetch_array($result_courses))
									{
										echo "<option value='$row_courses[id]'>$row_courses[name]</option>";
									}
								?>
							</select>
						</div>
						<div class="form-group">
							Выберите учреждение: 
							<select class="form-control" name="organisation_select">
								<option value="0">Все</option>
								<?php
									$result_org = mysqli_query($conn, "SELECT * FROM organisations");
									while($row_org=mysqli_fetch_array($result_org))
									{
										echo "<option value='$row_org[id]'>$row_org[name]</option>";
									}
								?>
							</select>
						</div>
						<div>
							<table class="table table-scroll">
								<thead>
									<tr>
										<th>Наименование<br>направления</th>
										<th>Объединение</th>
										<th>Наименование<br>организации</th>
									</tr>
								</thead>
								<tbody>									
								</tbody>
							</table>
						</div>
					</div>
				</section>				
			</main>
		</div>
</body>
</html>
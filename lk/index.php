<?php include("includes/check_auth.php"); ?>
<!doctype html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/index.css">
	<link rel="shortcut icon" href="../images/gre-logo.ico" type="image/x-icon">
	<title>Е-Занятость | Панель администратора</title>
</head>
<body>
	<?php
		include("../db.php");
		$result = mysqli_query($conn, "SELECT * FROM users WHERE id=$_COOKIE[user]");
		$row=mysqli_fetch_array($result);
		$role = $row['role'];
		$img = $row['img'];
	?>
	<script src="js/show_sidebar.js"></script>
		<?php include("includes/sidebar.php"); ?>
		<div class="wrapper">
			<?php include("includes/navbar.php"); ?>
			<main>
				<section class="section-padding-both">
					<div class="container">
						<h1>Профиль</h1>
						<div class="user">
							<div class="user-img">
								<img src="img/<?php echo $img; ?>">
							</div>
							<div class="user-info">
								<?php								
									echo "<p class='lead'><b>Ф.И.О.: </b>$row[surname] $row[name] $row[patronymic]</p>";
									$roles = array("Администратор", "Директор", "Учитель", "Родитель", "Обучающийся");
									echo "<p class='lead'><b>Статус: </b>".$roles[$role-1]."</p>";									
									if($role==3) {
										$result = mysqli_query($conn, "
											SELECT *, organisations.name AS o_name, associations.name AS a_name
											FROM teachers 
											INNER JOIN organisations ON teachers.organisation = organisations.id
											INNER JOIN associations ON teachers.association = associations.id
											WHERE user=$_COOKIE[user]");
										while($row=mysqli_fetch_array($result))
										{
											echo "<p class='lead' style='margin: 0;'><b>Наименование ОДО: </b>$row[o_name]</p>";
											echo "<p class='lead'><b>Объединение: </b>$row[a_name]</p>";											
										}
									} else if($role==4) {
										$result = mysqli_query($conn, "
											SELECT *, 
											parents.user AS p_user,
											students.user AS s_user
											FROM parents 
											INNER JOIN students ON parents.student = students.id
											WHERE parents.user=$_COOKIE[user]");
										$row=mysqli_fetch_array($result);
										echo "<p class='lead'><b>Телефон: </b>$row[phone]</p>";
										echo "<p class='lead'><b>Обучающийся: </b>$row[surname] $row[name] $row[patronymic]</p>";
										while($row=mysqli_fetch_array($result))
										{
											echo "<p class='lead'><b>Обучающийся: </b>$row[surname] $row[name] $row[patronymic]</p>";												
										}
									} else if($role==5) {
										$genders = array("Мужской", "Женский");
										$result = mysqli_query($conn, "
											SELECT *, 
											students.name AS s_name, 
											student_status.name AS sstatus, 
											family_status.name AS fstatus,
											organisations.name AS o_name
											FROM students 
											INNER JOIN student_status ON students.student_status = student_status.id
											INNER JOIN family_status ON students.family_status = family_status.id
											INNER JOIN organisations ON students.school = organisations.id
											WHERE students.user=$_COOKIE[user]");
										$row=mysqli_fetch_array($result);
										echo "<p class='lead'><b>Пол: </b>".$genders[$row['gender']]."</p>";
										echo "<p class='lead'><b>Школа: </b>$row[o_name]</p>";
										echo "<p class='lead'><b>Класс: </b>$row[class]$row[letter]</p>";
										echo "<p class='lead'><b>Статус обучающегося: </b>$row[sstatus]</p>";
										echo "<p class='lead'><b>Статус семьи: </b>$row[fstatus]</p>";
									}
									$result = mysqli_query($conn, "SELECT * FROM users WHERE id=$_COOKIE[user]");

								?>
							</div>
						</div>
					</div>
				</section>
			</main>
		</div>
</body>
</html>
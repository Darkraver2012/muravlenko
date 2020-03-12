<?php
	include ('db.php');
	
	if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])) {
		$result = mysqli_query($conn, "SELECT id FROM organisations WHERE id=$_GET[id]");
		if(mysqli_num_rows($result)==0) {
			header('Location: organisations.php');
		}					
	} else {
		header('Location: organisations.php');
	}

	mysqli_close($conn);
?>
<!doctype html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/organisation.css">
	<link rel="stylesheet" href="css/header.css">
	<link rel="stylesheet" href="css/footer.css">
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<title>E-Zанятость | Учреждения</title>
</head>
<body>
	<script src="js/get_schedule.js"></script>
	<div class="wrapper">
		<?php include 'includes/header.php'; ?>
		<main>
			<?php
				include ('db.php');
				$result = mysqli_query($conn, "SELECT * FROM organisations WHERE id=$_GET[id]");
				$row=mysqli_fetch_assoc($result);
			?>
			<section class="organisation-name section-padding-both">
				<div class="container">
					<h2><?php echo $row['name'];?></h2>
				</div>
			</section>
			<section class="organisation-info section-padding-bottom">
				<div class="container">
					<h3>Об учреждении</h3>
					<div>
						<div class="img-wrapper">
							<a class="link-primary" target="_blank" href="img/organisations/<?php echo $row['img'];?>">
								<img src="img/organisations/<?php echo $row['img'];?>">
							</a>
						</div>
						<div class="lead">
							<p><b>Адрес: </b><?php echo $row['adress'];?></p>
							<p><b>Директор: </b><?php echo $row['director'];?></p>
							<p>
								<b>Телефон: </b>
								<a class="link-primary" href="tel:<?php echo $row['phone'];?>">
									<?php echo $row['phone'];?>
								</a>
							</p>
							<p>
								<b>Электронная почта: </b>
								<a class="link-primary" href="mailto:<?php echo $row['email'];?>">
									<?php echo $row['email'];?></p>
								</a>
							<p>
								<b>Веб-сайт: </b>
								<a class="link-primary" target="_blank" href="<?php echo $row['website'];?>">
									<?php echo $row['website'];?>
								</a>
							</p>
						</div>
					</div>
				</div>
			</section>
			<?php
				include ('db.php');
				$result = mysqli_query($conn, "SELECT COUNT(id) AS total FROM housings WHERE organisation=$_GET[id]");
				$total=mysqli_fetch_assoc($result);
				if($total['total'] != 0) {
			?>
					<section class="organisation-housings section-padding-both">
						<div class="container">
							<h3>Корпуса</h3>
							<div>
								<?php
									$result = mysqli_query($conn, "SELECT * FROM housings WHERE organisation=$_GET[id]");
									while($row=mysqli_fetch_array($result))
									{
								?>
										<p class="text">
											<b><?php echo $row['name'];?>: </b><?php echo $row['adress'];?>
										</p>
								<?php
									}
								?>						
							</div>
						</div>
					</section>
			<?php
				}
			?>
			<section class="organisation-table section-padding-both">
				<div class="container">
					<h3>Расписание занятий</h3>
					<div class="form-group">
						Выберите направление: 
						<select class="form-control">
							<?php
								$result_courses = mysqli_query($conn, "SELECT * FROM courses");
								while($row_courses=mysqli_fetch_array($result_courses))
								{
									echo "<option value='$row_courses[id]'>$row_courses[name]</option>";
								}
							?>
						</select>
					</div>
					<div class="card-deck">
					</div>
				</div>
			</section>
		</main>
		<?php include 'includes/footer.php'; ?>
	</div>
</body>
</html>
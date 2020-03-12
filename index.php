<!doctype html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/index.css">
	<link rel="stylesheet" href="css/header.css">
	<link rel="stylesheet" href="css/footer.css">
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<title>E-Zанятость | Главная страница</title>
</head>
<body>	
	<div class="wrapper">
		<?php include 'includes/header.php'; ?>
		<main>
			<section class="heading section-padding-both">
				<h1>E-ZАНЯТОСТЬ</h1>
			</section>
			<section class="carousel">
				<div class="carousel-container">
					<div class="carousel-slide carousel-fade">
						<a href="#"><img src="img/carousel/1.jpg"></a>
						<div class="carousel-text">
							<h5>E-Zанятость</h5>
							<p class="text">Команда студентов Московского Политеха представляет.</p>
						</div>
					</div>

					<div class="carousel-slide carousel-fade">
						<a href="#"><img src="img/carousel/2.jpg"></a>
						<div class="carousel-text">
							<h5>Школьный портал</h5>
							<p class="text">Единая информационная система учета и мониторинга обучающихся образовательных организаций города Муравленко.</p>
						</div>
					</div>

					<a class="carousel-prev" onclick="plusSlides(-1)"><i class="fa fa-angle-left"></i></a>
					<a class="carousel-next" onclick="plusSlides(1)"><i class="fa fa-angle-right"></i></a>
				</div>
				<div class="carousel-dots">
					<span class="carousel-dot" onclick="currentSlide(1)"></span> 
					<span class="carousel-dot" onclick="currentSlide(2)"></span> 		  
				</div>		
				<script src="js/carousel.js"></script>
			</section>
			<section class="organisations section-padding-both">
				<div class="container ">
					<h2>Учреждения</h2>
					<div class="card-deck">
						<?php
							include ('db.php');
							$result = mysqli_query($conn, "SELECT COUNT(id) AS total FROM organisations");
							
							$total=mysqli_fetch_assoc($result);
							$numbers = range(1, $total['total']);
							shuffle($numbers);
							$numbers = implode(',', array_slice($numbers, 0, 3));
							
							$result = mysqli_query($conn, "SELECT * FROM organisations WHERE id IN ($numbers)");
							while($row=mysqli_fetch_array($result))
							{
						?>
								<div class="card">
									<div class="card-img">
										<img src="img/organisations/<?php echo $row['img'] ?>">
									</div>
									<div class="card-body">
										<h5><a href="organisation.php?id=<?php echo $row['id'] ?>" class="link-secondary"><?php echo $row['name'] ?></a></h5>
									</div>
								</div>
						<?php 
							} 
						?>
					</div>
					<div class="full-wrapper">
						<a href="organisations.php" class="btn btn-outline-primary">Все учреждения...</a>
					</div>
				</div>
			</section>
			<section class="events section-padding-both">
				<div class="container ">
					<h2>Мероприятия</h2>
					<div class="card-deck">
						<?php
							$result = mysqli_query($conn, "
							SELECT *, 
							events.name AS e_name, 
							organisations.name AS o_name, 
							events.img AS e_img,
							events.id AS e_id
							FROM events 
							INNER JOIN organisations ON events.organisation = organisations.id
							ORDER BY date DESC LIMIT 3");
							while($row=mysqli_fetch_array($result))
							{
						?>
								<div class="card">
									<div class="card-img">
										<img src="img/events/<?php echo $row['e_img'] ?>">
									</div>
									<div class="card-body">
										<h5><a href="event.php?id=<?php echo $row['e_id'] ?>" class="link-secondary"><?php echo $row['e_name'] ?></a></h5>
										<p class="text-muted"><?php echo $row['o_name'] ?></p>										
										<span class="badge badge-primary"><?php echo $row['date'] ?></span>
										<p class="card-text"><?php echo $row['description'] ?></p>
									</div>
								</div>
						<?php
							}
							mysqli_close($conn);
						?>
					</div>
					<div class="full-wrapper">
						<a href="events.php" class="btn btn-outline-primary">Все мероприятия...</a>
					</div>
				</div>
			</section>
		</main>
		<?php include 'includes/footer.php'; ?>
	</div>
</body>
</html>
<?php
	include ('db.php');
	
	if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])) {
		$result = mysqli_query($conn, "SELECT id FROM events WHERE id=$_GET[id]");
		if(mysqli_num_rows($result)==0) {
			header('Location: events.php');
		}					
	} else {
		header('Location: events.php');
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
	<link rel="stylesheet" href="css/event.css">
	<link rel="stylesheet" href="css/header.css">
	<link rel="stylesheet" href="css/footer.css">
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<title>E-Zанятость | Мероприятия</title>
</head>
<body>	
	<div class="wrapper">
		<?php include 'includes/header.php'; ?>
		<main>
			<?php
				include ('db.php');
				$result = mysqli_query($conn, "
					SELECT *, 
					events.name AS e_name, 
					organisations.name AS o_name,
					events.img AS e_img,
					events.id AS e_id
					FROM events 
					INNER JOIN organisations ON events.organisation = organisations.id
					WHERE events.id=$_GET[id]
				");
				$row=mysqli_fetch_assoc($result);
			?>
			<section class="event section-padding-both">
				<div class="container">
					<h2><?php echo $row['e_name'];?></h2>
					<div class="event-img">
						<a class="link-primary" target="_blank" href="img/events/<?php echo $row['e_img'];?>">
							<img src="img/events/<?php echo $row['e_img'];?>">
						</a>
					</div>
					<p class="text-muted"><?php echo $row['o_name'];?></p>
					<span class="badge badge-primary"><?php echo $row['date'];?></span>
					<p class="text"><?php echo $row['description'];?></p>
				</div>
			</section>
		</main>
		<?php include 'includes/footer.php'; ?>
	</div>
</body>
</html>
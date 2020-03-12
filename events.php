<?php
	include ('db.php');
	
	if(isset($_GET['id']) && !empty($_GET['id'])) {
		$result = mysqli_query($conn, "SELECT id FROM organisations WHERE id=$_GET[id]");
		if(mysqli_num_rows($result)==0) {
			$_GET['id']=0;
		}					
	} else {
		$_GET['id']=0;
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
	<link rel="stylesheet" href="css/events.css">
	<link rel="stylesheet" href="css/header.css">
	<link rel="stylesheet" href="css/footer.css">
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<title>E-Zанятость | Мероприятия</title>
</head>
<body>
	<script src="js/get_events.js"></script>
	<div class="wrapper">
		<?php include 'includes/header.php'; ?>
		<main>
			<section class="events section-padding-both">
				<div class="container">
					<h2>Мероприятия</h2>
					<div class="form-group">
						Выберите учреждение: 
						<select class="form-control">
							<option value="0">Все учреждения</option>
							<?php
								include ('db.php');
								$result = mysqli_query($conn, "SELECT * FROM organisations");
								while($row=mysqli_fetch_array($result))
								{
									echo "<option value='$row[id]'>$row[name]</option>";
								}
								mysqli_close($conn);
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
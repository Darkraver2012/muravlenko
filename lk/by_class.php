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
	<script src="js/get_by_class.js"></script>
	<script src="js/print_report.js"></script>
	<script src="js/show_sidebar.js"></script>
		<?php include("includes/sidebar.php"); ?>
		<div class="wrapper">
			<?php include("includes/navbar.php"); ?>
			<main>
				<section class="section-padding-both">
					<div class="container">
						<h1>Охват дополнительным образованием по классам</h1>
						<div class="form-group">
							Школа: 
							<select class="form-control" name="organisation_select">
								<option value="0">Все</option>
								<?php
									$result = mysqli_query($conn, "SELECT * FROM organisations WHERE is_school=1");
									while($row=mysqli_fetch_array($result))
									{
										echo "<option value='$row[id]'>$row[name]</option>";
									}
								?>
							</select>
						</div>
						<div>
							<table class="table table-scroll">
								<thead>
									<tr>
										<th>Наименование ОДО</th>
										<th>Общее число</th>
										<th>1 класс</th>
										<th>2 класс</th>
										<th>3 класс</th>
										<th>4 класс</th>
										<th>5 класс</th>
										<th>6 класс</th>
										<th>7 класс</th>
										<th>8 класс</th>
										<th>9 класс</th>
										<th>10 класс</th>
										<th>11 класс</th>
									</tr>
								</thead>
								<tbody>									
								</tbody>
							</table>
						</div>
						<div class="form-group">
							<br>
							<a data-py="csv_get_by_class.py" 
							data-report="by_class.csv" 
							id="print_report"
							href="javascript:void(0);" 
							class="btn btn-primary"><i class="fas fa-file-download"></i> Скачать отчет</a>
							<br><br>
						</div>
					</div>
				</section>				
			</main>
		</div>
</body>
</html>
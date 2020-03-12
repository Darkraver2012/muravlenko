<?php
	include ('../db.php');

	$days = array("Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота", "Воскресенье");
	for ($i = 0; $i < 7; $i++) 
	{
		echo '
			<div class="card table-item">
			<div class="card-header">
				<b class="table-day">'.$days[$i].'</b>
			</div>	
		';

		$result = mysqli_query($conn, "
		SELECT *, associations.name AS a_name, teachers.name AS t_name, housings.name AS h_name
		FROM schedule
		INNER JOIN housings ON schedule.housing = housings.id
		INNER JOIN associations ON schedule.association = associations.id
		INNER JOIN teachers ON schedule.teacher = teachers.id
		INNER JOIN courses ON associations.course = courses.id
		WHERE schedule.organisation=$_GET[id] 
		AND associations.course=$_GET[value]
		AND day=$i
		ORDER BY begin");
		while($row=mysqli_fetch_array($result))
		{
			$begin = date_format(date_create_from_format("H:i:s", $row['begin']), "H:i");
			$end = date_format(date_create_from_format("H:i:s", $row['end']), "H:i");
			
			$name = mb_substr($row['t_name'], 0, 1, 'UTF-8');
			$patronymic = mb_substr($row['patronymic'], 0, 1, 'UTF-8');
			
			echo '
				<div class="card-body">
					<b class="table-time">'.$begin.'-'.$end.'</b>
					<span class="badge badge-primary">'.$row['h_name'].' - '.$row['classroom'].'</span><br>
					<span class="text">'.$row['a_name'].'</span><br>
					<span class="text-muted">'.$row['surname'].' '.$name.'.'.$patronymic.'.</span>
				</div>
			';
		}
		
		echo '</div>';
	}
	mysqli_close($conn);
?>
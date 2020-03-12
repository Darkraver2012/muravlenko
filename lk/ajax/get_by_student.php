<?php
	include ('../db.php');

	$result = mysqli_query($conn, "
		SELECT *, students.name AS s_name, organisations.name AS o_name
		FROM students
		INNER JOIN organisations ON students.school = organisations.id
		WHERE students.id=$_GET[student]
	");
	$row=mysqli_fetch_array($result);
	echo "<h3>$row[surname] $row[s_name] $row[patronymic], $row[class]$row[letter] ($row[o_name])</h3>";
?>

<table class="table table-scroll">
	<thead>
		<tr>
			<th>Наименование ОДО</th>
			<th>Объединение</th>
			<th>Время занятий</th>
		</tr>
	</thead>
	<tbody>									

<?php
	$result = mysqli_query($conn, "
		SELECT *, 
		employment.organisation AS e_organisation, 
		employment.association AS e_association,		
		organisations.name AS o_name, 
		associations.name AS a_name
		FROM employment
		INNER JOIN organisations ON employment.organisation = organisations.id
		INNER JOIN associations ON employment.association = associations.id
		WHERE employment.student=$_GET[student]
	");
	$days = array("Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота", "Воскресенье");
	while($row=mysqli_fetch_array($result))
	{
?>
		<tr>
			<td><?php echo $row['o_name'];?></td>
			<td><?php echo $row['a_name'];?></td>
			<td>
				<?php
					$result_inner = mysqli_query($conn, "
						SELECT *
						FROM schedule
						WHERE schedule.association=$row[e_association]
						AND schedule.organisation=$row[e_organisation]
					");
					while($row_inner=mysqli_fetch_array($result_inner))
					{
						$begin = date_format(date_create_from_format("H:i:s", $row_inner['begin']), "H:i");
						$end = date_format(date_create_from_format("H:i:s", $row_inner['end']), "H:i");
						$day = $row_inner['day'];
						
						echo $begin." - ".$end." ".$days[$day]."<br>";
					}
				?>
			</td>
		</tr>
<?php
	}		
	mysqli_close($conn);
?>
	</tbody>
</table>
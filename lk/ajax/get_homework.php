<?php
	include ('../db.php');

	$result = mysqli_query($conn, "
		SELECT *, students.name AS s_name, organisations.name AS o_name, students.id AS s_id
		FROM students
		INNER JOIN organisations ON students.school = organisations.id
		INNER JOIN users ON students.user = users.id
		WHERE users.id=$_COOKIE[user]
	");
	$row=mysqli_fetch_array($result);
	echo "<h3>$row[surname] $row[s_name] $row[patronymic], $row[class]$row[letter] ($row[o_name])</h3>";
?>

<table class="table">
	<thead>
		<tr>
			<th>Наименование ОДО</th>
			<th>Объединение</th>
			<th>Дата</th>
			<th>Задание</th>
		</tr>
	</thead>
	<tbody>
	
<?php
	$result = mysqli_query($conn, "
		SELECT *, 		
		organisations.name AS o_name, 
		associations.name AS a_name,
		homework.value AS h_value,
		homework.date AS h_date
		FROM employment
		INNER JOIN organisations ON employment.organisation = organisations.id
		INNER JOIN associations ON employment.association = associations.id
		INNER JOIN homework ON organisations.id = homework.organisation AND associations.id = homework.association
		WHERE employment.student=$row[s_id]
		AND homework.date >= NOW()
	");
	while($row=mysqli_fetch_array($result))
	{
?>
		<tr>
			<td><?php echo $row['o_name'];?></td>
			<td><?php echo $row['a_name'];?></td>
			<td><?php echo $row['h_date'];?></td>
			<td><?php echo $row['h_value'];?></td>
		</tr>
<?php
	}		
	mysqli_close($conn);
?>	

	</tbody>
</table>
	
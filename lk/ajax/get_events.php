<?php
	include ('../db.php');

	$result = mysqli_query($conn, "
		SELECT events.name AS e_name,
		events.date AS e_date,
		organisations.name AS o_name
		FROM events
		INNER JOIN organisations ON events.organisation = organisations.id
		WHERE (events.organisation=$_GET[organisation] OR $_GET[organisation]=0)
		AND events.date BETWEEN '$_GET[start]' AND '$_GET[finish]'
	");
	while($row=mysqli_fetch_array($result))
	{
?>
		<tr>
			<td><?php echo $row['o_name'];?></td>
			<td><?php echo $row['e_date'];?></td>
			<td><?php echo $row['e_name'];?></td>
		</tr>
<?php
	}
	mysqli_close($conn);
?>	

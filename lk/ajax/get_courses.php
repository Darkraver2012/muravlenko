<?php
	include ('../db.php');
	
	$result = mysqli_query($conn, "
		SELECT DISTINCT associations.id AS a_id,
		associations.name AS a_name,
		courses.name AS c_name
		FROM associations
		INNER JOIN courses ON associations.course = courses.id
		INNER JOIN schedule ON associations.id = schedule.association
		INNER JOIN organisations ON schedule.organisation = organisations.id
		WHERE (associations.course=$_GET[course] OR $_GET[course]=0)
		AND (schedule.organisation=$_GET[organisation] OR $_GET[organisation]=0)
	");
	while($row=mysqli_fetch_array($result))
	{
?>
		<tr>
			<td><?php echo $row['c_name'];?></td>
			<td><?php echo $row['a_name'];?></td>
			<td>
				<?php
					$result_inner = mysqli_query($conn, "
						SELECT DISTINCT organisations.name AS o_name
						FROM schedule
						INNER JOIN organisations ON schedule.organisation = organisations.id
						WHERE schedule.association=$row[a_id]
						AND (schedule.organisation=$_GET[organisation] OR $_GET[organisation]=0)
					");
					$str = "";
					while($row_inner=mysqli_fetch_array($result_inner))
					{
						$str.=$row_inner['o_name'].',<br>';
					}
					echo rtrim($str, ',<br>');
				?>
			</td>
		</tr>
<?php
	}
	mysqli_close($conn);
?>	
<?php
	include ('../db.php');

	$result = mysqli_query($conn, "
		SELECT organisations.id AS o_id,
		organisations.name AS o_name
		FROM organisations
		WHERE (organisations.id=$_GET[organisation] OR $_GET[organisation]=0)
		AND organisations.is_school=1
	");
	while($row=mysqli_fetch_array($result))
	{
?>
		<tr>
			<td><?php echo $row['o_name'];?></td>
			<?php
				$result_2 = mysqli_query($conn, "
					SELECT COUNT(DISTINCT employment.student) AS total
					FROM employment
					INNER JOIN students ON employment.student = students.id
					INNER JOIN family_status ON students.family_status = family_status.id
					INNER JOIN student_status ON students.student_status = student_status.id
					WHERE employment.organisation=$row[o_id]
					AND (family_status.name!='Нет'
					OR student_status.name!='Нет')
				");
				$row_2=mysqli_fetch_array($result_2);
				echo '<td class="td-center">'.$row_2['total'].'</td>';
				
				$result_2 = mysqli_query($conn, "
					SELECT * FROM student_status 
					WHERE name!='Нет'
				");
				while($row_2=mysqli_fetch_array($result_2))
				{
					$result_3 = mysqli_query($conn, "
						SELECT COUNT(DISTINCT employment.student) AS total
						FROM employment
						INNER JOIN students ON employment.student = students.id
						INNER JOIN student_status ON students.student_status = student_status.id
						WHERE employment.organisation=$row[o_id]
						AND students.student_status=$row_2[id]
					");	
					$row_3=mysqli_fetch_array($result_3);
					echo '<td class="td-center">'.$row_3['total'].'</td>';
				}
				
				$result_2 = mysqli_query($conn, "
					SELECT * FROM family_status 
					WHERE name!='Нет'
				");
				while($row_2=mysqli_fetch_array($result_2))
				{
					$result_3 = mysqli_query($conn, "
						SELECT COUNT(DISTINCT employment.student) AS total
						FROM employment
						INNER JOIN students ON employment.student = students.id
						INNER JOIN family_status ON students.family_status = family_status.id
						WHERE employment.organisation=$row[o_id]
						AND students.family_status=$row_2[id]
					");	
					$row_3=mysqli_fetch_array($result_3);
					echo '<td class="td-center">'.$row_3['total'].'</td>';
				}				
			?>
			
		</tr>
<?php
	}
	mysqli_close($conn);
?>	
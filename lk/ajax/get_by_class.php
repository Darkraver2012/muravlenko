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
				$result_inner = mysqli_query($conn, "
					SELECT COUNT(DISTINCT employment.student) AS total,
					COUNT(DISTINCT (CASE WHEN students.class=1 THEN employment.student END)) AS count1,
					COUNT(DISTINCT (CASE WHEN students.class=2 THEN employment.student END)) AS count2,
					COUNT(DISTINCT (CASE WHEN students.class=3 THEN employment.student END)) AS count3,
					COUNT(DISTINCT (CASE WHEN students.class=4 THEN employment.student END)) AS count4,
					COUNT(DISTINCT (CASE WHEN students.class=5 THEN employment.student END)) AS count5,
					COUNT(DISTINCT (CASE WHEN students.class=6 THEN employment.student END)) AS count6,
					COUNT(DISTINCT (CASE WHEN students.class=7 THEN employment.student END)) AS count7,
					COUNT(DISTINCT (CASE WHEN students.class=8 THEN employment.student END)) AS count8,
					COUNT(DISTINCT (CASE WHEN students.class=9 THEN employment.student END)) AS count9,
					COUNT(DISTINCT (CASE WHEN students.class=10 THEN employment.student END)) AS count10,
					COUNT(DISTINCT (CASE WHEN students.class=11 THEN employment.student END)) AS count11
					FROM employment
					INNER JOIN students ON employment.student = students.id
					WHERE employment.organisation=$row[o_id]
				");
				$row_inner=mysqli_fetch_array($result_inner);
				echo '<td class="td-center">'.$row_inner['total'].'</td>';
				echo '<td class="td-center">'.$row_inner['count1'].'</td>';
				echo '<td class="td-center">'.$row_inner['count2'].'</td>';
				echo '<td class="td-center">'.$row_inner['count3'].'</td>';
				echo '<td class="td-center">'.$row_inner['count4'].'</td>';
				echo '<td class="td-center">'.$row_inner['count5'].'</td>';
				echo '<td class="td-center">'.$row_inner['count6'].'</td>';
				echo '<td class="td-center">'.$row_inner['count7'].'</td>';
				echo '<td class="td-center">'.$row_inner['count8'].'</td>';
				echo '<td class="td-center">'.$row_inner['count9'].'</td>';
				echo '<td class="td-center">'.$row_inner['count10'].'</td>';
				echo '<td class="td-center">'.$row_inner['count11'].'</td>';
			?>
		</tr>
<?php
	}
	mysqli_close($conn);
?>	
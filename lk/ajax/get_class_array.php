<?php
	include ('../db.php');

	$result = mysqli_query($conn, "
		SELECT DISTINCT class, letter
		FROM students
		WHERE students.school=$_GET[organisation]
	");

	$classArray = []; 
	
	while($row=mysqli_fetch_array($result))
	{
		$classArray[] = $row['class'].$row['letter'];
	}
	
	echo json_encode($classArray, JSON_UNESCAPED_UNICODE);
	mysqli_close($conn);
?>
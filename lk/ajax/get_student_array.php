<?php
	include ('../db.php');

	$result = mysqli_query($conn, "
		SELECT *
		FROM students
		WHERE students.school=$_GET[organisation]
		AND students.class=$_GET[numeral]
		AND students.letter='$_GET[letter]'
	");

	$nameArray = [];
	$idArray = [];
	$studentArray = [];
	
	while($row=mysqli_fetch_array($result))
	{
		$name = mb_substr($row['name'], 0, 1, 'UTF-8');
		$patronymic = mb_substr($row['patronymic'], 0, 1, 'UTF-8');
		
		$nameArray[] = $row['surname']." ".$name.".".$patronymic.".";
		$idArray[] = $row['id'];
	}
	
	$studentArray[] = $nameArray;
	$studentArray[] = $idArray;
	
	echo json_encode($studentArray, JSON_UNESCAPED_UNICODE);
	mysqli_close($conn);
?>	
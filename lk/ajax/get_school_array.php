<?php
	include ('../db.php');

	$result = mysqli_query($conn, "
		SELECT *
		FROM organisations
		WHERE organisations.is_school=1
	");

	$nameArray = [];
	$idArray = [];
	$schoolArray = [];
	
	while($row=mysqli_fetch_array($result))
	{
		$nameArray[] = $row['name'];
		$idArray[] = $row['id'];
	}
	
	$schoolArray[] = $nameArray;
	$schoolArray[] = $idArray;	
	
	echo json_encode($schoolArray, JSON_UNESCAPED_UNICODE);
	mysqli_close($conn);
?>	
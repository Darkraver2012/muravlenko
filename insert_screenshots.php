<?php
	include ('db.php');
	for ($i = 1; $i <= 33; $i++) {
		for($j = 0; $j < 3; $j++) {
			$association = mt_rand(1, 20);
			$organisation = mt_rand(1, 2);
			mysqli_query($conn, "INSERT INTO employment (id, student, association, organisation) VALUES (NULL, $i, $association, $organisation)");
		}
	}
?>
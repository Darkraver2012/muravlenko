<?php
	include ('../db.php');
	
	$_GET['value'] = intval($_GET['value']);
	if(isset($_GET['value']) && !empty($_GET['value'])) {
		$result = mysqli_query($conn, "SELECT id FROM organisations WHERE id=$_GET[value]");
		if(mysqli_num_rows($result)==0) {
			$_GET['value']=0;
		}					
	} else {
		$_GET['value']=0;
	}

	$result = mysqli_query($conn, "
		SELECT *, 
		events.name AS e_name, 
		organisations.name AS o_name, 
		events.img AS e_img,
		events.id AS e_id
		FROM events 
		INNER JOIN organisations ON events.organisation = organisations.id 
		WHERE organisation=$_GET[value] OR $_GET[value]=0
		ORDER BY date DESC
	");
	while($row=mysqli_fetch_array($result))
	{
?>
		<div class="card">
			<div class="card-img">
				<img src="img/events/<?php echo $row['e_img'] ?>">
			</div>
			<div class="card-body">
				<h5><a href="event.php?id=<?php echo $row['e_id'] ?>" class="link-secondary"><?php echo $row['e_name'] ?></a></h5>
				<p class="text-muted"><?php echo $row['o_name'] ?></p>
				<span class="badge badge-primary"><?php echo $row['date'] ?></span>
				<p class="card-text"><?php echo $row['description'] ?></p>				
			</div>
		</div>		
<?php
	}
	mysqli_close($conn);
?>
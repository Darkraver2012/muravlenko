<header>
	<nav class="navbar">
		<div class="navbar-bars">
			<a href="javascript:void(0);"><i class="fas fa-bars"></i></a>
		</div>
		<div class="navbar-right">
			<div class="navbar-user">
				<?php
					include ('../db.php');
					$result = mysqli_query($conn, "SELECT * FROM users WHERE id='$_COOKIE[user]'");
					$user_array = mysqli_fetch_assoc($result);
				?>
				<img src="img/<?php echo $user_array['img']; ?>">
				<span><?php echo $user_array['login']; ?></span>
			</div>
			<div class="navbar-logout">
				<a href="../auth.php?logout=yes"><i class="fas fa-sign-out-alt"></i> <span>Выйти</span></a>
			</div>
		</div>
	</nav>
</header>
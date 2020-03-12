<aside class="sidebar">
	<div class="sidebar-node">
		<ul class="sidebar-list">
			<li><a href="index.php"><i class="fas fa-user"></i> Профиль</a></li>
			<li><a href="../index.php"><i class="fas fa-globe-europe"></i> На сайт</a></li>
		</ul>
	</div>
	<div class="sidebar-node">
		<p class="text-muted sidebar-header">Отчеты</p>
		<ul class="sidebar-list">
			<?php
				include("../db.php");
				$result = mysqli_query($conn, "SELECT * FROM users WHERE id=$_COOKIE[user]");
				$row=mysqli_fetch_array($result);
				$role = $row['role'];
				
				if($role==1 || $role==2) {
			?>
					<li>
						<a href="by_class.php">
							<i class="fas fa-chart-bar"></i> Охват дополнительным образованием по классам
						</a>
					</li>
			<?php
				}
				
				if($role==1 || $role==2) {
			?>			
					<li>
						<a href="by_status.php"><i class="fas fa-columns">
							</i> Охват дополнительным образованием по статусам
						</a>
					</li>
			<?php
				}
				
				if($role==1 || $role==2) {
			?>	
					<li>
						<a href="by_student.php"><i class="fas fa-layer-group">
							</i> Охват дополнительным образованием по обучающимся
						</a>
					</li>
			<?php
				}
				
				if($role==1 || $role==2 || $role==4) {
			?>	
					<li>
						<a href="courses.php">
							<i class="fas fa-chart-pie"></i> Перечень направлений внеурочной деятельности
						</a>
					</li>
			<?php
				}
				
				if($role==1 || $role==2 || $role==4) {
			?>	
					<li>
						<a href="events.php">
							<i class="fas fa-calendar-day"></i> Традиционные мероприятия
						</a>
					</li>
			<?php
				}
				
				if($role==3) {
			?>	
					<li>
						<a href="attendance.php">
							<i class="fas fa-user-friends"></i> Посещаемость по школьникам
						</a>
					</li>
			<?php
				}

                if($role==4) {
                    ?>
                    <li>
                        <a href="attendance_parent.php">
                            <i class="fas fa-user-friends"></i> Посещаемость по школьникам
                        </a>
                    </li>
                    <?php
                }

				if($role==5) {
			?>	
					<li>
						<a href="homework.php">
							<i class="fas fa-book"></i> Домашнее задание
						</a>
					</li>
			<?php
				}

                if($role==4) {
                    ?>
                    <li>
                        <a href="homework_parent.php">
                            <i class="fas fa-book"></i> Домашнее задание
                        </a>
                    </li>
                    <?php
                }

                if($role==3) {
                    ?>
                    <li>
                        <a href="homework_teacher.php">
                            <i class="fas fa-book"></i> Домашнее задание
                        </a>
                    </li>
                    <?php
                }
			?>	
		</ul>
	</div>
</aside>
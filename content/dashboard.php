<h2>Selamat Datang <?php echo $_SESSION['name'];?></h2>
<section class="main-content">
	<div class="kotak">
		<div class="kotak1">
			<i class="fa fa-user"></i>
			<span>
				<?php
				$sql= $kdb->query("SELECT count(*) as total from petugas");
				$row = $sql->fetch_assoc();
				echo $row['total'];
				?>
			</span>
			<p>Petugas</p>
		</div>
		<div class="kotak2">
			<i class="fa fa-user"></i>
			<span>
				<?php
				$sql= $kdb->query("SELECT count(*) as total from petugas");
				$row = $sql->fetch_assoc();
				echo $row['total'];
				?>
			</span>
			<p>Petugas</p>
		</div>
		<div class="kotak3">
			<i class="fa fa-user"></i>
			<span>
				<?php
				$sql= $kdb->query("SELECT count(*) as total from petugas");
				$row = $sql->fetch_assoc();
				echo $row['total'];
				?>
			</span>
			<p>Petugas</p>
		</div>
	</div>
</section>

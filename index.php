<?php
session_start();
if(!isset($_SESSION['login'])){
	header('location:login.php');
}
if($_SESSION['level']!="admin"){
	header('location:login.php');
}
require "kdb.php";
$page = $_GET['page'];
?>
<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<title>DASHBOARD - Admin</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="assets/css/style.css">
		<link rel="stylesheet" href="assets/css/font-awesome/css/font-awesome.min.css">
		<link rel="icon" href="assets/img/favicon.png">
		<script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>   
	</head>

	<body>
		<div id="dashboard" class="dashboard">
			<header>
				<a href="#" class="logo">
					<h1>SPP PEMBAYARAN</h1>
				</a>
				<div class="toolbar">
					<i class="fa fa-bars" id="bar" onclick="dropSide()"></i>
					<h1>SPP PEMBAYARAN</h1>
					<div onclick="dropDown()" class="user-out">
						<img src="assets/img/admin.png">
						<span><t><?php echo $_SESSION['name'];?></t>
							<i class="fa fa-caret-down"></i>
						</span>
						<div id="drop-content" class="drop-content">
							<i class="fa fa-caret-up"></i>
							<a onclick="return confirm('Apakah anda yakin ingin keluar?');" href="logout.php">Logout</a>
						</div>
					</div>
				</div>	
			</header>
			
			<aside id="sidebar" class="sidebar">
					<h5>ADMINISTRATOR</h5>
					<ul>
						<p>MAIN NAVIGATION</p>
						<li <?php if(!isset($page)){echo "class='active'";} else{echo "class=''";}?>>
							<a href="index.php">
								<i class="fa fa-dashboard fa-fw"></i> Dashboard
							</a>
						</li>
						<li <?php if($page=="petugas"){echo "class='active'";} else{echo "class=''";}?>>
							<a href="index.php?page=petugas">
								<i class="fa fa-user fa-fw"></i> Petugas
							</a>
						</li>
						<li <?php if($page=="siswa"){echo "class='active'";} else{echo "class=''";}?>>
							<a href="index.php?page=siswa">
								<i class="fa fa-graduation-cap fa-fw"></i> Siswa
							</a>
						</li>
						<li <?php if($page=="kelas"){echo "class='active'";} else{echo "class=''";}?>>
							<a href="index.php?page=kelas">
								<i class="fa fa-building fa-fw"></i> Kelas
							</a>
						</li>
						<li <?php if($page=="spp"){echo "class='active'";} else{echo "class=''";}?>>
							<a href="index.php?page=spp">
								<i class="fa fa-archive fa-fw"></i> Data SPP
							</a>
						</li>
						<li <?php if($page=="tagihan"){echo "class='active'";} else{echo "class=''";}?>>
							<a href="index.php?page=tagihan">
								<i class="fa fa-tag fa-fw"></i> Tagihan Siswa
							</a>
						</li>
						<li <?php if($page=="pembayaran"){echo "class='active'";} else{echo "class=''";}?>>
							<a href="index.php?page=pembayaran">
								<i class="fa fa-money fa-fw"></i> Pembayaran
							</a>
						</li>
						<li <?php if($page=="history"){echo "class='active'";} else{echo "class=''";}?>>
							<a href="index.php?page=history">
								<i class="fa fa-history fa-fw"></i> History Pembayaran
							</a>
						</li>
					</ul>
			</aside>
			<main>
				<?php
				$a = "Dashboard";
				switch($page){
					case "petugas" : $a = "Petugas";break;
					case "siswa" : $a = "Siswa";break;
					case "kelas" : $a = "Kelas";break;
					case "spp" : $a = "Data SPP";break;
					case "tagihan" : $a = "Tagihan";break;
					case "pembayaran" : $a = "Pembayaran";break;
					case "history" : $a = "History";break;
					default: $a = "Dashboard";break;
				}
				?>
				<section class="main-header">
					<b><?php echo $a;?></b>
					<?php
					include "assets/function/format_hari_tanggal.php";
					$date = date('Y-m-d');
					if(!isset($page)){
									echo "<span><m><i class='fa fa-calendar'></i>&nbsp; " .format_hari_tanggal($date)."</m>&nbsp;&nbsp; <n id='jamServer'> " .date('H:i:s')."</n></span>";
					}else{
					?>
					<ul>
						<li><i class="fa fa-dashboard"></i>&nbsp;<a href="index.php">Home</a></li>
						<li>&nbsp;<?php echo $a;?></li>
					</ul>
					<?php }?>
				</section>
				<?php
								if(isset($page)){
								if($page == "petugas"){
												if($_GET['act']=="create"){
																include "content/petugasCreate.php";
												}elseif($_GET['act']=="update"){
																include "content/petugaUpdate.php";
												}elseif($_GET['act']=="delete"){
																include "content/petugasDelete.php";
												}else{
																include "content/petugas.php";
												}
								}elseif($page == "siswa"){
												if($_GET['act']=="create"){
																include "content/siswaCreate.php";
												}elseif($_GET['act']=="update"){
																include "content/siswaUpdate.php";
												}elseif($_GET['act']=="delete"){
																include "content/siswaDelete.php";
												}else{
																include "content/siswa.php";
												}
								}elseif($page == "kelas"){
												if($_GET['act']=="create"){
																include "content/kelasCreate.php";
												}elseif($_GET['act']=="update"){
																include "content/kelasUpdate.php";
												}elseif($_GET['act']=="delete"){
																include "content/kelasDelete.php";
												}else{
																include "content/kelas.php";
												}
								}elseif($page == "spp"){
												if($_GET['act']=="create"){
																include "content/sppCreate.php";
												}elseif($_GET['act']=="update"){
																include "content/sppUpdate.php";
												}elseif($_GET['act']=="delete"){
																include "content/sppDelete.php";
												}else{
																include "content/spp.php";
												}
								}elseif($page == "tagihan"){
												include "content/tagihan_siswa.php";
								}elseif($page == "pembayaran"){
												include "content/pembayaran.php";
								}elseif($page == "history"){
												if($_GET['act']=="delete"){
																include "content/history_delete.php";
												}else{
																include "content/history.php";
												}
								}else{
												include "content/dashboard.php";
								}
				}else{
								include "content/dashboard.php";
				}
				?>
			</main>
			<footer>
				<span>&copy; 2020 SMKN 1 Lubuk Pakam. All Rights Reserved.</span>
			</footer>
		</div>
		<script type="text/javascript" src="assets/js/jamServer.js"></script>
		<script type="text/javascript" src="assets/js/function.js"></script>
	</body>
</html>

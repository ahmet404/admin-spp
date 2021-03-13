<?php
session_start();
if(!isset($_SESSION['login'])){
	header('location:login.php');
}
if($_SESSION['level']!="pegawai"){
	header('location:login.php');
}
require "kdb.php";
?>
<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<title>Dashboard - Pegawai</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>

	<body>
		<h1>Selamat Datang Pegawai</h1>
		<a href="logout.php">Logout</a>
	</body>
</html>

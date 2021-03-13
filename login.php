<!DOCTYPE html> 
<html lang="en-US">
	<head>
		<meta charset="UTF-8">
		<title>SPP SMKN 1 Lubuk Pakam</title>
		<meta name="author" content="r94">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="assets/css/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/style.css">
		<link rel="icon" href="assets/img/favicon.png">
		<script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
	</head>

	<body>
		<div id="login">
			<div class="login-header">
				<h3>SMKN 1 LUBUK PAKAM</h3>
				<span>Please login to start control your dashboard!</span>
			</div>
			<form method="POST" autocomplete="off">
				<?php if(isset($_GET['error'])){
								echo "<p class='error'>Username atau Password Salah!</p>";
				}?>
				<div class="form-field user-input">
					<i class="fa fa-user fa-gw"></i>
					<input id="user" type="text" placeholder="Username" name="user" pattern="[A-Za-z0-9]{3,10}" required/>
				</div>
				<div class="form-field pass-input">
					<i class="fa fa-lock fa-gw"></i>
					<input id="pass" type="password" placeholder="Password" name="pass" required/>
					<span id="change" onclick="show()">
						<i class="fa fa-eye-slash"></i>
					</span>
				</div>
				<button class="btn-login" type="submit" name="login">Login</button>
			</form>
		</div>
		<script type="text/javascript" src="assets/js/function.js"></script>
	</body>
</html>
<?php
require"kdb.php";
if(isset($_POST['login'])){
		  $user = $_POST['user'];
		  $pass = $_POST['pass'];
		  $sql= $kdb->query("SELECT * FROM petugas WHERE username='$user' AND password='$pass'");
		  if($sql->num_rows > 0){
					 $row = $sql->fetch_assoc();
					 session_start();
					 if($row['id_level'] == 1){
								$_SESSION['login'] = true;
								$_SESSION['user'] = $user;
								$_SESSION['name'] = $row['nama_petugas'];
								$_SESSION['level'] = "admin";
								header('location:index.php');
					 } elseif($row['id_level'] == 2){
								$_SESSION['login'] = true;
								$_SESSION['user'] = $user;
								$_SESSION['name'] = $row['nama_petugas'];
								$_SESSION['level'] = "pegawai";
								header('location:pegawai.php');
					 } else{
								header('location:login.php?error');
					 }
			
		  } else{
					 header('location:login.php?error');
		  }
}
$kdb->close();
?>

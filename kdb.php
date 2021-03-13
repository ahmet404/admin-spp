<?php
date_default_timezone_set('Asia/Jakarta');
$kdb = new mysqli("localhost","fsociety","w3A7E4n0nYM0Us","db_spp");
if($kdb->connect_error){
	die("Koneksi Gagal : ". $kdb->connect_error);
}
?>

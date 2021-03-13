<section class="main-content">	
	<a href='index.php?page=petugas&act=create'><i class='fa fa-plus'></i>Tambah Petugas</a>
	<table border="1">
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Username</th>
			<th>Password</th>
			<th>Level</th>
			<th colspan="2">Action</th>
		</tr>
		<?php
		$i = 1;
		$sql = $kdb->query("SELECT * FROM petugas JOIN level ON petugas.id_level = level.id_level");
		while($row = $sql->fetch_assoc()){
		echo "<tr>
						<td>".$i."</td>
						<td>".$row['nama_petugas']."</td>
						<td>".$row['username']."</td>
						<td>".$row['password']."</td>
						<td>".$row['nama_level']."</td>
						<td><a href='index.php?page=petugas&act=update&id=".$row['id_petugas']."'><i class='fa fa-pencil-square-o'></i></a></td>
						<td><a href='index.php?page=petugas&act=delete&id=".$row['id_petugas']."'><i class='fa fa-trash'></i></a></td>
					</tr>";
		$i++;
		}?>
	</table>
</section>

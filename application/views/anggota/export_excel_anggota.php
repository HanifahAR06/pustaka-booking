<?php
  header ("Cache-Control: no-cache, must-revalidate");
    header ("Pragma: no-cache");
    header ("Content-type: application/x-msexcel");
    header ("Content-type: application/octet-stream");
    header ("Content-Disposition: attachment; filename=Nama_File.xls");
?>

<h3><center>Laporan Data Anggota Perputakaan Online</center></h3>
<br/>
<table class="table-data">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Member Sejak</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$no = 1;
		foreach($user as $u)
		{
			?>
			<tr>
				<th scope="row"><?= $no++; ?></th>
				<td></td>
				<td></td>
				<td></td>
				<td></td> 
			</tr>
			<?php
		}
		?>
	</tbody>
</table>

<html>
<head>
	<title>Data Permohonan Surat</title>
</head>
<body>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


	<style type="text/css">
		.logo{
			height: 100px;
			padding-left: 200px;
		}
		.judul{
			padding-left: 136px;
		}
	</style>
	<div class="container">
		<div class="row">
			<div class="col-md-2">
				<img src="<?php echo base_url()."assets/front/img/logo tangkot.png"; ?>" class="logo">
			</div>
			<div class="col-md-10">
				<h3 class="judul">Laporan <?php echo $keterangan;?> <br> Kelurahan Karang Timur</h3>
			</div>
		</div>
	</div>


	<hr>
	<style type="text/css">
		.tanggal{
			text-align: right;
			margin-right: 30px;
		}
		table {
			font-family: arial, sans-serif;
			border-collapse: collapse;
			width: 100%;
		}

		td, th {
			border: 1px solid #dddddd;
			text-align: left;
			padding: 8px;
		}

		tr:nth-child(even) {
			background-color: #dddddd;
		}

	</style>
	<p class="tanggal">Tangerang, <?php echo date('d-M-Y');?> </p>
	<center>
		<h3> Data Permohonan </h3>
	</center>

	<table>
		<tr>
			<th>No</th>
			<th>Kode Permohonan</th>
			<th>Nama Anak</th>
			<th>Jenis Kelamin</th>
			<th>Nama Ayah</th>
			<th>Nama Ibu</th>

			<th>Status</th>
			<th>Tanggal</th>

		</tr>
		<?php 
		$no = 0 ;
		foreach ($laporan as $data) { 
			$no++;
			$nama = $data->nama_anak;
			$kode_permohonan = $data->kode_permohonan;
			$tanggal = $data->tanggal;
			$jenis_kelamin = $data->jenis_kelamin;
			$nama_ayah = $data->nama_ayah;
			$nama_ibu = $data->nama_ibu;
			$status = $data->status;

			if ($status == '1') {
				$keterangan = 'Selesai';
			}else{
				$keterangan = 'Masih Dalam Proses';
			}

			?>
			<tr>
				<td><?php echo $no ?></td>
				<td><?php echo $kode_permohonan ?></td>
				<td><?php echo $nama ?></td>
				<td><?php echo $jenis_kelamin ?></td>
				<td><?php echo $nama_ayah ?></td>
				<td><?php echo $nama_ibu ?></td>
				<td><?php echo $keterangan;?>
				<td><?php echo $tanggal;?></td>
			</tr>
		<?php } ?>
	</table>
	<script type="text/javascript">
		window.print();
	</script>


</body>
</html>
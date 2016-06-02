<?php
	require_once dirname(__DIR__).DIRECTORY_SEPARATOR.'../function/route.php';
?>
<!doctype html>
<html lang=''>
<head>
	<title>SIPMAK</title>
	<meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, user-scalable=0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <!-- JQUERY LIB -->
    <script src="<?php echo base_url ?>assets/js/jquery-1.11.3.min.js"></script>
	<!-- BOOTSTRAP -->
	<link rel="stylesheet" href="<?php echo base_url ?>assets/css/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url ?>assets/css/bootstrap/bootstrap-theme.min.css" >
	<script src="<?php echo base_url ?>assets/css/bootstrap/bootstrap.min.js"></script>
	<!-- BOOTSTRAP -->

	<!-- CUSTOM STYLES -->
	<link media="all" type="text/css" rel="stylesheet" href="<?php echo base_url ?>assets/css/style.css">
	<!-- FONT AWESOME -->
	<link media="all" type="text/css" rel="stylesheet" href="<?php echo base_url ?>assets/plugin/font-awesome/css/font-awesome.min.css">

</head>
<body style="background:#fff; padding:10px;">
 		<div class="row">
 		<?php
 		if(Lib::findMenu($_GET['id_menu']) == null){

 		}else{
 		foreach (Lib::findMenu($_GET['id_menu']) as $key2 => $value2) {
 		?>
	 		<div class="col-md-12" style="overflow:hidden">
	 			<div class="pull-left">
	 				<img src="<?php echo base_url.'public/images/'.$value2['gambar'] ?>" style="width:80px; height:80px; margin-right:10px">
	 			</div>
	 			<div class="pull-left">
	 				<h5 class="nama-menu"><?php echo $value2['nama_menu'] ?></h5>
	 				<p class="deskripsi">
	 					<small><?php echo $value2['deskripsi'] ?></small>
	 				</p>
	 			</div>	
	 		</div>
	 		<div class="col-md-12">
	 			<hr>
	 		</div>
 		<?php
 		}}
 		?>
 		<?php
 		if(Lib::getTestimoni($_GET['id_menu']) == null){
 			echo '<div class="col-md-12">Belum ada testimoni</div>';
 		}else{
 		foreach (Lib::getTestimoni($_GET['id_menu']) as $key => $value) {
 		?>
	 		<div class="col-md-12" >
	 			<div style="border-bottom:1px solid #ddd; margin-bottom:20px;">
	 				<label class="b"><?php echo Lib::namaUser($value['id_pesan']) ?> : </label>
	 				<p><?php echo $value['testimoni'] ?></p>
	 			</div>
	 		</div>
	 	<?php
	 	}}
	 	?>
 		</div>
</body>
</html>
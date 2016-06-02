<?php 
// Lib::uCheck() 
?>
<div class="row">
	<div class="col-md-12">
		<h3>Selamat Datang </h3>
		<hr>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<img src="<?php echo base_url.'assets/img/74065.jpg' ?>" width="100%">
		<hr>
	</div>
	<div class="col-md-6">
		<p style="text-align:justify">
			Restoran Anugrah, merupakan Restoran di kota Semarang yang menyediakan berbagai macam makanan dan minuman baik. 
			<br>Restoran Anugrah ini beralamat di Jl. Rejosari I/4
		</p>
		<p>Menu yang disediakan antara lain : </p>
		<div class="row">
		<?php
		if(Lib::listKategori() == null)
		{

		}else{
		foreach (Lib::listKategori() as $ke => $k) {
		?>
			<div class="col-md-6">
			<li style="list-style-type:none; font-size:0.9em; margin-bottom:5px;">
				<a href="<?php echo app_base.'lihat_menu&id_kategori='.$k['id_kategori'].'&nama_kategori='.$k['nama_kategori'] ?>">
					<?php echo $k['nama_kategori'] ?>
				</a>
			</li>
		</div>
		<?php }} ?>
		</div>
		<p>Restoran Anugrah buka setiap hari : <br>Senin - Sabtu pukul 10.00 - 14.30 dan 16.30 - 21.00</p>
		<p>No. Telp : ( 024 ) 335-4279</p>
		<center>
			<h1><i>101% HALAL</i></h1>
		</center>
		<hr>
		<a href="<?php echo app_base.'lihat_menu' ?>">
			<button  style="width:100%; margin-left:0px;" class="button-cst cst-success"><i class="fa fa-pencil"></i> PESAN SEKARANG !</button>
		</a>
	</div>
</div>
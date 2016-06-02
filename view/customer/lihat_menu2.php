<div class="row">
	<div class="col-md-12">
		<h3>Daftar Menu</h3>
		<hr>
	</div>
</div>
<div class="row">
	<div class="col-md-2">
		<button type="button" class="button-cst cst-success btn-hold-kategori"><i class="fa fa-eye"></i> Tampilkan Kategori</button>
		<button style="display:none" type="button" class="button-cst cst-success btn-hold-kategori-close"><i class="fa fa-eye-slash"></i> Sembunyikan Kategori</button>
		<div class="hold-kategori">
		<li style="list-style-type:none; font-size:0.9em; margin-bottom:5px;">
			<a href="<?php echo app_base.'lihat_menu_unregister'?>">Semua</a>
		</li>
		<?php
		if(Lib::listKategori() == null)
		{

		}else{
		foreach (Lib::listKategori() as $ke => $k) {
		?>
		<li style="list-style-type:none; font-size:0.9em; margin-bottom:5px;">
			<a href="<?php echo app_base.'lihat_menu_unregister&id_kategori='.$k['id_kategori'].'&nama_kategori='.$k['nama_kategori'] ?>">
				<?php echo $k['nama_kategori'] ?>
			</a>
		</li>
		<?php
		}}
		?>
		</div>
		<script type="text/javascript">
			$('.btn-hold-kategori').click(function(){
				$('.hold-kategori').show();
				$('.btn-hold-kategori-close').show();
				$('.btn-hold-kategori').hide();
			});
			$('.btn-hold-kategori-close').click(function(){
				$('.hold-kategori').hide();
				$('.btn-hold-kategori-close').hide();
				$('.btn-hold-kategori').show();
			});
		</script>
	</div>
	<div class="col-md-10">
		<h4 style="margin-bottom:20px;"><?php echo (isset($_GET['nama_kategori'])) ? 'Menu : '.$_GET['nama_kategori'] : 'Menu : Semua' ?></h4>
		<hr>
		<?php
		if(isset($_GET['nama_kategori'])){
			if(!empty(Lib::gambarKategori($_GET['id_kategori']))){
		?>
		<div class="bg-image bg-image-kategori" style="
		background: url(<?php echo base_url.'public/images/'.Lib::gambarKategori($_GET['id_kategori']) ?>);  
		background-size: 100%;
		height:150px;
	    background-repeat: no-repeat;
	    -ms-background-position-x: center;
	    -ms-background-position-y: center;
	    background-position: center center;
	    margin-bottom:30px;">
		</div>
		<small>Untuk bisa memesan anda harus mendaftar & login terlebih dahulu</small>
		<hr>
		<?php
		}}
		?>
		<!-- MENU -->
		<?php
		if($data == null)
		{
			echo "Data tidak ditemukan";
		}else{
		foreach ($data as $key => $value) {
		?>
		<div class="menu-hold">
			<div class="row">
				<div class="col-md-10" style="overflow:hidden">
						<div class="pull-left">
							<img src="<?php echo base_url.'public/images/'.$value['gambar'] ?>" style="width:80px; height:80px; margin-right:10px">
						</div>
						<div class="pull-left">
							<h5 class="nama-menu"><?php echo $value['nama_menu'] ?></h5>
							<p class="deskripsi">
								<small><?php echo $value['deskripsi'] ?></small>
							</p>
						</div>	
				</div>	
				<div class="col-md-2" >
					<div class="row">
						<div class="col-md-12" style="margin-bottom:5px;">
							<div style="margin-top:10px" class="exemple2" data="<?php echo Lib::rate($value['id_menu']) ?>_2"></div>
						</div>
						<div class="col-md-12">
							<h5 class="nama-menu pull-left" style="line-height:25px; margin-right:10px;"><?php echo Lib::ind($value['harga']) ?></h5>
						</div>
					</div>
						<a href="#" data-toggle="modal" data-target="#myModal" onclick="opnTetimoniFrame(<?php echo $value['id_menu'] ?>)">
						<small><?php echo Lib::countTestimoni($value['id_menu']) ?> Testimoni</small>
							<i class="fa fa-comments" style="font-size:1.5em; float:right"></i>
						</a>
				</div>
			</div>
		</div>
		<?php
		}}
		?>
		<!-- MENU -->
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Testimoni</h4>
			</div>
			<div class="modal-body">
				<iframe name="theFrame"  frameborder="0" scrolling="no" width="100%" height="450"></iframe>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	 function opnTetimoniFrame(id_menu)
	  {
	  	window.open("<?php echo base_url.'view/customer/testimoni.php' ?>?id_menu="+id_menu, "theFrame");
	  }
</script>
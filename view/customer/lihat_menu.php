<?php
 Lib::uCheck() ?>

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
			<a href="<?php echo app_base.'lihat_menu'?>">Semua</a>
		</li>
		<?php
		if(Lib::listKategori() == null)
		{

		}else{
		foreach (Lib::listKategori() as $ke => $k) {
		?>
		<li style="list-style-type:none; font-size:0.9em; margin-bottom:5px;">
			<a href="<?php echo app_base.'lihat_menu&id_kategori='.$k['id_kategori'].'&nama_kategori='.$k['nama_kategori'] ?>">
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
	<div class="col-md-6">
		<h4 style="margin-bottom:20px;"><?php echo (isset($_GET['nama_kategori'])) ? 'Menu : '.$_GET['nama_kategori'] : 'Menu : Semua' ?></h4>
		<hr>
		<?php
		if(isset($_GET['nama_kategori'])){
			if(!empty(Lib::gambarKategori($_GET['id_kategori']))){
		?>
		<div class="bg-image bg-image-kategori" style="
		background: url(<?php echo base_url.'public/images/'.Lib::gambarKategori($_GET['id_kategori']) ?>);  
		background-size: 100%;
	    background-repeat: no-repeat;
	    -ms-background-position-x: center;
	    -ms-background-position-y: center;
	    background-position: center center;
	    margin-bottom:30px;">
		</div>
		<?php
		}
		}
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
				<div class="col-md-9" style="overflow:hidden">
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
				<div class="col-md-3" >
					<div class="row">
						<div class="col-md-12" style="margin-bottom:5px;">
							<div style="margin-top:10px" class="exemple2" data="<?php echo Lib::rate($value['id_menu']) ?>_2"></div>
						</div>
						<div class="col-md-12">
							<h5 class="nama-menu pull-left" style="line-height:25px; margin-right:10px;"><?php echo Lib::ind($value['harga']) ?></h5>
							<form method="post" action="<?php echo app_base.'tambah_ke_keranjang' ?>">
								<input type="hidden" name="id_menu" value="<?php echo $value['id_menu'] ?>">
								<?php
								if(!isset($_GET['id_kategori'])){
								}else{
								?>
								<input type="hidden" name="id_kategori" value="<?php echo $value['id_kategori'] ?>">
								<?php } ?>
								<input type="hidden" name="qty" value="1">
								<button class="transparent pull-right">
									<i class="fa fa-plus-circle" style="font-size:1.8em"></i>
								</button>
							</form>
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
	<div class="col-md-4">
		<h4>Pesanan Anda</h4>
		<hr>
		<?php
		if($data2 != null){
		?>
		<table width="100%" style="font-size:0.8em">
		<?php
		foreach ($data2 as $key2 => $value2) {
		?>
			<tr>
				<td style="border:none; padding-left:0px; padding-right:0px; width:1%; " >
					<input type="hidden" class="mn_<?php echo $value2['id_item_pesan'] ?>" value="<?php  echo $value2['id_menu'] ?>">
					<input class="itm_<?php echo $value2['id_item_pesan'] ?>" onchange="updateQty(<?php echo $value2['id_item_pesan'] ?>)" type="number" min="1" style="width:45px;" value="<?php echo $value2['qty'] ?>">
				</td>
				<td style="border:none;">x</td>
				<td style="border:none;padding-left:0px; padding-right:0px;">
					<?php echo Lib::namaMenu($value2['id_menu']) ?>
				</td>
				<td style="border:none"> : </td>
				<td style="border:none; padding-left:0px; padding-right:0px;">
					<?php echo Lib::ind(Lib::hargaMenu($value2['id_menu']) * $value2['qty']) ?>
				</td>
				<td style="border:none; padding-left:0px; padding-right:0px;">
					<i style="cursor:pointer" onclick="deleteItem(<?php echo $value2['id_item_pesan'] ?>)" class="fa fa-close" style="font-size:1.1em"></i>
				</td>
			</tr>
		<?php
		$sub[] = Lib::hargaMenu($value2['id_menu']) * $value2['qty'];
		 } 
		 ?>
			<tfoot>
				<tr>
					<td colspan="3" style="border:none; border-top:1px solid #ddd">
						Subtotal
					</td>
					<td colspan="2" style="border:none; border-top:1px solid #ddd">
						<?php echo (!empty($sub)) ? Lib::ind(array_sum($sub)) : '' ?>
					</td>
				</tr>
				<tr>
					<td colspan="3" style="border:none">
						Biaya Pengiriman
					</td>
					<td colspan="2" style="border:none">
						<?php echo ($_SESSION['kecamatan'] != '3374110') ? 'Rp. 10.000' : '-' ?>
						<?php
						if(($_SESSION['kecamatan'] != '3374110')){
							$pengiriman = 10000;
						}else{
							$pengiriman = 0;
						}
						?>
					</td>
				</tr>
				<tr>
					<td style="border:none; ">
						Subtotal
					</td>
					<td colspan="4" align="right" style="border:none; font-size:2em">
						<input type="hidden" name="vl_konfirm" value="<?php echo array_sum($sub) ?>">
						<?php echo (!empty($sub)) ? Lib::ind(array_sum($sub) + $pengiriman) : '' ?>
					</td>
				</tr>
			</tfoot>
		</table>
		<button onclick="konfirmPesanan()" style="width:100%" class="button-cst cst-success"><i class="fa fa-check"></i> Proses Checkout</button>
		<?php
		}else{
		?>
		<center>
			<i class="fa fa-shopping-cart" style="font-size:6em"></i>
			<h5>Tambahkan pesanan anda ke keranjang.</h5>
		</center>
		<?php
		}
		?>
		<hr>
		<small>*Pemesanan minimal Rp. 25.000 ( Tidak termasuk ongkir )</small>
		
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
		<?php
		if(isset($_GET['id_kategori'])){
			$ext = '&id_kategori='.$_GET['id_kategori'];
		}else{
			$ext = '';
		}
		?>
	function updateQty(id)
	{
		location.replace("<?php echo app_base.'tambah_ke_keranjang' ?>" + "&id_menu="+ $('input.mn_'+id).val() + "&qty="+$('input.itm_'+id).val() + "<?php echo $ext; ?>");
		// alert($('input.itm_'+id).val());
	}

	function deleteItem(id)
	{
		location.replace("<?php echo app_base.'delete_item' ?>&id_item="+id +"<?php echo $ext; ?>");
	}

	function konfirmPesanan()
	{
		if($('input[name=vl_konfirm]').val() <= 25000)
		{
			alert('Chekcout tidak bisa dilakukan karena belum memenuhi syarat pemesanan minimal.');
		}else{
			location.replace("<?php echo app_base.'konfirmasi_pesan' ?>");
		}
	}

	 function opnTetimoniFrame(id_menu)
	  {
	  	window.open("<?php echo base_url.'view/customer/testimoni.php' ?>?id_menu="+id_menu, "theFrame");
	  }
</script>
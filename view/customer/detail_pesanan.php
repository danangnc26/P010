<?php
 Lib::uCheck() ?>

<div class="row">
	<div class="col-md-12">
		<h3>Detail Pemesanan</h3>
		<hr>
	</div>
</div>
<div class="row">	
	<div class="col-md-5">
		<div class="row">
			<div class="col-md-12">
				<h4>Data Pemesan & Alamat Pengiriman</h4>
				<hr>
				<?php
				if($data1 == null){
				}else{
				foreach ($data1 as $key1 => $value1) {
				?>
				<div class="row" style="margin-bottom:10px;">
					<div class="col-md-4">
						<label class="b">Nama Lengkap</label>
					</div>
					<div class="col-md-7">
						<?php echo $value1['nama_lengkap'] ?>
					</div>
				</div>
				<div class="row" style="margin-bottom:10px;">
					<div class="col-md-4">
						<label class="b">No. HP / Telp</label>
					</div>
					<div class="col-md-7">
						<?php echo $value1['no_hp'] ?>
					</div>
				</div>
				<div class="row" style="margin-bottom:10px;">
					<div class="col-md-4">
						<label class="b">Alamat</label>
					</div>
					<div class="col-md-7" style="text-transform: capitalize;">
						<?php echo $value1['alamat'].', '.Lib::namaKecamatan($value1['id_kecamatan']) ?>
					</div>
				</div>
				<?php  }} ?>
			</div>
			<div class="col-md-12" style="margin-bottom:10px;">
				<h4>Data Pemesanan</h4>
				<hr>
				<?php
				if($data3 == null){

				}else{
				foreach ($data3 as $key3 => $value3) {
				?>
				<div class="row" style="margin-bottom:10px;">
					<div class="col-md-4">
						<label class="b">No. Pemesanan</label>
					</div>
					<div class="col-md-7">
						<?php echo $value3['id_pesan'] ?>
					</div>
				</div>
				<div class="row" style="margin-bottom:10px;">
					<div class="col-md-4">
						<label class="b">Tanggal Pemesanan</label>
					</div>
					<div class="col-md-7">
						<?php echo Lib::dateInd($value3['tanggal'], true) ?>
					</div>
				</div>
				<div class="row" style="margin-bottom:10px;">
					<div class="col-md-4">
						<label class="b">Status Pemesanan</label>
					</div>
					<div class="col-md-7">
						<?php echo Lib::status($value3['status']) ?>
					</div>
				</div>
				<div class="row" style="margin-bottom:10px;">
					<div class="col-md-4">
						<label class="b">Metode Pembayaran</label>
					</div>
					<div class="col-md-7">
						<?php echo Lib::metodeBayar($value3['metode_bayar']) ?>
					</div>
				</div>
				<?php  
				$stt[] = $value3['status'];
				}} ?>
			</div>
		</div>
	</div>
	<div class="col-md-7">
		<h4>Pesanan Anda</h4>
		<hr>
		<?php
		if($data2 == null)
		{

		}else{
		foreach ($data2 as $key2 => $value2) {
		?>
		<div class="menu-hold">
			<div class="row">
				<div class="col-md-7" style="overflow:hidden">
					<div class="pull-left">
							<img src="<?php echo base_url.'public/images/'.Lib::gambarMenu($value2['id_menu']) ?>" style="width:80px; height:80px; margin-right:10px">
						</div>
						<div class="pull-left">
							<h5 id="nama_menu_<?php echo $value2['id_menu'] ?>" class="nama-menu"><?php echo Lib::namaMenu($value2['id_menu']) ?></h5>
							<p id="deskripsi_menu_<?php echo $value2['id_menu'] ?>" class="deskripsi">
								<small><?php echo Lib::deskripsiMenu($value2['id_menu']) ?></small>
							</p>
						</div>	
					<input type="hidden" class="for_mdl_<?php echo $value2['id_menu'] ?>" value="<?php echo $value2['id_menu'] ?>">
					<input type="hidden" class="for_mdl_id_pesan_<?php echo $value2['id_menu'] ?>" value="<?php echo $_GET['id_pesan'] ?>">
				</div>	
				<div class="col-md-5" >
					<div class="row">
						<div class="col-md-12">
							<h5 class="nama-menu pull-right" style="line-height:25px; margin-right:10px;"><?php echo Lib::ind(Lib::hargaMenu($value2['id_menu']) * $value2['qty']) ?></h5>
							<h5 class="nama-menu" style="line-height:25px; margin-right:10px;"><?php echo $value2['qty'] ?> x <?php echo Lib::ind(Lib::hargaMenu($value2['id_menu'])) ?></h5>
						</div>
						<div class="col-md-12">
							<?php
							if(Lib::sTestimoni($value2['id_menu'], $_GET['id_pesan']) != null){
							?>
							<i onclick="alert('Anda sudah memberi feedback')" class="fa fa-comments" style="font-size:1.5em; cursor:pointer; float:right; color:#20ac76"></i>
							<?php
							}else{
								if(implode('', $stt) == 4){
							?>
								<i data-toggle="modal" data-target="#myModal" onclick="opnFrame(<?php echo $value2['id_menu'] ?>, <?php echo $_GET['id_pesan'] ?>)" class="fa fa-comments" style="font-size:1.5em; cursor:pointer; float:right;"></i>
							<?php 
								}else{
							?>
								<i onclick="alert('Tombol akan aktif setelah status pemesanan selesai')" class="fa fa-comments" style="font-size:1.5em; cursor:pointer; float:right; color:#d73925"></i>
							<?php
								}
							} ?>
							<div class="exemple2 pull-left" data="<?php echo Lib::rate($value2['id_menu']) ?>_2"></div>

						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
		$sub[] = Lib::hargaMenu($value2['id_menu']) * $value2['qty'];
		}}
		?>
	<div class="row" >
		<div class="col-md-7"></div>
		<div class="col-md-5" style="padding-right:25px; margin-bottom:10px;">
			<h5 class="pull-right">
				<?php echo (!empty($sub)) ? Lib::ind(array_sum($sub)) : '' ?>
			</h5>
			<h5>Subtotal</h5>
		</div>
	</div>
	<div class="row" >
		<div class="col-md-7"></div>
		<div class="col-md-5" style="padding-right:25px; margin-bottom:20px;">
			<h5 class="pull-right">
				<?php echo ($_SESSION['kecamatan'] != '3374110') ? 'Rp. 10.000' : '-' ?>
						<?php
						if(($_SESSION['kecamatan'] != '3374110')){
							$pengiriman = 10000;
						}else{
							$pengiriman = 0;
						}
				?>
			</h5>
			<h5>Biaya Pengiriman</h5>
		</div>
	</div>
	<div style="background:#dfdfdf; padding:10px 15px 10px 15px; border-radius:3px;">
	<h5 style="font-size:1.1em; font-weight:bold" class="pull-right">
		<?php echo (!empty($sub)) ? Lib::ind(array_sum($sub) + $pengiriman) : '' ?>
		<input type="hidden" name="total" value="<?php echo array_sum($sub) + $pengiriman ?>">
	</h5>
		<h5 style="font-size:1.1em; font-weight:bold" >Total</h5>
	</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<hr>
		<a href="<?php echo app_base.'daftar_pemesanan' ?>">
			<button type="button" class="button-cst cst-danger pull-right" ><i class="fa fa-arrow-left"></i> Kembali</button>
		</a>
	</div>
</div>
<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Feedback Pelanggan</h4>
        </div>
        <form method="post" action="<?php echo app_base.'save_feedback' ?>">
        <div class="modal-body">
        <iframe name="theFrame"  frameborder="0" scrolling="no" width="100%" height="450"></iframe>
        </form>
      </div>
      
    </div>
  </div>
  <script type="text/javascript">
  function opnFrame(id_menu, id_pesan)
  {
  	window.open("<?php echo base_url.'view/customer/feedback.php' ?>?id_menu="+id_menu+"&id_pesan="+id_pesan, "theFrame");
  }
 
  function resizeIframe(obj) {
    obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
  }
  // function opnModal(id)
  // {
  // 	// alert('asdf'+id);
  // 		$('.mdl-nama-menu').text($('#nama_menu_'+id).text());
  // 		$('.mdl-deskripsi-menu').text($('#deskripsi_menu_'+id).text());
  // 		$('input.mdl_id_pesan').val($('input.for_mdl_id_pesan_'+id).val());
  // 		$('input.mdl_id_menu').val($('input.for_mdl_'+id).val());
  // 		$('.exemple6').attr('id', 'rt_'+id);
  		
  		
  // }

  // function rate_it()
  // {
  // 	var tx = $('p.jRatingInfos').text();
  // 	var tx2 = tx.split(' / ');
  // 	$('input.mdl_rating').val(tx2[0]);
  // 	$('.exemple6').attr('onclick', '');
  // }
  </script>
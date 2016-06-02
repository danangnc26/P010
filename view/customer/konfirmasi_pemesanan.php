<?php
 Lib::uCheck() ?>

<div class="row">
	<div class="col-md-12">
		<h3>Konfirmasi Pemesanan</h3>
		<hr>
	</div>
</div>
<div class="row">
	<form method="post" action="<?php echo app_base.'kirim_pesanan' ?>">
	
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
				<h4>Pembayaran</h4>
				<hr>
				<small>Pilih metode pembayaran yang akan anda gunakan.</small>
				<br><br>
				<div class="row">
					<div class="col-md-3">
						<label class="b">
							<input required type="radio" class="trf" name="pembayaran" value="T"> Transfer
						</label>
					</div>
					<div class="col-md-6">
						<label class="b">
							<input required type="radio" class="byr" name="pembayaran" value="C"> Bayar saat pesanan tiba
						</label>
					</div>
					<div class="col-md-12">
						<div class="hold_trf" style="display:none">
							<p>Silahkan lakukan pembayaran pada No. Rekening yang tertera dibawah ini :</p>
							<li> BCA 0191092121  - a.n RM. Anugrah</li>
					  		<li> BNI 4021390131  - a.n RM. Anugrah</li>
					  		<li> Mandiri 3824719223  - a.n RM. Anugrah</li>
					  		<li> BRI 1938183102  - a.n RM. Anugrah</li>
						</div>
						<div class="hold_byr" style="display:none">
							<p>Tagihan akan dibayarkan kepada kurir RM. Anugrah pada saat pesanan tiba di tempat tujuan.</p>
						</div>
					</div>
					<script type="text/javascript">
						$('input[name=pembayaran]').change(function(){
							if($('input[name=pembayaran]:checked').attr('class') == 'trf'){
								$('.hold_trf').show();
								$('.hold_byr').hide();
							}else{
								$('.hold_trf').hide();
								$('.hold_byr').show();
							}
						});
					</script>
				</div>
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
							<h5 class="nama-menu"><?php echo Lib::namaMenu($value2['id_menu']) ?></h5>
							<p class="deskripsi">
								<small><?php echo Lib::deskripsiMenu($value2['id_menu']) ?></small>
							</p>
						</div>	
				</div>	
				<div class="col-md-5" >
					<div class="row">
						<div class="col-md-12">
							<h5 class="nama-menu pull-left" style="line-height:25px; margin-right:10px;"><?php echo $value2['qty'] ?> x <?php echo Lib::ind(Lib::hargaMenu($value2['id_menu'])) ?></h5>
							<h5 class="nama-menu pull-right" style="line-height:25px; margin-right:10px;"><?php echo Lib::ind(Lib::hargaMenu($value2['id_menu']) * $value2['qty']) ?></h5>
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
		<button onclick="return confirm('Pesanan yang dikirim tidak dapat di ubah lagi, lanjutkan?')" class="button-cst cst-success pull-right"><i class="fa fa-send"></i> Kirim Pesanan</button>
		<a href="<?php echo app_base.'lihat_menu' ?>">
			<button type="button" class="button-cst cst-danger pull-right" ><i class="fa fa-arrow-left"></i> Kembali</button>
		</a>
	</div>
</div>
</form>
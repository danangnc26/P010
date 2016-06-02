<div class="row">
	<?php include "view/admin/component-admin.php" ?>
</div>
<div class="row">
	<div class="col-md-2">
		<?php include "view/admin/component-menu.php" ?>
	</div>
	<div class="col-md-10">
		<h3><i class="fa fa-bell-o"></i> Kelola Pesanan / <small>Detail Pesanan</small></h3>
		<hr>
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
						<?php  
						$i_kecamatan[] = $value1['id_kecamatan'];
						}} ?>
					</div>
				</div>
			</div>
			<div class="col-md-7" style="margin-bottom:10px;">
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
								<div class="row">
									<form method="post" action="<?php echo app_base.'update_status' ?>">
									<div class="col-md-6" style="padding-right:0px; padding-left:0px;">
										<input type="hidden" name="id_pesan" value="<?php echo $value3['id_pesan'] ?>">
										<input type="hidden" name="id_user" value="<?php echo $_GET['id_user'] ?>">
										<select class="form-control cst" name="status">
											<option <?php echo ($value3['status'] == '') ? 'selected' : '' ?>>-- Pilih Status Pesanan -- </option>
											<option <?php echo ($value3['status'] == '1') ? 'selected' : '' ?> value="1">Pending</option>
											<option <?php echo ($value3['status'] == '2') ? 'selected' : '' ?> value="2">Pesanan dalam proses</option>
											<option <?php echo ($value3['status'] == '3') ? 'selected' : '' ?> value="3">Pesanan Dikirim</option>
											<option <?php echo ($value3['status'] == '4') ? 'selected' : '' ?> value="4">Pesanan Selesai</option>
										</select>
									</div>
									<div class="col-md-6" style="padding-right:0px; padding-left:0px;">
										<button  style="padding-left:20px; padding-right:20px;" class="button-cst cst-success pull-right" style="font-size:1em"><i class="fa fa-refresh"></i> Update Status</button>
									</div>
									</form>
								</div>
								
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
						<?php  }} ?>
					</div>
					<div class="col-md-12">
				<h4>Pesanan Customer</h4>
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
									<h5 class="nama-menu pull-right" style="line-height:25px; margin-right:10px;"><?php echo Lib::ind(Lib::hargaMenu($value2['id_menu']) * $value2['qty']) ?></h5>
									<h5 class="nama-menu" style="line-height:25px; margin-right:10px;"><?php echo $value2['qty'] ?> x <?php echo Lib::ind(Lib::hargaMenu($value2['id_menu'])) ?></h5>
								</div>
								<div class="col-md-12">

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
						<?php echo (implode('', $i_kecamatan) != '3374110') ? 'Rp. 10.000' : '-' ?>
						<?php
						if((implode('', $i_kecamatan) != '3374110')){
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
				<a href="<?php echo app_base.'index_pesanan' ?>">
					<button type="button" class="button-cst cst-danger pull-right" ><i class="fa fa-arrow-left"></i> Kembali</button>
				</a>
			</div>
		</div>
	</div>
</div>


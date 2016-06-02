<?php
Lib::uCheck() ?>

<div class="row">
	<div class="col-md-12">
		<h3>Ubah Data Diri</h3>
		<hr>
	</div>
</div>
<div class="row">	
	<div class="col-md-6">
	<?php
	if(empty($data)){
	}else{
	foreach ($data as $key => $value) {
	?>
		<form method="post" action="<?php echo app_base.'update_profil' ?>">
			<div class="form-group">
				<label>Nama Lengkap : </label>
				<input class="form-control cst" type="text" name="nama_lengkap" required value="<?php echo $value['nama_lengkap'] ?>">
			</div>
			<div class="form-group">
				<label>No. HP / Telp : </label>
				<input class="form-control cst" type="text" name="no_hp" required  pattern="[0-9].{5,}" title="Gunakan Format Angka" value="<?php echo $value['no_hp'] ?>">
			</div>
			<div class="form-group">
				<label>Alamat: </label>
				<input class="form-control cst" type="text" name="alamat" required value="<?php echo $value['alamat'] ?>">
			</div>
			<div class="form-group">
				<label>Kecamatan: </label>
				<select class="form-control cst" name="id_kecamatan" required>
					<?php echo Lib::listKecamatan($value['id_kecamatan']) ?>
				</select>
				<!-- <input class="form-control cst" type="text" name="alam" required> -->
			</div>
			<div class="form-group">
				<button style="margin-left:0px" class="button-cst cst-success"><i class="fa fa-check"></i> Simpan</button>
			</div>
		</form>
	</div>
	<?php
	}}
	?>
</div>

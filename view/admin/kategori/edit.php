<div class="row">
	<?php include "view/admin/component-admin.php" ?>
</div>
<div class="row">
	<div class="col-md-2">
		<?php include "view/admin/component-menu.php" ?>
	</div>
	<div class="col-md-10">
		<h3><i class="fa fa-list"></i> Kelola Kategori / <small>Edit Kategori</small></h3>
		<hr>
		<div class="row">
		<?php
		if($data == null){

		}else{
		foreach ($data as $key => $value) {
		?>
			<form method="post" action="<?php echo app_base.'update_kategori' ?>" enctype="multipart/form-data">
				<input type="hidden" name="id_kategori" value="<?php echo $value['id_kategori'] ?>" >
				<div class="col-md-6">
					<div class="form-group">
						<label>Nama Kategori : </label>
						<input type="text" class="form-control cst" name="nama_kategori" value="<?php echo $value['nama_kategori'] ?>" required>
					</div>
					<div class="form-group">
						<label>Jenis : </label>
						<select class="form-control cst" name="jenis" required>
							<option <?php echo ($value['jenis'] == '') ? 'selected' : '' ?> value="">-- Pilih Jenis -- </option>
							<option <?php echo ($value['jenis'] == 'Makanan') ? 'selected' : '' ?> value="Makanan">Makanan</option>
							<option <?php echo ($value['jenis'] == 'Minuman') ? 'selected' : '' ?> value="Minuman">Minuman</option>
							<option <?php echo ($value['jenis'] == 'Lain') ? 'selected' : '' ?> value="Lain">Lain-lain</option>
						</select>
					</div>
					<div class="form-group">
						<label>File Gambar : </label>
						<input type="file" name="gambar">
					</div>
					<div class="form-group">
						<button class="button-cst cst-success"><i class="fa fa-check"></i> Simpan</button>
						<a href="<?php echo app_base.'index_kategori' ?>">
							<button type="button" class="button-cst cst-danger"><i class="fa fa-arrow-left"></i> Kembali</button>
						</a>
					</div>
				</div>
			</form>
		<?php
		}}
		?>
		</div>
	</div>
</div>
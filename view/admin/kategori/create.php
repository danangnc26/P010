<div class="row">
	<?php include "view/admin/component-admin.php" ?>
</div>
<div class="row">
	<div class="col-md-2">
		<?php include "view/admin/component-menu.php" ?>
	</div>
	<div class="col-md-10">
		<h3><i class="fa fa-list"></i> Kelola Kategori / <small>Tambah Kategori</small></h3>
		<hr>
		<div class="row">
			<form method="post" action="<?php echo app_base.'save_kategori' ?>" enctype="multipart/form-data">
				<div class="col-md-6">
					<div class="form-group">
						<label>Nama Kategori : </label>
						<input type="text" class="form-control cst" name="nama_kategori" required>
					</div>
					<div class="form-group">
						<label>Jenis : </label>
						<select class="form-control cst" name="jenis" required>
							<option value="">-- Pilih Jenis -- </option>
							<option value="Makanan">Makanan</option>
							<option value="Minuman">Minuman</option>
							<option value="Lain">Lain-lain</option>
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
		</div>
	</div>
</div>
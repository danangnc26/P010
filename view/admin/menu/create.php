<div class="row">
	<?php include "view/admin/component-admin.php" ?>
</div>
<div class="row">
	<div class="col-md-2">
		<?php include "view/admin/component-menu.php" ?>
	</div>
	<div class="col-md-10">
		<h3><i class="fa fa-pencil"></i> Kelola Menu / <small>Tambah Menu</small></h3>
		<hr>
		<div class="row">
			<form method="post" action="<?php echo app_base.'save_menu' ?>" enctype="multipart/form-data">
				<div class="col-md-6">
					<div class="form-group">
						<label>Nama Menu : </label>
						<input type="text" class="form-control cst" name="nama_menu" required>
					</div>
					<div class="form-group">
						<label>Deskripsi : </label>
						<textarea class="form-control cst" name="deskripsi" rows="5" style="resize:none;"></textarea>
					</div>
					<div class="form-group">
						<label>Harga : </label>
						<input type="text" class="form-control cst" name="harga" required pattern="[0-9].{1,}" title="Gunakan Format Angka"> 
					</div>
					<div class="form-group">
						<label>Kategori : </label>
						<select class="form-control cst" name="id_kategori" required>
							<?php echo Lib::dropKategori() ?>
						</select>
					</div>
					<div class="form-group">
						<label>File Gambar : </label>
						<input type="file" name="gambar">
					</div>
					<div class="form-group">
						<button style="margin-left:0px;" class="button-cst cst-success"><i class="fa fa-check"></i> Simpan</button>
						<a href="<?php echo app_base.'index_menu' ?>">
							<button type="button" class="button-cst cst-danger"><i class="fa fa-arrow-left"></i> Kembali</button>
						</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
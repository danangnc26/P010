<div class="row">
	<?php include "view/admin/component-admin.php" ?>
</div>
<div class="row">
	<div class="col-md-2">
		<?php include "view/admin/component-menu.php" ?>
	</div>
	<div class="col-md-10">
		<a href="<?php echo app_base.'create_kategori' ?>">
			<button class="button-cst cst-success pull-right">
				<i class="fa fa-plus"></i> Tambah Kategori
			</button>
		</a>
		<h3><i class="fa fa-list"></i> Kelola Kategori / <small>Daftar Kategori</small></h3>
		<hr>
		<table class="dt">
			<thead>
				<tr>
					<th width="10">No.</th>
					<th>Nama Kategori</th>
					<th>Jenis Kategori</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				if($data == null){
					echo '<tr><td colspan="4" align="center"> -- Data tidak ditemukan. -- </td></tr>';
				}else{

				foreach ($data as $key => $value) {
				?>
				<tr>
					<td><?php echo $key+1 ?></td>
					<td><?php echo $value['nama_kategori'] ?></td>
					<td><?php echo $value['jenis'] ?></td>
					<td align="center" width="100">
							<a href="<?php echo app_base.'edit_kategori&id_kategori='.$value['id_kategori'] ?>" title="Edit">
								<i style="font-size:1.8em; margin-right:20px;" class="fa fa-edit"></i>
							</a>
							<a onclick="return confirm('Hapus data ini?')" href="<?php echo app_base.'delete_kategori&id_kategori='.$value['id_kategori'] ?>" title="Hapus">
								<i style="font-size:1.8em" class="fa fa-trash"></i>
							</a>
					</td>
				</tr>
				<?php
				}}
				?>
			</tbody>
		</table>
	</div>
</div>
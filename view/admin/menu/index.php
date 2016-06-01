<div class="row">
	<?php include "view/admin/component-admin.php" ?>
</div>
<div class="row">
	<div class="col-md-2">
		<?php include "view/admin/component-menu.php" ?>
	</div>
	<div class="col-md-10">
		<a href="<?php echo app_base.'create_menu' ?>">
			<button class="button-cst cst-success pull-right">
				<i class="fa fa-plus"></i> Tambah Menu
			</button>
		</a>
		<div class="btn-group pull-right" style="margin-right:10px;">
			<button type="button" class="button-cst cst-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			Kategori <span class="caret"></span>
			</button>
			<ul class="dropdown-menu">
				<li><a href="<?php echo app_base.'index_menu' ?>">Semua Kategori</a></li>
				<?php
				if(Lib::listKategori() != null){
				foreach (Lib::listKategori() as $k) {
				?>
				<li><a href="<?php echo app_base.'index_menu&id_kategori='.$k['id_kategori'].'&nama_kategori='.$k['nama_kategori'] ?>"><?php echo $k['nama_kategori'] ?></a></li>
				<?php }} ?>
			</ul>
		</div>
		<h3><i class="fa fa-pencil"></i> Kelola Menu / <small>Daftar Menu <?php echo (isset($_GET['nama_kategori'])) ? ' - '.$_GET['nama_kategori'] : '' ?></small></h3>
		<hr>
		<table class="dt">
			<thead>
				<tr>
					<th width="10">No.</th>
					<th>Nama Menu</th>
					<th>Deskripsi</th>
					<th>Harga</th>
					<th>Rating</th>
					<th>Testimoni</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				if($data == null){
					echo '<tr><td colspan="5" align="center"> -- Data tidak ditemukan. -- </td></tr>';
				}else{

				foreach ($data as $key => $value) {
				?>
				<tr>
					<td><?php echo $key+1 ?></td>
					<td><?php echo $value['nama_menu'] ?></td>
					<td><?php echo $value['deskripsi'] ?></td>
					<td><?php echo Lib::ind($value['harga']) ?></td>
					<td >
						<div class="exemple2" data="<?php echo Lib::rate($value['id_menu']) ?>_2"></div>
					</td>
					<td align="center">
						<?php echo Lib::countTestimoni($value['id_menu']) ?> <i class="fa fa-comments" style="font-size:1.5em; cursor:pointer; "></i>
					</td>
					<td align="center" width="100">
							<a href="<?php echo app_base.'edit_menu&id_menu='.$value['id_menu'] ?>" title="Edit">
								<i style="font-size:1.8em; margin-right:20px;" class="fa fa-edit"></i>
							</a>
							<a onclick="return confirm('Hapus data ini?')" href="<?php echo app_base.'delete_menu&id_menu='.$value['id_menu'] ?>" title="Hapus">
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
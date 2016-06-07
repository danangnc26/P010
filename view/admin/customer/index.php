<div class="row">
	<?php include "view/admin/component-admin.php" ?>
</div>
<div class="row">
	<div class="col-md-2">
		<?php include "view/admin/component-menu.php" ?>
	</div>
	<div class="col-md-10">
		<h3><i class="fa fa-users"></i> Kelola Customer / <small>Daftar Customer</small></h3>
		<hr>
		<table class="dt">
			<thead>
				<tr>
					<th width="10">No.</th>
					<th>Nama Lengkap</th>
					<th>No. Telp / HP</th>
					<th>Alamat</th>
					<th>Kecamatan</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				if($data == null){
					echo '<tr><td colspan="6" align="center"> -- Data tidak ditemukan. -- </td></tr>';
				}else{

				foreach ($data as $key => $value) {
				?>
				<tr>
					<td><?php echo $key+1 ?></td>
					<td><?php echo $value['nama_lengkap'] ?></td>
					<td><?php echo $value['no_hp'] ?></td>
					<td><?php echo $value['alamat'] ?></td>
					<td><?php echo Lib::namaKecamatan($value['id_kecamatan']) ?></td>
					<td align="center" width="100">
							<!-- <a href="<?php echo app_base.'edit_user&id_user='.$value['id_user'] ?>" title="Edit">
								<i style="font-size:1.8em; margin-right:20px;" class="fa fa-edit"></i>
							</a> -->
							<a onclick="return confirm('Hapus data ini?')" href="<?php echo app_base.'delete_user&id_user='.$value['id_user'] ?>" title="Hapus">
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
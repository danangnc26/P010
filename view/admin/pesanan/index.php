<div class="row">
	<?php include "view/admin/component-admin.php" ?>
</div>
<div class="row">
	<div class="col-md-2">
		<?php include "view/admin/component-menu.php" ?>
	</div>
	<div class="col-md-10">
		<h3><i class="fa fa-bell-o"></i> Kelola Pesanan / <small>Daftar Pesanan</small></h3>
		<hr>
		<table class="dt">
			<thead>
				<tr>
					<th width="10">No.</th>
					<th>No. Pesanan</th>
					<th>Tanggal</th>
					<th>Total</th>
					<th>Status</th>
					<th>Metode Pembayaran</th>
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
				<tr <?php echo ($value['status'] == 4) ? 'style="background:#eafbf4"' : 'style="background:#ffebeb"' ?>>
					<td><?php echo $key+1 ?></td>
					<td><?php echo $value['id_pesan'] ?></td>
					<td><?php echo Lib::dateInd($value['tanggal'], true) ?></td>
					<td><?php echo Lib::ind($value['total']) ?></td>
					<td><?php echo Lib::status($value['status']) ?></td>
					<td><?php echo Lib::metodeBayar($value['metode_bayar']) ?></td>
					<td align="center"  width="100">
						<a href="<?php echo app_base.'detail_pesanan_admin&id_pesan='.$value['id_pesan'].'&id_user='.$value['id_user'] ?>">
							<i style="font-size:1.8em; margin-right:20px;" class="fa fa-eye"></i>
						</a>
						<a onclick="return confirm('Hapus pemesanan?')" href="<?php echo app_base.'hapus_pesanan&id_pesan='.$value['id_pesan'] ?>">
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
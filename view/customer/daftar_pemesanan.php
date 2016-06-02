<?php
 Lib::uCheck() ?>

<div class="row">
	<div class="col-md-12">
		<h3>Daftar Pemesanan</h3>
		<hr>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<table class="resp">
			<thead>
				<tr>
					<th width="10">No.</th>
					<th>Tanggal</th>
					<th>Total</th>
					<th>Status</th>
					<th>Metode Pembayaran</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			<?php
			if($data == null)
			{
				echo '<tr><td colspan="6" align="center"> -- Data tidak ditemukan. -- </td></tr>';
			}else{
			foreach ($data as $key => $value) {
			?>
				<tr <?php echo ($value['status'] == 4) ? 'style="background:#eafbf4"' : 'style="background:#ffebeb"' ?>>
					<td data-label="No."><?php echo $key+1 ?></td>
					<td data-label="Tanggal"><?php echo Lib::dateInd($value['tanggal'], true) ?></td>
					<td data-label="Total"><?php echo Lib::ind($value['total']) ?></td>
					<td data-label="Status"><?php echo Lib::status($value['status']) ?></td>
					<td data-label="Metode Pembayaran"><?php echo Lib::metodeBayar($value['metode_bayar']) ?></td>
					<td data-label="Action" align="center">
						<a href="<?php echo app_base.'detail_pesanan&id_pesan='.$value['id_pesan'] ?>">
							<button type="button" class="button-cst cst-success" ><i class="fa fa-eye"></i> Detail</button>
						</a>
						<?php
						if($value['status'] == 4){
						?>
						<a onclick="return alert('Fungsi tombol dinonaktifkan')" href="#">
							<button style="color:#999" type="button" class="button-cst cst-default" ><i class="fa fa-close"></i> Batal</button>
						</a>
						<?php
						}else{
						?>
						<a onclick="return confirm('Batalkan pemesanan?')" href="<?php echo app_base.'batal_pemesanan&id_pesan='.$value['id_pesan'] ?>">
							<button type="button" class="button-cst cst-danger" ><i class="fa fa-close"></i> Batal</button>
						</a>
						<?php } ?>
					</td>
				</tr>
			<?php
			}}
			?>
			</tbody>
		</table>
	</div>
</div>

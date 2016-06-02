		<?php
			if(isset($_GET['tahun']) || isset($_GET['bulan'])){
				$s1 = $_GET['bulan'];
				$s2 = $_GET['tahun'];
			}else{
				$s1 = date('m');
				$s2 = date('Y');
			}
		?>
<script type="text/javascript">

    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', 'Print laporan', 'height=600,width=1000');
        mywindow.document.write('<html><head><title>Print Laporan</title>');
        /*optional stylesheet*/ //mywindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
        mywindow.document.write('<style>h4{font-size:25px;} hr{border:none; border-bottom:1px solid #000;} table{width:100%} table td{font-size:12px;}</style></head><body >');
        mywindow.document.write('<center><h4>Laporan Penjualan Restoran Anugrah</h4><h4>Bulan <?php echo $s1 ?> Tahun <?php echo $s2 ?></h4></center>');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10

        mywindow.print();
        mywindow.close();

        return true;
    }

</script>
<div class="row">
	<?php include "view/admin/component-admin.php" ?>
</div>
<div class="row">
	<div class="col-md-2">
		<?php include "view/admin/component-menu.php" ?>
	</div>
	<div class="col-md-10">
		<h3><i class="fa fa-paste"></i> Laporan</h3>
		<hr>
		<div class="row">
			<form method="get" action="<?php echo app_base.'index_laporan' ?>">
				<input type="hidden" name="page" value="index_laporan">
				<div class="col-md-2" style="padding-right:0px;">
					<select name="bulan" class="form-control cst">
						<option <?php echo ($s1 == '01') ? 'selected' : ''; ?> value="01">Januari</option>
						<option <?php echo ($s1 == '02') ? 'selected' : ''; ?> value="02">Februari</option>
						<option <?php echo ($s1 == '03') ? 'selected' : ''; ?> value="03">Maret</option>
						<option <?php echo ($s1 == '04') ? 'selected' : ''; ?> value="04">April</option>
						<option <?php echo ($s1 == '05') ? 'selected' : ''; ?> value="05">Mei</option>
						<option <?php echo ($s1 == '06') ? 'selected' : ''; ?> value="06">Juni</option>
						<option <?php echo ($s1 == '07') ? 'selected' : ''; ?> value="07">Juli</option>
						<option <?php echo ($s1 == '08') ? 'selected' : ''; ?> value="08">Agustus</option>
						<option <?php echo ($s1 == '09') ? 'selected' : ''; ?> value="09">September</option>
						<option <?php echo ($s1 == '10') ? 'selected' : ''; ?> value="10">Oktober</option>
						<option <?php echo ($s1 == '11') ? 'selected' : ''; ?> value="11">November</option>
						<option <?php echo ($s1 == '12') ? 'selected' : ''; ?> value="12">Desember</option>
					</select>
				</div>
				<div class="col-md-2" style="padding-right:0px;">
					<select name="tahun" class="form-control cst">
						<option <?php echo ($s2 == 2016) ? 'selected' : ''; ?> value="2016">2016</option>
						<option <?php echo ($s2 == 2015) ? 'selected' : ''; ?> value="2015">2015</option>
						<option <?php echo ($s2 == 2014) ? 'selected' : ''; ?> value="2014">2014</option>
						<option <?php echo ($s2 == 2013) ? 'selected' : ''; ?> value="2013">2013</option>
						<option <?php echo ($s2 == 2012) ? 'selected' : ''; ?> value="2012">2012</option>
						<option <?php echo ($s2 == 2011) ? 'selected' : ''; ?> value="2011">2011</option>
						<option <?php echo ($s2 == 2010) ? 'selected' : ''; ?> value="2010">2010</option>
					</select>
				</div>
				<div class="col-md-2" style="padding-right:0px;">
					<button style="margin:0px;" class="button-cst cst-success"><i class="fa fa-eye"></i> Tampikan</button>
				</div>
				<div class="col-md-2" style="padding-right:0px;">
					<button type="button" onclick="PrintElem('#print_laporan')"  style="margin:0px;" class="button-cst cst-success"><i class="fa fa-print"></i> Cetak</button>
				</div>
				</form>
		</div>
		<div class="row">
			<div class="col-md-12">
				<hr>
				<div id="print_laporan">
				<table class="dt" border="1px" style="border-collapse:collapse">
					<thead>
						<tr>
							<th width="10">No.</th>
							<th>Tanggal</th>
							<th>No. Pesan</th>
							<th>Item</th>
							<th>Harga</th>
							<th>Jml Pesan</th>
							<th>Sub Total</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						if($data == null){
							echo '<tr><td colspan="7" align="center"> -- Data tidak ditemukan. -- </td></tr>';
						}else{
						foreach ($data as $key => $value) {
						?>
						<tr>
							<td><?php echo $key+1 ?></td>
							<td><?php echo Lib::dateInd($value['tanggal'], true) ?></td>
							<td><?php echo $value['id_pesan'] ?></td>
							<td><?php echo $value['nama_menu'] ?></td>
							<td><?php echo Lib::ind($value['harga']) ?></td>
							<td><?php echo $value['qty'] ?></td>
							<td><?php echo Lib::ind($value['harga'] * $value['qty']) ?></td>
						</tr>
						<?php
						$subtotal[] = $value['harga'] * $value['qty'];
						}}
						?>
					</tbody>
					<tfoot>
						<tr>
							<th colspan="6">Total</th>
							<td><?php echo (isset($subtotal)) ? Lib::ind(array_sum($subtotal)) : '' ?></td>
						</tr>
					</tfoot>
				</table>
				</div>
			</div>
		</div>
	</div>
</div>
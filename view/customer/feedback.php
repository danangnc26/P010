<?php
	require_once dirname(__DIR__).DIRECTORY_SEPARATOR.'../function/route.php';
?>
<!doctype html>
<html lang=''>
<head>
	<title>SIPMAK</title>
	<meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, user-scalable=0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <!-- JQUERY LIB -->
    <script src="<?php echo base_url ?>assets/js/jquery-1.11.3.min.js"></script>
	<!-- BOOTSTRAP -->
	<link rel="stylesheet" href="<?php echo base_url ?>assets/css/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url ?>assets/css/bootstrap/bootstrap-theme.min.css" >
	<script src="<?php echo base_url ?>assets/css/bootstrap/bootstrap.min.js"></script>
	<!-- BOOTSTRAP -->

	<!-- CUSTOM STYLES -->
	<link media="all" type="text/css" rel="stylesheet" href="<?php echo base_url ?>assets/css/style.css">
	<!-- FONT AWESOME -->
	<link media="all" type="text/css" rel="stylesheet" href="<?php echo base_url ?>assets/plugin/font-awesome/css/font-awesome.min.css">

	<!-- JRATING -->
	<link media="all" type="text/css" rel="stylesheet" href="<?php echo base_url ?>assets/plugin/jRating/jquery/jRating.jquery.css">
	<script src="<?php echo base_url ?>assets/plugin/jRating/jquery/jRating.jquery.js"></script>

</head>
<body style="background:#fff; padding:10px;">
 		<div class="row">
 		<?php  
 		if(Lib::getForFeedback($_GET['id_menu']) == null){

 		}else{
 		foreach (Lib::getForFeedback($_GET['id_menu']) as $key => $value) {
 		?>
 		<form method="post" action="<?php echo base_url.app_base.'save_feedback' ?>">
 			<div class="col-md-12">
 				  <div class="mdl-nama-menu nama-menu"><?php echo $value['nama_menu'] ?></div>
		          <p class="mdl-deskripsi-menu deskripsi"><?php echo $value['deskripsi'] ?></p>
		          <input type="hidden" class="mdl_id_menu" name="id_menu" value="<?php echo $value['id_menu'] ?>">
		          <input type="hidden" class="mdl_id_pesan" name="id_pesan" value="<?php echo $_GET['id_pesan'] ?>">
		          <input type="hidden" class="mdl_rating" name="rate" value="0">
		          <hr>
		          <div class="form-group">
		          	<label class="b">Beri Rating</label> <small>Arahkan kursor pada bintang</small>
		          	<div class="exemple6" data="1_2" onclick="rate_it()"></div>
		          </div>
		          <div class="form-group">
		          	<label class="b">Tulis Testimoni</label>
		          	<textarea name="testimoni" class="form-control cst" rows="5"></textarea>
		          </div>
		          <div class="form-group">
		          	<button  class="button-cst cst-success pull-right" ><i class="fa fa-check"></i> Kirim Feedback</button>
		          </div>
 			</div>
 		</form>
 		<?php }} ?>
 		</div>
</body>

<script type="text/javascript">
		$(document).ready(function(){
			$('.exemple6').jRating({
				length : 5,
				bigStarsPath : '../../assets/plugin/jRating/jquery/icons/stars.png'
				// decimalLength : 1
			});
		});
		function rate_it()
		  {
		  	var tx = $('p.jRatingInfos').text();
		  	var tx2 = tx.split(' / ');
		  	$('input.mdl_rating').val(tx2[0]);
		  	$('.exemple6').attr('onclick', '');
		  }
	</script>
</html>
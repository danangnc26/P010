<?php
	require_once dirname(__FILE__).DIRECTORY_SEPARATOR.'function/route.php';
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
<body>
<header>
	<?php include "view/component/customer-menu.php" ?>
</header>
<?php
if(isset($_GET['page'])){
	if($_GET['page'] == 'login' || $_GET['page'] == 'register'){
		$c = 'login';	
	}else{
		$c = 'general';
	}
}else{
	$c = 'general';
}
?>
<section class="main <?php echo $c ?>">
	<div class="content">
		<!-- CONTENT GOES HERE -->
		<?php
		// var_dump($_SESSION);
			$page = (isset($_GET['page']))? $_GET['page'] : "main";
			route($page);
		?>
		<!-- CONTENT GOES HERE -->
	</div>
</section>
<footer>
	Copyright &copy; <?php echo date("Y") ?> SIPMAK - Restoran Anugrah
</footer>
</body>

<script type="text/javascript">
		$(document).ready(function(){
			$('.basic').jRating();
			
			$('.exemple2').jRating({
				type:'small',
				length : 5,
				decimalLength:1,
				isDisabled : true
				// decimalLength : 1
			});
			$('.exemple6').jRating({
				length : 5
				// decimalLength : 1
			});
			
		});
	</script>
</html>
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
	Copyright &copy; <?php echo date("Y") ?> SIPMAK - RM. Anugrah
</footer>
</body>

<!-- EXEMPLE 1 : BASIC -->
<<!-- div class="exemple">
	<em>Exemple 1 (<strong>Basic exemple without options</strong>) :</em>
	<div class="basic" data="12_1"></div>
</div>
<div class="notice">
<pre>
<?php
echo htmlentities('<!-- JS to add -->
<script type="text/javascript">
  $(document).ready(function(){
    $(".bacic").jRating();
  });
</script>
');
?>
</pre>
</div> -->


	

	
<!-- EXEMPLE 3 -->
<<!-- div class="exemple">
	<em>Exemple 3 (step : <strong>true</strong> - average <strong>18</strong> - id <strong>3</strong> - <strong>15</strong> stars) :</em>
	<div class="exemple3" data="18_3"></div>
</div>
<div class="notice">
<pre>
<?php
echo htmlentities('<!-- JS to add -->
<script type="text/javascript">
  $(document).ready(function(){
    $(".exemple3").jRating({
	  step:true, // no half-star when mousemove
	  length : 20, // nb of stars
	  decimalLength:0 // number of decimal in the rate
    });
  });
</script>
');
?>
</pre>
</div> -->

<!-- EXEMPLE 4 -->
<!-- <div class="exemple">
	<em>Exemple 4 (<strong>Rate is disabled</strong>) :</em>
	<div class="exemple4" data="10_4"></div>
</div>
<div class="notice">
<pre>
<?php
echo htmlentities('<!-- JS to add -->
<script type="text/javascript">
  $(document).ready(function(){
    $(".exemple4").jRating({
	  isDisabled : true
	});
  });
</script>
');
?>
</pre>
</div> -->

<!-- EXEMPLE 5 -->
<!-- <div class="exemple">
	<em>Exemple 5 (<strong>With onSuccess &amp; onError methods</strong>) :</em>
	<div class="exemple5" data="10_5"></div>
</div>
<div class="notice">
<pre>
<?php
echo htmlentities('<!-- JS to add -->
<script type="text/javascript">
  $(document).ready(function(){
    $(".exemple5").jRating({
	  length:10,
	  decimalLength:1,
	  onSuccess : function(){
	    alert(\'Success : your rate has been saved :)\');
	  },
	  onError : function(){
	    alert(\'Error : please retry\');
	  }
	});
  });
</script>
');
?>
</pre>
</div> -->

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
			
			$('.exemple3').jRating({
				step:true,
				length : 20
			});
			
			$('.exemple4').jRating({
				isDisabled : true
			});
			
			$('.exemple5').jRating({
				length:10,
				decimalLength:1,
				onSuccess : function(){
					alert('Success : your rate has been saved :)');
				},
				onError : function(){
					alert('Error : please retry');
				}
			});
		});
	</script>
</html>
<?php
Lib::uCheck() ?>

<div class="row">
	<div class="col-md-12">
		<h3>Ubah Password</h3>
		<hr>
	</div>
</div>
<div class="row">	
	<div class="col-md-6">
		<form method="post" action="<?php echo app_base.'update_password' ?>">
			<div class="form-group">
				<label>Password Baru : </label>
				<input class="form-control cst" id="password1" type="password" name="password" value="" required>
			</div>
			<div class="form-group">
				<label>Konfirmasi Password Baru : </label>
				<input class="form-control cst" id="password2" type="password" name="password2" value="" required>
			</div>
			<div class="form-group">
				<button style="margin-left:0px" class="button-cst cst-success"><i class="fa fa-check"></i> Simpan</button>
			</div>
		</form>
	</div>
</div>
			<script type="text/javascript">
			$('#password2').change(function(){
				validatePassword();
			});
			
			function validatePassword(){
			var pass2=$("#password2").val();
			var pass1=$("#password1").val();
			if(pass1!=pass2){
				// document.getElementById("password2").setCustomValidity("Passwords Don't Match");
				alert('Password tidak sama, silahkan ulangi lagi.');
			}}
			</script>
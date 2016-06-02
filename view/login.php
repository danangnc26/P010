<div class="row">
	<div class="col-md-12">
		<ul class="nav nav-tabs" style="margin-bottom:20px;">
			<li id="bt-login" class="active" style="width:50%; font-size:1.2em;"><a href="#login">Log In</a></li>
			<li id="bt-register" style="width:50%; font-size:1.2em;"><a href="#register">Daftar</a></li>
		</ul>
		<div class="cont-login">
			<h3 style="margin-bottom:10px;">Form Log In</h3>
			<form method="post" action="<?php echo app_base.'authenticate' ?>">
				<div class="form-group">
					<label>Username : </label>
					<input class="form-control cst" type="text" name="username" required autofocus>
				</div>
				<div class="form-group">
					<label>Password : </label>
					<input class="form-control cst" type="password" name="password" required>
				</div>
				<div class="form-group">
					<button style="margin-left:0px;" class="button-cst cst-success"><i class="fa fa-sign-in"></i> Log In</button>
				</div>
			</form>
		</div>
		<div class="cont-register" style="display:none;">
			<h3 style="margin-bottom:10px;">Form Daftar</h3>
			<form method="post" action="<?php echo app_base.'save_register' ?>">
				<div class="form-group">
					<label>Username : </label>
					<input class="form-control cst" type="text" name="username" required autofocus>
				</div>
				<div class="form-group">
					<label>Password : </label>
					<input class="form-control cst" id="password1" type="password" name="password" required>
				</div>
				<div class="form-group">
					<label>Konfirmasi Password : </label>
					<input class="form-control cst" id="password2" type="password" name="password2" required>
				</div>
				<hr>
				<div class="form-group">
					<label>Nama Lengkap : </label>
					<input class="form-control cst" type="text" name="nama_lengkap" required>
				</div>
				<div class="form-group">
					<label>No. HP / Telp : </label>
					<input class="form-control cst" type="text" name="no_hp" required  pattern="[0-9].{5,}" title="Gunakan Format Angka">
				</div>
				<div class="form-group">
					<label>Alamat: </label>
					<input class="form-control cst" type="text" name="alamat" required>
				</div>
				<div class="form-group">
					<label>Kecamatan: </label>
					<select class="form-control cst" name="id_kecamatan" required>
						<?php echo Lib::listKecamatan() ?>
					</select>
					<!-- <input class="form-control cst" type="text" name="alam" required> -->
				</div>
				<div class="form-group">
					<button style="margin-left:0px;" class="button-cst cst-success"><i class="fa fa-check-square-o"></i> Daftar</button>
				</div>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
	$('#bt-register').click(function(){
		$('.cont-register').show();
		$('.cont-login').hide();
		$('#bt-register').attr("class", "active");
		$('#bt-login').attr("class", "");
	});
	$('#bt-login').click(function(){
		$('.cont-register').hide();
		$('.cont-login').show();
		$('#bt-register').attr("class", "");
		$('#bt-login').attr("class", "active");
	});

	$('#password2').change(function(){
		validatePassword();
	});
			
	function validatePassword(){
		var pass2=$("#password2").val();
		var pass1=$("#password1").val();
		if(pass1!=pass2){
		alert('Password tidak sama, silahkan ulangi lagi.');
	}}
</script>

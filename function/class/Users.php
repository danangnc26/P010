<?php
class Users extends Core{

	protected $table 		= 'tbl_users'; 	// Ganti dengan nama tabel yang di inginkan.
	protected $primaryKey	= 'id_user';		// Primary key suatu tabel.

	public function __construct()
	{
		parent::__construct($this->table);
	}

	public function doLogin($input)
	{
		try {
			$username = $this->con()->real_escape_string($input['username']);
			$password = $this->con()->real_escape_string($input['password']);

			$result = $this->findAll("where username='".$username."' and password='".md5($password)."'");
			if(!empty($result) or $result != false){
				foreach ($result as $key => $value) {
					$_SESSION['username'] = $value['username'];
					$_SESSION['id_user'] = $value['id_user'];
					$_SESSION['nama_lengkap']	= $value['nama_lengkap'];
					$_SESSION['level_user']		= $value['level_user'];
					$_SESSION['kecamatan']		= $value['id_kecamatan'];
				}
				if($_SESSION['level_user'] == 'admin'){
					Lib::redirect('show_welcome');
					echo 'admin';
				}elseif($_SESSION['level_user'] == 'customer'){
					Lib::redirect('home');
					// echo 'customer';
				}else{
					echo "default";
				}
			}else{
				echo Lib::redirectjs(app_base.'login', "Login gagal, username / password yang anda masukkan salah.");
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	

	public function checkLevel()
	{

		if(isset($_SESSION)){
			if($_SESSION['level_user'] != 'admin'){
				header("Location:login.php");
			}
		}

	}

	public function doLogout()
	{
		session_destroy();
		Lib::redirect('login');
	} 

	public function saveUser($post)
	{
		try{
				$data = [
					'username' 		=> $post['username'],
					'password' 		=> md5($post['password']),
					'nama_lengkap'	=> $post['nama_lengkap'],
					'no_hp'			=> $post['no_hp'],
					'alamat'		=> $post['alamat'],
					'id_kecamatan'	=> $post['id_kecamatan'],
					'level_user'	=> 'customer'
					];
				if($this->save($data)){
					echo Lib::redirectjs(app_base.'login', 'Akun anda berhasil dibuat, silahkan login untuk melanjutkan.');
				}
		}catch(Exception $e){
			echo $e->getMessage();
		}
	}

	public function getCustomer()
	{
		return $this->findAll("where level_user='customer' order by nama_lengkap asc");
	}

	public function getUser()
	{
		return $this->findBy($this->primaryKey, $_SESSION['id_user']);
	}

	public function getUserForAdmin($id)
	{
		return $this->findBy($this->primaryKey, $id);
	}

	public function updateProfil($input)
	{
		try {
			$data = [
					'nama_lengkap'	=> $input['nama_lengkap'],
					'no_hp'			=> $input['no_hp'],
					'alamat'		=> $input['alamat'],
					'id_kecamatan'	=> $input['id_kecamatan']
					];
			if($this->update($data, $this->primaryKey, $_SESSION['id_user'])){
				echo Lib::redirectjs(app_base.'logout', 'Data diri anda berhasil diubah, silahkan login ulang untuk melanjutkan.');
			}else{
				header($this->back);
			}
		} catch (Exception $e) {	
			echo $e->getMessage();
		}
	}

	public function updatePassword($input)
	{
		try {
			$data = ['password' => md5($input['password'])];
			if($this->update($data, $this->primaryKey, $_SESSION['id_user'])){
				echo Lib::redirectjs(app_base.'logout', 'Password Anda Berhasil diubah, silahkan login ulang.');
			}else{
				header($this->back);
			}

		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function deleteUser($id)
	{
		if($this->delete($this->primaryKey, $id)){
			Lib::redirect('index_customer');
		}else{
			header($this->back);
		}
	}

	// // // // // // // // // // // // // 

	// public function getUser()
	// {
	// 	return $this->findAll();
	// }

	// public function store($input)
	// {
	// 	try {
	// 		$data = [
	// 				'username'		=> $input['username'],
	// 				'nama'			=> $input['nama'],
	// 				'password'		=> md5(strtolower($input['password'])),
	// 				'level_user'	=> $input['level_user']
	// 				];
	// 		if($this->save($data)){
	// 			Lib::redirect('index_master_user');
	// 		}else{
	// 			header($this->back);
	// 		}
	// 	} catch (Exception $e) {
			
	// 	}
	// }

	// public function deleteUser($id)
	// {
	// 	if($this->delete($this->primaryKey, $id)){
	// 		Lib::redirect('index_master_user');
	// 	}else{
	// 		header($this->back);
	// 	}
	// }

	// public function updatePassword($input)
	// {
	// 	try {
	// 		$data = ['password' => md5($input['password'])];
	// 		if($this->update($data, $this->primaryKey, $_SESSION['id_user'])){
	// 			echo Lib::redirectjs(app_base.'logout', 'Password Anda Berhasil diubah, silahkan login ulang.');
	// 		}else{
	// 			header($this->back);
	// 		}

	// 	} catch (Exception $e) {
	// 		echo $e->getMessage();
	// 	}
	// }


}

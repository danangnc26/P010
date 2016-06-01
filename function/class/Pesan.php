<?php
class Pesan extends Core{

	protected $table 		= 'tbl_pesan'; 	// Ganti dengan nama tabel yang di inginkan.
	protected $primaryKey	= 'id_pesan';		// Primary key suatu tabel.
	protected $back 		= "location:javascript://history.go(-1)";

	public function __construct()
	{
		parent::__construct($this->table);
	}

	public function getAdminDaftarPemesanan()
	{
		return $this->findAll("where status!=0 order by tanggal desc");	
	}

	public function getDaftarPemesanan()
	{
		return $this->findAll("where status!=0 and id_user='".$_SESSION['id_user']."' order by tanggal desc");
	}

	public function findPesan($id)
	{
		return $this->findBy($this->primaryKey, $id);
	}

	public function findCurrentPesan()
	{
		return $this->findAll("where status=0 and id_user='".$_SESSION['id_user']."'");
	}

	public function createPesan()
	{
		$fin = $this->findCurrentPesan();
		if($fin == null){
			try {
				$id = mt_rand(1000, 9999);
				$data = [
						'id_pesan' 		=> $id,
						'id_user'		=> $_SESSION['id_user'],
						'tanggal'		=> date("Y-m-d")
						];
				if($this->save($data)){
					$result = $id;
				}else{
					$result = 0;
				}
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}else{
			$result = $fin[0]['id_pesan'];
		}
		return $result;
	}

	public function kirimPesanan($input)
	{
		try {
			$fin = $this->findCurrentPesan();
			$data = [
					'total'				=> $input['total'],
					'metode_bayar'		=> $input['pembayaran'],
					'status'			=> 1
					];
			if($this->update($data, $this->primaryKey, $fin[0]['id_pesan'])){
				Lib::redirect('daftar_pemesanan');
			}else{
				header($this->back);
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function batalPesan($id)
	{
		if($this->delete($this->primaryKey, $id)){
			Lib::redirect('daftar_pemesanan');
		}else{
			header($this->back);
		}
	}

	public function hapusPesanan($id)
	{
		if($this->delete($this->primaryKey, $id)){
			Lib::redirect('index_pesanan');
		}else{
			header($this->back);
		}
	}

	public function updateStatus($input)
	{
		try {
			$data = [
					'status'	=> $input['status']
					];
			if($this->update($data, $this->primaryKey, $input['id_pesan'])){
				Lib::redirect('detail_pesanan_admin&id_pesan='.$input['id_pesan'].'&id_user='.$input['id_user']);
			}else{
				header($this->back);
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

}
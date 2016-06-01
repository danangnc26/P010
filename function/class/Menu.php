<?php
class Menu extends Core{

	protected $table 		= 'tbl_menu'; 	// Ganti dengan nama tabel yang di inginkan.
	protected $primaryKey	= 'id_menu';		// Primary key suatu tabel.
	protected $back 		= "location:javascript://history.go(-1)";

	public function __construct()
	{
		parent::__construct($this->table);
	}

	public function index()
	{
		return $this->findAll('order by nama_menu asc');
	}

	public function findByKategori($id)
	{
		return $this->findBy('id_kategori', $id, ' order by nama_menu asc');
	}

	public function edit($id)
	{
		return $this->findBy($this->primaryKey, $id);
	}

	public function saveMenu($input)
	{
		try {
			$data = [
					'nama_menu'			=> $input['nama_menu'],
					'deskripsi'			=> $input['deskripsi'],
					'harga'				=> $input['harga'],
					'id_kategori'		=> $input['id_kategori']
					];
					if($_FILES['gambar']['tmp_name'] != ''){
						$data['gambar'] = Lib::uploadImg($input);
					}
			if($this->save($data)){
				Lib::redirect('index_menu');
			}else{
				header($this->back);
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function updateMenu($input)
	{
		try {
			$data = [
					'nama_menu'			=> $input['nama_menu'],
					'deskripsi'			=> $input['deskripsi'],
					'harga'				=> $input['harga'],
					'id_kategori'		=> $input['id_kategori']
					];
					if($_FILES['gambar']['tmp_name'] != ''){
						$data['gambar'] = Lib::uploadImg($input);
					}
			if($this->update($data, $this->primaryKey, $input['id_menu'])){
				Lib::redirect('index_menu');
			}else{
				header($this->back);
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function deleteMenu($id)
	{
		if($this->delete($this->primaryKey, $id)){
			Lib::redirect('index_menu');
		}else{
			header($this->back);
		}
	}

}
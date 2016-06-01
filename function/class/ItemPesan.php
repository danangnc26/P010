<?php
class ItemPesan extends Core{

	protected $table 		= 'tbl_item_pesan'; 	// Ganti dengan nama tabel yang di inginkan.
	protected $primaryKey	= 'id_item_pesan';		// Primary key suatu tabel.
	protected $back 		= "location:javascript://history.go(-1)";

	public function __construct()
	{
		parent::__construct($this->table);
		$this->p = new Pesan();
	}

	public function keranjang()
	{
		return $this->findAll("where id_pesan='".$this->p->createPesan()."'");
	}

	public function keranjang2($id)
	{
		return $this->findAll("where id_pesan='".$id."'");
	}

	public function findThisItem($id)
	{
		$x = $this->p->findCurrentPesan();
		// $result = $this->findBy('id_menu', $id);
		$result = $this->findAll("where id_menu='".$id."' and id_pesan='".$x[0]['id_pesan']."'");
		return $result;
	}

	public function addItemToBasket($input = '')
	{
		try {
			if(empty($input)){
				if(isset($_GET['qty']) && isset($_GET['id_menu'])){
					$qty = $_GET['qty'];
					$id_menu = $_GET['id_menu'];
					$id_kat = $_GET['id_kategori'];
				}
			}else{
				$qty = $input['qty'];
				$id_menu = $input['id_menu'];
				$id_kat = $input['id_kategori'];
			}

			$itm = $this->findThisItem($id_menu);
			if($itm != null){
				if(!empty($input)){
					$qty2 = $itm[0]['qty']+$qty;
				}else{
					$qty2 = $qty;
				}
				$data = [
						'qty'		=> $qty2
						];
				if($this->update($data, $this->primaryKey, $itm[0]['id_item_pesan'])){
					// &id_kategori=9&nama_kategori=Sup
					if(!empty($id_kat)){
						$add_redir = '&id_kategori='.$id_kat.'&nama_kategori='.Lib::namaKategori($id_kat);
					}else{
						$add_redir = '';
					}
					Lib::redirect('lihat_menu'.$add_redir);
				}else{
					header($this->back);
				}

			}else{
				$data = [
					'id_menu'						=> $id_menu,
					'id_pesan'						=> $this->p->createPesan(),
					'qty'							=> $qty
					];
				if($this->save($data)){
					if(!empty($id_kat)){
						$add_redir = '&id_kategori='.$id_kat.'&nama_kategori='.Lib::namaKategori($id_kat);
					}else{
						$add_redir = '';
					}
					Lib::redirect('lihat_menu'.$add_redir);
				}else{
					header($this->back);
				}
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function deleteItem($id)
	{
		if($this->delete($this->primaryKey, $id)){
			if(isset($_GET['id_kategori'])){
				$ex = '&id_kategori='.$_GET['id_kategori'].'&nama_kategori='.Lib::namaKategori($_GET['id_kategori']);
			}else{
				$ex = '';
			}
			Lib::redirect('lihat_menu'.$ex);
		}else{
			header($this->back);
		}
	}

	

}

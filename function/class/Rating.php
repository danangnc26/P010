<?php
class Rating extends Core{

	protected $table 		= 'tbl_rating'; 	// Ganti dengan nama tabel yang di inginkan.
	protected $primaryKey	= 'id_rating';		// Primary key suatu tabel.
	protected $back 		= "location:javascript://history.go(-1)";

	public function __construct()
	{
		parent::__construct($this->table);
	}

	public function saveRate($input)
	{
		try {
			$data = [
					'id_menu'	=> $input['id_menu'],
					'id_pesan'	=> $input['id_pesan'],
					'rate'		=> $input['rate'],
					'testimoni'	=> $input['testimoni']
					];
			if($this->save($data)){
				echo '<script>window.top.location.reload();</script>';
			}else{
				header($this->back);
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

}
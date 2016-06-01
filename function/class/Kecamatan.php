<?php
class Kecamatan extends Core{

	protected $table 		= 'tbl_kecamatan'; 	// Ganti dengan nama tabel yang di inginkan.
	protected $primaryKey	= 'id_kecamatan';		// Primary key suatu tabel.

	public function __construct()
	{
		parent::__construct($this->table);
	}

	

}
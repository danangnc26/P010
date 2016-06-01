<?php
session_start();
ob_start();
error_reporting(E_ALL ^ E_DEPRECATED);
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'bootstrap.php';
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'lib.php';
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'../config/Config.php';

function route($page)
{
	$p = $_POST;
	$g = $_GET;

	$kecamatan = new Kecamatan();
	$user = new Users();
	$kategori = new Kategori();
	$menu = new Menu();
	$pesan = new Pesan();
	$item = new ItemPesan();
	$rating = new Rating();

	switch ($page) {
		case 'login':
				include "view/login.php";
			break;
		case 'authenticate':
			$user->doLogin($p);
			break;
		case 'save_register':
			$user->saveUser($p);
			break;
		case 'logout':
			$user->doLogout();
			break;
		// // // // // ADMIN // // // // // 

		
		case 'show_welcome':
				include "view/admin/show_welcome.php";
			break;

		#KATEGORI
		case 'index_kategori':
				$data = $kategori->index();
				include "view/admin/kategori/index.php";
			break;
		case 'create_kategori':
				include "view/admin/kategori/create.php";
			break;
		case 'save_kategori':
				$kategori->saveKategori($p);
			break;
		case 'edit_kategori':
				$data = $kategori->edit($g['id_kategori']);
				include "view/admin/kategori/edit.php";
			break;
		case 'update_kategori':
				$kategori->updateKategori($p);
			break;
		case 'delete_kategori':
				$kategori->deleteKategori($g['id_kategori']);
			break;

		#MENU
		case 'index_menu':
				if(isset($g['id_kategori']) && isset($g['nama_kategori'])){
					$data = $menu->findByKategori($g['id_kategori']);
				}else{
					$data = $menu->index();
				}
				include "view/admin/menu/index.php";
			break;
		case 'create_menu':
				include "view/admin/menu/create.php";
			break;
		case 'save_menu':
				$menu->saveMenu($p);
			break;
		case 'edit_menu':
				$data = $menu->edit($g['id_menu']);
				include "view/admin/menu/edit.php";
			break;
		case 'update_menu':
				$menu->updateMenu($p);
			break;
		case 'delete_menu':
				$menu->deleteMenu($g['id_menu']);
			break;

		#CUSTOMER
		case 'index_customer':
				$data = $user->getCustomer();
				include "view/admin/customer/index.php";
			break;

		case 'index_pesanan':
				$data = $pesan->getAdminDaftarPemesanan();
				include "view/admin/pesanan/index.php";
			break;
		case 'detail_pesanan_admin':
				$data1 = $user->getUserForAdmin($g['id_user']);
				$data2 = $item->keranjang2($g['id_pesan']);
				$data3 = $pesan->findPesan($g['id_pesan']);
				include "view/admin/pesanan/detail.php";
			break;
		case 'update_status':
				$pesan->updateStatus($p);
			break;
		case 'hapus_pesanan':
				$pesan->hapusPesanan($g['id_pesan']);
			break;

		// // // // // ADMIN // // // // // 
		
		case 'lihat_menu':
				if(isset($g['id_kategori']) && isset($g['nama_kategori'])){
					$data = $menu->findByKategori($g['id_kategori']);
				}else{
					$data = $menu->index();
				}
				$data2 = $item->keranjang();
				include "view/customer/lihat_menu.php";
			break;
		case 'tambah_ke_keranjang':
				if(!empty($p)){
					$item->addItemToBasket($p);
				}else{
					$item->addItemToBasket();
				}
			break;
		case 'delete_item':
				$item->deleteItem($g['id_item']);
			break;
		case 'konfirmasi_pesan':
				$data1 = $user->getUser();
				$data2 = $item->keranjang();
				include "view/customer/konfirmasi_pemesanan.php";
			break;
		case 'kirim_pesanan':
				$pesan->kirimPesanan($p);
			break;

		case 'daftar_pemesanan':
				$data = $pesan->getDaftarPemesanan();
				include "view/customer/daftar_pemesanan.php";
			break;
		case 'batal_pemesanan':
				$pesan->batalPesan($g['id_pesan']);
			break;
		case 'detail_pesanan':
				$data1 = $user->getUser();
				$data2 = $item->keranjang2($g['id_pesan']);
				$data3 = $pesan->findPesan($g['id_pesan']);
				include "view/customer/detail_pesanan.php";
			break;
		case 'save_feedback':
				$rating->saveRate($p);
			break;
		case 'tes_rate':
				echo Lib::rate(18);
			break;


		case 'main' :
				default : 
				// header("location:index.php");
			break;
	}
}

define("index", "index.php");
define("base_url", server_name()."/".Config::getConfig('rootdir')."/");
define("app_base", index."?page=");

function server_name()
{
	  $serverport = (isset($_SERVER['SERVER_PORT'])) ? ':'.$_SERVER['SERVER_PORT'] : '';
	  return sprintf(
	    "%s://%s".$serverport,
	    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
	    $_SERVER['SERVER_NAME'],
	    $_SERVER['REQUEST_URI']
	  );
}
<?php
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'route.php';

Class Lib{

	public static function redirect($loc)
	{
		header('Location:'.app_base.$loc);
	}

	public static function redirectjs($src = '', $msg = '')
	{
		$r 	= '<script>';
		$r .= (!empty($msg)) ? 'alert("'.$msg.'");' : '';
		$r .= 'location.replace("'.$src.'")';
		$r .= '</script>';
		return $r;
	}

	public static function listKecamatan($opt = '', $st = false)
	{
		$s[] = '<option value="">-- Pilih Kecamatan --</option>';
		$j = new Kecamatan();
		$result =  ($st) ? $j->findBy('id_kecamatan', $opt) : $j->findAll();
		if($result != null){
			foreach($result as $value){
				$s[] = ($value['id_kecamatan'] == $opt) ? '<option  selected value="'.$value['id_kecamatan'].'">'.$value['nama'].'</option>' : '<option value="'.$value['id_kecamatan'].'">'.$value['nama'].'</option>';
			}
		}else{
			$s = [];
		}
		return implode('', $s);
	}

	public static function uCheck()
	{
		$logged_in = false;
		//jika session username belum dibuat, atau session username kosong
		if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {	
			//redirect ke halaman login
			// header("Location:index.php?page=login");
			Lib::redirect('login');
		} else {
			$logged_in = true;
		}
		
	}

	public static function namaKecamatan($id)
	{
		$j = new Kecamatan();
		$result = $j->findBy('id_kecamatan', $id);
		return $result[0]['nama'];
	}

	public static function listKategori()
	{
		$j = new Kategori();
		$result = $j->findAll("order by nama_kategori asc");
		if($result != null)
		{
			return $result;
		}else{
			return null;
		}
	}

	public static function namaMenu($id)
	{
		$j = new Menu();
		$result = $j->findBy('id_menu', $id);
		return $result[0]['nama_menu'];
	}

	public static function deskripsiMenu($id)
	{
		$j = new Menu();
		$result = $j->findBy('id_menu', $id);
		return $result[0]['deskripsi'];
	}

	public static function namaKategori($id)
	{
		$j = new Kategori();
		$result = $j->findBy('id_kategori', $id);
		return $result[0]['nama_kategori'];
	}

	public static function hargaMenu($id)
	{
		$j = new Menu();
		$result = $j->findBy('id_menu', $id);
		return $result[0]['harga'];	
	}

	public static function dropKategori($opt = '', $st = false)
	{
		$s[] = '<option value="">-- Pilih Kategori --</option>';
		$j = new Kategori();
		$result =  ($st) ? $j->findBy('id_kategori', $opt) : $j->findAll();
		if($result != null){
			foreach($result as $value){
				$s[] = ($value['id_kategori'] == $opt) ? '<option  selected value="'.$value['id_kategori'].'">'.$value['nama_kategori'].'</option>' : '<option value="'.$value['id_kategori'].'">'.$value['nama_kategori'].'</option>';
			}
		}else{
			$s = [];
		}
		return implode('', $s);
	}

	public static function uploadImg($post)
	{
		$f_name = mt_rand(10000, 99999).'.jpg';
		if(isset($post) and $_SERVER['REQUEST_METHOD'] == "POST")
		{
			$name = $_FILES['gambar']['name'];
			$size = $_FILES['gambar']['size'];
			$tmp = $_FILES['gambar']['tmp_name'];
			$path = "public/images/";
			move_uploaded_file($tmp, $path.$f_name); //Stores the image in the uploads folder
		}
		return $f_name;
	}

	public static function ind($str = '')
	{
		// if(is_numeric($str)){
			
		// }else{
		// 	return 'Bukan Angka';
		// }
		return 'Rp. '.number_format($str, 0, ',', '.');	
	}

	public static function dateInd($str = '', $s = false) {
        setlocale (LC_TIME, 'id_ID');
        if($s == true){
        	$date = strftime( "%d/%m/%Y", strtotime($str));
        }else{
        	$dt = explode('/', $str);
        	$date = strftime( "%Y-%m-%d", strtotime($dt[0].'-'.$dt[1].'-'.$dt[2]));
        }

        return $date;
    }

    public static function status($v)
	{
		switch ($v) {
			case '-':
				$vf = 'Pemesanan Dibatalkan';
				break;
			case '0':
				$vf = 'Pemesanan Belum Selesai';
				break;
			case '1':
				$vf = 'Pending';
				break;
			case '2':
				$vf = 'Pesanan dalam proses';
				break;
			case '3':
				$vf = 'Pesanan Dikirim';
				break;
			case '4':
				$vf = 'Pesanan Selesai';
				break;
			
			default:
				$vf = '';
				break;
		}
		return $vf;
	}

	public static function metodeBayar($v = '')
	{
		switch ($v) {
			case 'C':
				$t = 'Bayar saat pesanan tiba';
				break;
			case 'T':
				$t = 'Transfer';
				break;
			
			default:
				$t = '';
				break;
		}
		return $t;
	}

	public static function getNotif()
	{
		$j = new Pesan();
		$result = $j->raw("SELECT count(id_pesan) as jumlah FROM tbl_pesan where status=1");
		return $result[0]['jumlah'];
	}

	public static function getForFeedback($id)
	{
		$j = new Menu();
		$result = $j->findBy('id_menu', $id);
		return $result;
	}

	public static function sTestimoni($id_menu, $id_pesan)
	{
		$j = new Rating();
		$result = $j->findAll("where id_menu='".$id_menu."' and id_pesan='".$id_pesan."'");
		return $result;
	}

	public static function rate($id_menu)
	{
		$j = new Rating();
		$x = [1,2,3,4,5];
		$z = [];
		foreach ($x as $k1 => $v1) {
			$r = $j->raw("SELECT count(id_rating) as jumlah FROM tbl_rating where id_menu='".$id_menu."' and rate='".$v1."'");
			$z[$v1] = $r[0]['jumlah'];
		}
		$z2 = [];
		$z3 = [];
		foreach ($z as $k2 => $v2) {
			$z2[] = $k2 * $v2;
			$z3[] = $v2;
		}
		// $hsl = array_sum($z2) / array_sum($z3);
		// $rs = ($hsl != false) ? $hsl : 0;
		if(array_sum($z3) == 0){
			$hsl = 0;
		}else{
			$hsl = array_sum($z2) / array_sum($z3);
		}
		return round($hsl,1);
	}

	public static function countTestimoni($id_menu)
	{
		$j = new Rating();
		$result = $j->raw("SELECT count(id_rating) as jumlah_testimoni FROM tbl_rating where id_menu='".$id_menu."' and testimoni!=''");
		return $result[0]['jumlah_testimoni'];
	}

	public static function getTestimoni($id_menu)
	{
		$j = new Rating();
		$result = $j->findBy('id_menu', $id_menu);
		return $result;
	}

	public static function namaUser($id)
	{
		$p = new Pesan();
		$result = $p->findBy('id_pesan', $id);
		$u = new Users();
		$result2 = $u->findBy('id_user', $result[0]['id_user']);
		return $result2[0]['nama_lengkap'];
	}

	public static function gambarKategori($id)
	{
		$k = new Kategori();
		$result = $k->findBy('id_kategori', $id);
		return $result[0]['gambar'];
	}

	public static function gambarMenu($id)
	{
		$j = new Menu();
		$result = $j->findBy('id_menu', $id);
		return $result[0]['gambar'];	
	}

	public static function findMenu($id)
	{
		$j = new Menu();
		$result = $j->findBy('id_menu', $id);
		return $result;	
	}


}
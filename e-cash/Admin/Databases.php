
<?php 


$key				= "sdfkgsdjsmenqeufdvxbnsdjskaklslwhksfjxfnmsdkwei";
	class Databases {
 
 
		public $host = 'localhost';
		public $name = 'root';
		public $pass = 'dimasari123';
		public $dbname = 'dbkass';
		public $mysqli;

 
		function __construct (){
 
		$this->mysqli = new mysqli($this->host, $this->name, $this->pass, $this->dbname);
 
		if ($this->mysqli->connect_errno) {
			echo "DATABASE TIDAK ADA !  ";
			exit;
		}
 
	}
 
 
	public function get_show (){
		$data = "SELECT * FROM tbl_transaksi ORDER BY id DESC";
		$hasil = $this->mysqli->query($data);
    
		while ($d = mysqli_fetch_array($hasil)){
			$result[] = $d;
		}
 
		return $result;


	}







 function input_pgt($nama_pembayaran,$nominal_pembayaran,$jumlah_cicilan, $idkelas,$aktif_pembayaran){
	
	$data = "insert into tbl_pembayaran values('','$nama_pembayaran','$nominal_pembayaran','$jumlah_cicilan','$idkelas','$aktif_pembayaran') ";
		$hasil = $this->mysqli->query($data);


		 if ($hasil) {
         ?>
         <script type="text/javascript">
           alert ("Data Berhasil Disimpan");
           window.location.href="?page=pengaturan";
         </script>

         <?php
       }
}


	public function getData($query)
	{		
		$result = $this->mysqli->query($query);
		
		if ($result == false) {
			return false;
		} 
		
		$rows = array();
		
		while ($row = $result->fetch_assoc()) {
			$rows[] = $row;
		}
		
		return $rows;
	}
public function ambilData($ambil)
	{		
		$hasil = $this->mysqli->query($ambil);
		
		if ($result == false) {
			return false;
		} 
		
		$rows = array();
		
		while ($row = $hasil->fetch_assoc()) {
			$rows[] = $row;
		}
		
		return $rows;
	}




	function kode_transaksi(){          
		$query = $this->mysqli->query('SELECT RIGHT(id_transaksi, 12) as kode FROM tbl_transaksi ORDER BY id_transaksi DESC limit 1');
		$kode = 1;    
		foreach ($query as $q) {
		    $kode = intval($q['kode']) + 1;
		}      

		$kodemax = str_pad($kode, 12, "0", STR_PAD_LEFT);     
		$kodejadi = "TR-".$kodemax;      
		return $kodejadi;   
	}

	function kode_keluar(){          
		$query = $this->mysqli->query('SELECT RIGHT(id_keluar, 12) as kode FROM kas ORDER BY id_keluar DESC limit 1');
		$kode = 1;    
		foreach ($query as $q) {
		    $kode = intval($q['kode']) + 1;
		}      

		$kodemax = str_pad($kode, 12, "0", STR_PAD_LEFT);     
		$kodejadi = "TR-".$kodemax;      
		return $kodejadi;   
	}

	function kode_cicilan($id_siswa, $id_kelas, $id_pembayaran){          
		$query = $this->mysqli->query("SELECT count(*) as kode FROM tbl_transaksi, tbl_siswa WHERE tbl_transaksi.id_siswa = tbl_siswa.id_siswa AND tbl_transaksi.id_siswa='$id_siswa' AND tbl_transaksi.id_pembayaran='$id_pembayaran' AND tbl_transaksi.id_kelas = '$id_kelas' AND tbl_transaksi.id_kelas = tbl_siswa.id_kelas ORDER BY tbl_transaksi.id_transaksi DESC"); 

		$kode = 1;     
		foreach ($query as $q) {
		    $kode = intval($q['kode']) + 1; 
		}      
		return $kode;   
	}

	
	public function jurusan (){
		$data = "SELECT * FROM jurusan WHERE id ";
		$hasil = $this->mysqli->query($data);
 
		while ($d = mysqli_fetch_array($hasil)){
			$result[] = $d;
		}
 
		return $result;


	}
	function clean_json($string) {
	   return str_replace( array('"','[',']' ), array('\'','','' ), $string);

	}
	function arab($string) {
	    $western_arabic = array('0','1','2','3','4','5','6','7','8','9');
	    $eastern_arabic = array('٠','١','٢','٣','٤','٥','٦','٧','٨','٩');

	    $str = str_replace($western_arabic, $eastern_arabic, $string);

	    return $str;
	}
function clean($string) {
	   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

	   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
	}
	public function ucapan() {
		$b = time();
		$hour = date("G",$b);
		$ucapan = "";
		if ($hour>=0 && $hour<=11)
		{
			$ucapan = "Selamat Pagi ";
		}
		elseif ($hour >=12 && $hour<=14)
		{
			$ucapan = "Selamat Siang ";
		}
		elseif ($hour >=15 && $hour<=17)
		{
			$ucapan = "Selamat Sore ";
		}
		elseif ($hour >=17 && $hour<=18)
		{
			$ucapan = "Selamat Petang ";
		}
		elseif ($hour >=19 && $hour<=23)
		{
			$ucapan = "Selamat Malam ";
		}

		return $ucapan;

	}
	function waktu( $ptime )
	{
	    $estimate_time = time() - $ptime;

	    if( $estimate_time < 1 )
	    {
	        return 'beberapa menit yang lalu';
	    }

	    $condition = array( 
	                12 * 30 * 24 * 60 * 60  =>  'tahun',
	                30 * 24 * 60 * 60       =>  'bulan',
	                24 * 60 * 60            =>  'hari',
	                60 * 60                 =>  'jam',
	                60                      =>  'menit',
	                1                       =>  'detik'
	    );

	    foreach( $condition as $secs => $str )
	    {
	        $d = $estimate_time / $secs;

	        if( $d >= 1 )
	        {
	            $r = round( $d );
	            return 'sekitar ' . $r . ' ' . $str . ( $r > 1 ? '' : '' ) . ' lalu';
	        }
	    }
	}



function format_romawi($integer)
	{
	 $integer = intval($integer);
	 $result = '';
	 $lookup = array('M' => 1000,
	 'CM' => 900,
	 'D' => 500,
	 'CD' => 400,
	 'C' => 100,
	 'XC' => 90,
	 'L' => 50,
	 'XL' => 40,
	 'X' => 10,
	 'IX' => 9,
	 'V' => 5,
	 'IV' => 4,
	 'I' => 1);
	 
	 foreach($lookup as $roman => $value){
	  $matches = intval($integer/$value);
	  $result .= str_repeat($roman,$matches);
	  $integer = $integer % $value;
	 }
	 
	 return $result;
	}

public function execute($query) 
	{
		$result = $this->mysqli->query($query);
		
		if ($result == false) {
			echo 'Error: cannot execute the command';
			return false;
		} else {
			return true;
		}		
	}


public function escape_string($value)
	{
		$data = htmlspecialchars($value);
		return $this->mysqli->real_escape_string($data);
	}

	// public function getHistory($keterangan)
	// {		
	// 	$id_pegawai = "'" . $_SESSION['id_pegawai'] . "'";
	// 	$waktu_history = "'" . date('Y-m-d H:i:s') . "'";
	// 	$result = $this->mysqli->query("INSERT INTO tbl_history (id_pegawai, waktu_history, keterangan_history) VALUES ($id_pegawai, $waktu_history, '$keterangan')");

	// 	if ($result == false) {
	// 		echo 'Error: cannot execute the command';
	// 		return false;
	// 	} else {
	// 		return true;
	// 	}
	// }

	public function getHistory($keterangan)
	{		
		$id_user = "'" . $_SESSION['id_user'] . "'";
		$waktu_history = "'" . date('Y-m-d H:i:s') . "'";
		$result = $this->mysqli->query("INSERT INTO tbl_history (id_user, waktu_history, keterangan_history) VALUES ($id_user, $waktu_history, '$keterangan')");

		if ($result == false) {
			echo 'Error: cannot execute the command';
			return false;
		} else {
			return true;
		}
	}
	
    function format_rupiah($angka){
     $rupiah=number_format($angka,0,',','.');
     return "Rp. ".$rupiah;
    }

    function format_ribuan($angka){
     $ribuan=number_format($angka,0,',','.');
     return $ribuan;
    }

    

    function generateRandomString($length = 10) {
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    } 





    	
}
?>
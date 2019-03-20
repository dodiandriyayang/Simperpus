<?php 
	/**
	 * 
	 */
	class database
	{
		private $host = "localhost";
		private $user = "root";
		private $pass = "";
		private $db  = "project-perpustakaan";
		protected $koneksi;
		function __construct()
		{
			if (!isset ($this->koneksi)) {
				$this->koneksi = new mysqli($this->host,$this->user,$this->pass,$this->db);
				if (!$this->koneksi) {
					echo "koneksi gagal";
					exit;
				}
			}
			return $this->koneksi;
		}
	}
 ?>
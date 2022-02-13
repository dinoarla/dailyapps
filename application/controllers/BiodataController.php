<?php
use application\controllers\MainController;
class BiodataController extends MainController{   
   public function index(){
      $sid = session_id();      
      $this->template('biodata');
   }
   
   public function simpan(){   
      $this->model('transaksi');
      $this->model('keranjang');
      $this->model('transaksi_detail');
      
	  //Menyimpan data transaksi ke tabel transaksi
      $data = array();
      $data['nama_pemesan'] = $this->validate($_POST['nama']);
      $data['email'] = $this->validate($_POST['email']);
      $data['telp'] = $this->validate($_POST['telepon']);
      $data['catatan'] = $this->validate($_POST['catatan']);
      $data['tanggal'] = date('Y-m-d');
      $data['jam'] = date('H:i:s');
      $data['status'] = "Baru";
     
      $simpan = $this->transaksi->insert($data);
      $idtransaksi = $this->transaksi->getId();
      $_SESSION['id_transaksi'] = $idtransaksi;
      
	  //Memindahkan isi keranjang belanja ke tabel transaksi_detail
      $query = $this->keranjang->selectJoin(array('produk'), 'LEFT JOIN',array('keranjang.id_produk'=>'produk.id_produk'), array('keranjang.id_session'=>session_id()));
      $datakeranjang = $this->keranjang->getResult($query);
      
      foreach($datakeranjang as $detail){
         $datadetail = array();
         $datadetail['id_transaksi'] = $idtransaksi;
         $datadetail['id_produk']    = $detail['id_produk'];
         $datadetail['jumlah']        = $detail['jumlah'];
       
        $this->transaksi_detail->insert($datadetail);
      }
       
	  //Mengambil data dari tabel pengaturan
      $this->model('pengaturan');
	  $query = $this->pengaturan->selectAll();
	  $pengaturan = $this->pengaturan->getResult($query);
	  
	   
      $this->keranjang->delete(array('id_session'=>session_id()));
            
      if($simpan) $this->redirect('konfirmasi');
   }
} 
<?php
use \application\controllers\AdminMainController;
class ProdukController extends AdminMainController{
   function __construct(){
      parent::__construct();
      $this->model('produk');
   }

//Menampilkan halaman produk   
   public function index(){
      $this->model('kategori');
      $query = $this->kategori->selectAll();
      $data = $this->kategori->getResult($query);
      $this->template('admin/produk', 'Produk', $data);
   }

//Menampilkan data melalui ajax      
   public function listData(){
      require_once ROOT."/application/functions/function_action.php";
      require_once ROOT."/application/functions/function_rupiah.php";
      $query = $this->produk->selectJoin(array('kategori'), "LEFT JOIN", array('produk.id_kategori'=>'kategori.id_kategori'), "", "produk.dibeli", "DESC");
      $list = $this->produk->getResult($query);
      $data = array();
      $no = 0;
      foreach($list as $li){
         $no ++;
         $row = array();
         $row[] = $no;
         $row[] = "<img src='".BASE_PATH."/public/images/thumbs/$li[gambar]'>";
         $row[] = $li['nama_produk']."<br><span class='label label-primary'>".$li['kd_sku']."</span>&nbsp;<span class='label label-success'> ".$li['nama_kategori']."</span>&nbsp;<span class='label label-danger'><i class='glyphicon glyphicon-eye-open'></i> ".$li['hits']."</span>";
         $row[] = $li['stok'];
         $row[] = "Rp ".format_rupiah($li['harga'])."";
         $row[] = $li['dibeli'];
         $row[] = create_action($li['id_produk']);
         $data[] = $row;
      }
      
      $output = array("data" => $data);
      echo json_encode($output);
   }


//Mengambil data kategori untuk ditampilkan pada form edit    
   public function edit($id){
      $query = $this->produk->selectWhere(array('id_produk'=>$id));
      $data = $this->produk->getResult($query);
      echo json_encode($data[0]);
   }
   
//Menyimpan data ke database
   public function insert(){
      $data = array();
      $data['nama_produk']= $_POST['produk'];
      $data['slug']       = $_POST['slug'];
      $data['id_kategori'] = $_POST['kategori'];
      $data['gambar']    = $_POST['gambar'];
      $data['gambard']    = $_POST['gambard'];
      $data['gambart']    = $_POST['gambart'];
      $data['gambare']    = $_POST['gambare'];
      $data['gambarl']    = $_POST['gambarl'];
      $data['stok']       = $_POST['stok'];
      $data['kd_sku']       = $_POST['kd_sku'];
      $data['harga']       = $_POST['harga'];
      $data['link_tp']       = $_POST['link_tp'];
      $data['link_bl']       = $_POST['link_bl'];
      $data['link_sh']       = $_POST['link_sh'];
      $data['link_demo']       = $_POST['link_demo'];
      $data['deskripsi']    = addslashes($_POST['deskripsi']);
         
      $simpan = $this->produk->insert($data);
      if($simpan) echo "success";
   }

//Memperbaharui data pada database   
   public function update(){
      $data = array();
      $data['nama_produk']= $_POST['produk'];
      $data['slug']       = $_POST['slug'];
      $data['id_kategori'] = $_POST['kategori'];
      $data['gambar']    = $_POST['gambar'];
      $data['gambard']    = $_POST['gambard'];
      $data['gambart']    = $_POST['gambart'];
      $data['gambare']    = $_POST['gambare'];
      $data['gambarl']    = $_POST['gambarl'];
      $data['stok']       = $_POST['stok'];
      $data['kd_sku']       = $_POST['kd_sku'];
      $data['harga']       = $_POST['harga'];
      $data['link_tp']       = $_POST['link_tp'];
      $data['link_bl']       = $_POST['link_bl'];
      $data['link_sh']       = $_POST['link_sh'];
      $data['link_demo']       = $_POST['link_demo'];
      $data['deskripsi']    = addslashes($_POST['deskripsi']);
         
      $id = $_POST['id'];
      $simpan = $this->produk->update($data, array('id_produk'=>$id));
      if($simpan) echo "success";
      
   }
   
//Menghapus data pada database   
   public function delete($id){
      $hapus = $this->produk->delete(array('id_produk'=>$id));
   }
}
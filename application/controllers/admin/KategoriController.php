<?php
use \application\controllers\AdminMainController;
class KategoriController extends AdminMainController{
   function __construct(){
      parent::__construct();
      $this->model('kategori');
   }

//Menampilkan halaman kategori   
   public function index(){
      $this->model('etalase');
      $query = $this->etalase->selectAll();
      $data = $this->etalase->getResult($query);
      $this->template('admin/kategori', 'Kategori', $data);
   }

//Menampilkan data kategori melalui ajax   
   public function listData(){
      require_once ROOT."/application/functions/function_action.php";
      $query = $this->kategori->selectJoin(array('etalase'), "LEFT JOIN", array('kategori.id_etalase'=>'etalase.id_etalase'), "", "kategori.hits", "DESC");
      $list = $this->kategori->getResult($query);
      $data = array();
      $no = 0;
      foreach($list as $li){
         $no ++;
         $row = array();
         $row[] = $no;
         $row[] = "<img src='".BASE_PATH."/public/images/thumbs/$li[gambar_kategori]'>";
         $row[] = $li['nama_kategori'];
         $row[] = $li['nama_etalase'];
         $row[] = $li['kd_kat'];
         $row[] = $li['hits'];
         $row[] = create_action($li['id_kategori']);
         $data[] = $row;
      }
      
      $output = array("data" => $data);
      echo json_encode($output);
   }

//Menampilkan data kategori untuk ditampilkan pada form edit   
   public function edit($id){
      $query = $this->kategori->selectWhere(array('id_kategori'=>$id));
      $data = $this->kategori->getResult($query);
      echo json_encode($data[0]);
   }

//Menyimpan data ke database
   public function insert(){
      $data = array();
      $data['nama_kategori']     = $_POST['kategori'];
      $data['slug']              = $_POST['slug'];
      $data['id_etalase']        = $_POST['etalase'];
      $data['gambar_kategori']   = $_POST['gambar_kategori'];
      $data['kd_kat']            = $_POST['kd_kat'];
         
      $simpan = $this->kategori->insert($data);
   }

//Memperbaharui data pada database
   public function update(){
      $data = array();
      $data['nama_kategori']     = $_POST['kategori'];
      $data['slug']              = $_POST['slug'];
      $data['id_etalase']        = $_POST['etalase'];
      $data['gambar_kategori']   = $_POST['gambar_kategori'];
      $data['kd_kat']            = $_POST['kd_kat'];
         
      $id = $_POST['id'];
      $simpan = $this->kategori->update($data, array('id_kategori'=>$id));
   }

//Menghapus data pada database
   public function delete($id){
      $hapus = $this->kategori->delete(array('id_kategori'=>$id));
   }
}
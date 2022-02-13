<?php
use \application\controllers\AdminMainController;
class ThreepointsController extends AdminMainController{
   function __construct(){
      parent::__construct();
      $this->model('threepoints');
   }

//Menampilkan halaman threepoints   
   public function index(){
      $this->template('admin/threepoints', 'Threepoints');
   }

//Menampilkan data threepoints melalui ajax   
   public function listData(){
      require_once ROOT."/application/functions/function_action.php";
      $query = $this->threepoints->selectAll("id_threepoints", "DESC");
      $list = $this->threepoints->getResult($query);
      $data = array();
      $no = 0;
      foreach($list as $li){
         $no ++;
         $row = array();
         $row[] = $no;
         $row[] = "<img src='".BASE_PATH."/public/images/thumbs/$li[gambar_threepoints]'>";
         $row[] = $li['judul'];
         $row[] = $li['slug'];
         $row[] = $li['produksi'];
         $row[] = $li['hits'];
         $row[] = create_action($li['id_threepoints']);
         $data[] = $row;
      }
      
      $output = array("data" => $data);
      echo json_encode($output);
   }

//Menampilkan data threepoints untuk ditampilkan pada form edit   
   public function edit($id){
      $query = $this->threepoints->selectWhere(array('id_threepoints'=>$id));
      $data = $this->threepoints->getResult($query);
      echo json_encode($data[0]);
   }

//Menyimpan data ke database
   public function insert(){
      $data = array();
      $data['judul']                 = $_POST['judul'];
      $data['slug']                  = $_POST['slug'];
      $data['gambar_threepoints']    = $_POST['gambar_threepoints'];
      $data['gambar_threepointsd']   = $_POST['gambar_threepointsd'];
      $data['gambar_threepointst']   = $_POST['gambar_threepointst'];
      $data['gambar_threepointse']   = $_POST['gambar_threepointse'];
      $data['gambar_threepointsl']   = $_POST['gambar_threepointsl'];
      $data['gambar_threepointsen']  = $_POST['gambar_threepointsen'];
      $data['produksi']              = $_POST['produksi'];
      $data['deskripsi']             = addslashes($_POST['deskripsi']);
         
      $simpan = $this->threepoints->insert($data);
   }

//Memperbaharui data pada database
   public function update(){
      $data = array();
      $data['judul']                 = $_POST['judul'];
      $data['slug']                  = $_POST['slug'];
      $data['gambar_threepoints']    = $_POST['gambar_threepoints'];
      $data['gambar_threepointsd']   = $_POST['gambar_threepointsd'];
      $data['gambar_threepointst']   = $_POST['gambar_threepointst'];
      $data['gambar_threepointse']   = $_POST['gambar_threepointse'];
      $data['gambar_threepointsl']   = $_POST['gambar_threepointsl'];
      $data['gambar_threepointsen']  = $_POST['gambar_threepointsen'];
      $data['produksi']              = $_POST['produksi'];
      $data['deskripsi']             = addslashes($_POST['deskripsi']);
         
      $id = $_POST['id'];
      $simpan = $this->threepoints->update($data, array('id_threepoints'=>$id));
   }

//Menghapus data pada database
   public function delete($id){
      $hapus = $this->threepoints->delete(array('id_threepoints'=>$id));
   }
}
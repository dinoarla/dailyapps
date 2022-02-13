<?php
use \application\controllers\AdminMainController;
class BannerController extends AdminMainController{
   function __construct(){
      parent::__construct();
      $this->model('banner');
   }

//Menampilkan halaman banner   
   public function index(){
      $this->template('admin/banner', 'Banner');
   }

//Menampilkan data banner melalui ajax   
   public function listData(){
      require_once ROOT."/application/functions/function_action.php";
      $query = $this->banner->selectAll("id_banner", "ASC");
      $list = $this->banner->getResult($query);
      $data = array();
      $no = 0;
      foreach($list as $li){
         $no ++;
         $row = array();
         $row[] = $no;
         $row[] = "<img src='".BASE_PATH."/public/images/thumbs/$li[banner]'>";
         $row[] = $li['judul'];
         $row[] = $li['jenis_banner'];
         $row[] = $li['url'];
         $row[] = create_action($li['id_banner']);
         $data[] = $row;
      }
      
      $output = array("data" => $data);
      echo json_encode($output);
   }

//Menampilkan data banner untuk ditampilkan pada form edit   
   public function edit($id){
      $query = $this->banner->selectWhere(array('id_banner'=>$id));
      $data = $this->banner->getResult($query);
      echo json_encode($data[0]);
   }

//Menyimpan data ke database
   public function insert(){
      $data = array();
      $data['banner']         = $_POST['banner'];
      $data['judul']          = $_POST['judul'];
      $data['jenis_banner']   = $_POST['jenis_banner'];
      $data['url']            = $_POST['url'];
         
      $simpan = $this->banner->insert($data);
   }

//Memperbaharui data pada database
   public function update(){
      $data = array();
      $data['banner']         = $_POST['banner'];
      $data['judul']          = $_POST['judul'];
      $data['jenis_banner']   = $_POST['jenis_banner'];
      $data['url']            = $_POST['url'];
         
      $id = $_POST['id'];
      $simpan = $this->banner->update($data, array('id_banner'=>$id));
   }

//Menghapus data pada database
   public function delete($id){
      $hapus = $this->banner->delete(array('id_banner'=>$id));
   }
}
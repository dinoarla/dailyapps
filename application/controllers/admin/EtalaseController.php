<?php
use \application\controllers\AdminMainController;
class EtalaseController extends AdminMainController{
   function __construct(){
      parent::__construct();
      $this->model('etalase');
   }

//Menampilkan halaman etalase   
   public function index(){
      $this->template('admin/etalase', 'Etalase');
   }

//Menampilkan data etalase melalui ajax   
   public function listData(){
      require_once ROOT."/application/functions/function_action.php";
      $query = $this->etalase->selectAll("id_etalase", "ASC");
      $list = $this->etalase->getResult($query);
      $data = array();
      $no = 0;
      foreach($list as $li){
         $no ++;
         $row = array();
         $row[] = $no;
         $row[] = $li['nama_etalase'];
         $row[] = $li['slug'];
         $row[] = create_action($li['id_etalase']);
         $data[] = $row;
      }
      
      $output = array("data" => $data);
      echo json_encode($output);
   }

//Menampilkan data etalase untuk ditampilkan pada form edit   
   public function edit($id){
      $query = $this->etalase->selectWhere(array('id_etalase'=>$id));
      $data = $this->etalase->getResult($query);
      echo json_encode($data[0]);
   }

//Menyimpan data ke database
   public function insert(){
      $data = array();
      $data['nama_etalase']     = $_POST['etalase'];
      $data['slug']              = $_POST['slug'];
         
      $simpan = $this->etalase->insert($data);
   }

//Memperbaharui data pada database
   public function update(){
      $data = array();
      $data['nama_etalase']      = $_POST['etalase'];
      $data['slug']              = $_POST['slug'];
         
      $id = $_POST['id'];
      $simpan = $this->etalase->update($data, array('id_etalase'=>$id));
   }

//Menghapus data pada database
   public function delete($id){
      $hapus = $this->etalase->delete(array('id_etalase'=>$id));
   }
}
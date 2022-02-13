<?php
use \application\controllers\AdminMainController;
class UlasanController extends AdminMainController{
   function __construct(){
      parent::__construct();
      $this->model('ulasan');
   }

//Menampilkan halaman ulasan   
   public function index(){
      $this->model('produk');
      $query = $this->produk->selectAll();
      $data = $this->produk->getResult($query);
      $this->template('admin/ulasan', 'Ulasan', $data);
   }

//Menampilkan data ulasan melalui ajax   
   public function listData(){
      require_once ROOT."/application/functions/function_action.php";
      require_once ROOT."/application/functions/function_date.php";
      $query = $this->ulasan->selectJoin(array('produk'), "LEFT JOIN", array('ulasan.id_produk'=>'produk.id_produk'), "", "ulasan.tgl", "DESC");
      $list = $this->ulasan->getResult($query);
      $data = array();
      $no = 0;
      foreach($list as $li){
         $no ++;
         $row = array();
         $row[] = $no;
         $row[] = "<img src='".BASE_PATH."/public/images/thumbs/$li[gambar]'>";
         $row[] = $li['isi_ulasan']."<br><span class='label label-primary'>".$li['cust']."</span>&nbsp;<span class='label label-success'> ".$li['sumber']."</span>&nbsp;<span class='label label-warning'><i class='glyphicon glyphicon-star'></i> ".$li['rate']."</span>&nbsp;<span class='label label-danger'><i class='glyphicon glyphicon-time'></i> ".tgl_indonesia($li['tgl'])."</span>";
         $row[] = create_action($li['id_ulasan']);
         $data[] = $row;
      }
      
      $output = array("data" => $data);
      echo json_encode($output);
   }

//Menampilkan data ulasan untuk ditampilkan pada form edit   
   public function edit($id){
      $query = $this->ulasan->selectWhere(array('id_ulasan'=>$id));
      $data = $this->ulasan->getResult($query);
      echo json_encode($data[0]);
   }

//Menyimpan data ke database
   public function insert(){
      $data = array();
      $data['cust']        = $_POST['cust'];
      $data['rate']        = $_POST['rate'];
      $data['id_produk']   = $_POST['produk'];
      $data['isi_ulasan']  = $_POST['isi_ulasan'];
      $data['tgl']         = $_POST['tgl'];
      $data['sumber']      = $_POST['sumber'];
         
      $simpan = $this->ulasan->insert($data);
   }

//Memperbaharui data pada database
   public function update(){
      $data = array();
      $data['cust']        = $_POST['cust'];
      $data['rate']        = $_POST['rate'];
      $data['id_produk']   = $_POST['produk'];
      $data['isi_ulasan']  = $_POST['isi_ulasan'];
      $data['tgl']         = $_POST['tgl'];
      $data['sumber']      = $_POST['sumber'];
         
      $id = $_POST['id'];
      $simpan = $this->ulasan->update($data, array('id_ulasan'=>$id));
   }

//Menghapus data pada database
   public function delete($id){
      $hapus = $this->ulasan->delete(array('id_ulasan'=>$id));
   }
}
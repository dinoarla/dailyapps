<?php
use \application\controllers\AdminMainController;
class BlogController extends AdminMainController{
   function __construct(){
      parent::__construct();
      $this->model('blog');
   }

//Menampilkan halaman threepoints   
   public function index(){
      $this->template('admin/blog', 'Blog');
   }

//Menampilkan data threepoints melalui ajax   
   public function listData(){
      require_once ROOT."/application/functions/function_action.php";
      $query = $this->blog->selectAll("id_blog", "DESC");
      $list = $this->blog->getResult($query);
      $data = array();
      $no = 0;
      foreach($list as $li){
         $no ++;
         $row = array();
         $row[] = $no;
         $row[] = "<img src='".BASE_PATH."/public/images/thumbs/$li[gambar]'>";
         $row[] = $li['judul'];
         $row[] = $li['produksi'];
         $row[] = $li['kategori'];
         $row[] = $li['hits'];
         $row[] = create_action($li['id_blog']);
         $data[] = $row;
      }
      
      $output = array("data" => $data);
      echo json_encode($output);
   }

//Menampilkan data threepoints untuk ditampilkan pada form edit   
   public function edit($id){
      $query = $this->blog->selectWhere(array('id_blog'=>$id));
      $data = $this->blog->getResult($query);
      echo json_encode($data[0]);
   }

//Menyimpan data ke database
   public function insert(){
      $data = array();
      $data['judul']           = $_POST['judul'];
      $data['slug']            = $_POST['slug'];
      $data['gambar']          = $_POST['gambar'];
      $data['caption']         = $_POST['caption'];
      $data['produksi']        = $_POST['produksi'];
      $data['kategori']        = $_POST['kategori'];
      $data['isi']             = addslashes($_POST['isi']);
         
      $simpan = $this->blog->insert($data);
   }

//Memperbaharui data pada database
   public function update(){
      $data = array();
      $data['judul']           = $_POST['judul'];
      $data['slug']            = $_POST['slug'];
      $data['gambar']          = $_POST['gambar'];
      $data['caption']         = $_POST['caption'];
      $data['produksi']        = $_POST['produksi'];
      $data['kategori']        = $_POST['kategori'];
      $data['isi']             = addslashes($_POST['isi']);
         
      $id = $_POST['id'];
      $simpan = $this->blog->update($data, array('id_blog'=>$id));
   }

//Menghapus data pada database
   public function delete($id){
      $hapus = $this->blog->delete(array('id_blog'=>$id));
   }
}
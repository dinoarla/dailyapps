<?php
use application\controllers\MainController;
class TentangController extends MainController{
   
   public function index(){      
      
      $this->model('threepoints');
      $query_threepoints = $this->threepoints->query("SELECT * FROM `threepoints` ORDER BY `id_threepoints` ASC LIMIT 4");
      $threepoints = $this->threepoints->getResult($query_threepoints);
      
      $this->model('blog');
      $query_blog = $this->blog->selectAll('id_blog', 'DESC LIMIT 3');
      $blog = $this->blog->getResult($query_blog);

      $this->model('ulasan');
      $query = $this->ulasan->query("SELECT * FROM `ulasan` LEFT JOIN produk ON ulasan.id_produk = produk.id_produk ORDER BY ulasan.tgl DESC");
      $ulasan_total = $this->ulasan->getResult($query);

      $this->template('tentang', array(
      	'threepoints'=>$threepoints, 
      	'blogd'=>$blog,
      	'ulastotal'=>$ulasan_total
      )); 
   }



} 
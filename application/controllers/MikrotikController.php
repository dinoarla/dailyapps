<?php
use application\controllers\MainController;
class MikrotikController extends MainController{
   
   public function index(){      

   	  $this->model('ulasan');
      $query = $this->ulasan->query("SELECT * FROM `ulasan` LEFT JOIN produk ON ulasan.id_produk = produk.id_produk ORDER BY ulasan.tgl DESC");
      $ulasan_total = $this->ulasan->getResult($query);

      $this->template('mikrotik', array(
      	'ulastotal'=>$ulasan_total
      )); 
   }

} 
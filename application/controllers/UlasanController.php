<?php
use application\controllers\MainController;
class UlasanController extends MainController{
   
   public function index(){    
      $this->model('ulasan');
      $query = $this->ulasan->query("SELECT * FROM `ulasan` LEFT JOIN produk ON ulasan.id_produk = produk.id_produk ORDER BY ulasan.tgl DESC LIMIT 5");
      $ulasan_total = $this->ulasan->getResult($query);

      $this->model('ulasan');
      $query = $this->ulasan->selectAll();
      $ulasan_total_qty = $this->ulasan->getRows($query);

      $this->model('ulasan');
      $query = $this->ulasan->query("SELECT AVG(rate) AS rataulasan FROM ulasan");
      $ulasan_total_avg = $this->ulasan->getResult($query);

      $this->model('ulasan');
      $query = $this->ulasan->query("SELECT SUM(IF(rate = '5', 1, 0)) AS lima, SUM(IF(rate = '4', 1, 0)) AS empat, SUM(IF(rate = '3', 1, 0)) AS tiga, SUM(IF(rate = '2', 1, 0)) AS dua, SUM(IF(rate = '1', 1, 0)) AS satu FROM ulasan");
      $ulasan_total_rekap = $this->ulasan->getResult($query);

      $this->model('kategori');
      $query = $this->kategori->selectAll();
      $kat_qty = $this->kategori->getRows($query);

      $this->model('produk');
      $query = $this->produk->selectAll();
      $prod_qty = $this->produk->getRows($query);
      
      $this->model('produk');
      $query = $this->produk->query("SELECT SUM(dibeli) AS jmlbeli FROM produk");
      $prod_dibeli = $this->produk->getResult($query);

      $this->model('transaksi');
      $query = $this->transaksi->selectWhere(array('status'=>'Lunas'));
      $trans_qty = $this->transaksi->getRows($query);

      $this->template('ulasan', array(
         'ulastotal'=>$ulasan_total, 
         'ulastotal_qty'=>$ulasan_total_qty, 
         'ulastotal_avg'=>$ulasan_total_avg, 
         'ulastotal_rekap'=>$ulasan_total_rekap,
         'katqty'=>$kat_qty,
         'proddibeli'=>$prod_dibeli,
         'prodqty'=>$prod_qty,
         'transqty'=>$trans_qty
      ));
   }

   public function load_ulasan($posisi){
      $this->model('ulasan');
      $query = $this->ulasan->query("SELECT * FROM `ulasan` LEFT JOIN produk ON ulasan.id_produk = produk.id_produk ORDER BY ulasan.tgl DESC LIMIT ".$posisi.", 5");
      $dataulasan = $this->ulasan->getResult($query);
      
      foreach($dataulasan as $ulasan){
            echo "<hr>
            <div class='reviews'>
              <div class='row blockquote review-item'>
                <div class='col-md-3 text-center'>
                <table align='center' cellpadding='0' cellspacing='0'><tr><td><div class='profile-pic'>".getProfilePicture($ulasan['cust'])."</div></td></tr></table>                  
                    <small>".$ulasan['cust']." <br><font class='review-source'>".tgl_indonesia($ulasan['tgl'])."</font></small>

                </div>
                <div class='col-md-6'>
                   <div class='rating'>".stars($ulasan['rate'])."</div>
                     <p class='review-text'>".$ulasan['isi_ulasan']." </p>
                   <div class='caption'>
                     <small class='review-source'>Sumber: ".$ulasan['sumber']."</small>
                   </div>
                </div>
                <div class='col-md-3 text-center'><a href='".BASE_PATH."/produk/detail/".$ulasan['slug']."'>
                   <div class='box-produk-ulas'><img class='img-rounded' src='".BASE_PATH."/public/images/source/".$ulasan['gambar']."'></div>
                  <div class='desc-produk-ulas'><h4 class='judul-produk-ulas'>".$ulasan['nama_produk']." </h4></div>
                  </a>
                </div>                          
              </div>  
            </div>";
         }
   }


} 
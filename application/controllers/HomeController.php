<?php
//Memanggil semua fungsi yang diperlukan
   $function = array('html', 'date', 'judul', 'rupiah');
   foreach($function as $func){
      require_once ROOT."/application/functions/function_".$func.".php";
   }
   
use application\controllers\MainController;
class HomeController extends MainController{
   public function index(){
      $this->model('produk');
      $query_baru = $this->produk->query("SELECT AVG(COALESCE(ulasan.rate, 0)) as rating, produk.* 
                           FROM produk LEFT JOIN ulasan ON produk.id_produk = ulasan.id_produk GROUP BY produk.id_produk ORDER BY produk.id_produk DESC LIMIT 6");
      $produkbaru = $this->produk->getResult($query_baru);

      $this->model('kategori');
      $query = $this->kategori->selectWhere(array('id_etalase'=>1), 'hits', 'DESC', 6);
      $katapp = $this->kategori->getResult($query);

      $this->model('kategori');
      $query = $this->kategori->selectWhere(array('id_etalase'=>2), 'hits', 'DESC', 6);
      $kattmp = $this->kategori->getResult($query);

      $this->model('kategori');
      $query = $this->kategori->selectWhere(array('id_etalase'=>3), 'hits', 'DESC', 6);
      $katppt = $this->kategori->getResult($query);

      $this->model('threepoints');
      $query_threepoints = $this->threepoints->query("SELECT * FROM `threepoints` WHERE YEAR(produksi) = YEAR(NOW()) ORDER BY `id_threepoints` ASC LIMIT 4");
      $threepoints = $this->threepoints->getResult($query_threepoints);
      
      $this->model('blog');
      $query_blog = $this->blog->selectAll('id_blog', 'DESC LIMIT 3');
      $blog = $this->blog->getResult($query_blog);

      $this->model('ulasan');
      $query = $this->ulasan->query("SELECT * FROM `ulasan` LEFT JOIN produk ON ulasan.id_produk = produk.id_produk ORDER BY ulasan.tgl DESC");
      $ulasan_total = $this->ulasan->getResult($query);
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

      $this->template('home', array(
         'produk_baru'=>$produkbaru, 
         'threepoints'=>$threepoints,
         'blogd'=>$blog,
         'kat_app'=>$katapp, 
         'kat_tmp'=>$kattmp, 
         'kat_ppt'=>$katppt, 
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

} 

      
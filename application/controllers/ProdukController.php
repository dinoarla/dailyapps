<?php
use application\controllers\MainController;
class ProdukController extends MainController{
   public function detail($slug){
      $this->model('produk');
      $query = $this->produk->selectWhere(array('slug'=>$slug));
      $produk = $this->produk->getResult($query);
      
        foreach($produk as $prodhits){
            $datahits = array();
            $datahits['hits'] = $prodhits['hits'] + 1;
            $this->produk->update($datahits, array('id_produk'=>$produk[0]['id_produk']));
        }

      $this->model('kategori');
      $query = $this->kategori->selectWhere(array('id_kategori'=>$produk[0]['id_kategori']),'id_kategori', 'DESC');
      $kategori = $this->kategori->getResult($query);

      $this->model('etalase');
      $query = $this->etalase->selectWhere(array('id_etalase'=>$kategori[0]['id_etalase']),'id_etalase', 'DESC');
      $etalase = $this->etalase->getResult($query);

      $this->model('ulasan');
      $query = $this->ulasan->selectWhere(array('id_produk'=>$produk[0]['id_produk']),'tgl', 'DESC', 10);
      $ulasan = $this->ulasan->getResult($query);
      $ulasan_qty = $this->ulasan->getRows($query);

      $this->model('ulasan');
      $query = $this->ulasan->query("SELECT AVG(rate) AS rataulasan FROM ulasan WHERE id_produk = ".$produk[0]['id_produk']."");
      $ulasan_avg = $this->ulasan->getResult($query);

      $this->model('ulasan');
      $query = $this->ulasan->query("SELECT SUM(IF(rate = '5', 1, 0)) AS lima, SUM(IF(rate = '4', 1, 0)) AS empat, SUM(IF(rate = '3', 1, 0)) AS tiga, SUM(IF(rate = '2', 1, 0)) AS dua, SUM(IF(rate = '1', 1, 0)) AS satu FROM ulasan WHERE id_produk = ".$produk[0]['id_produk']."");
      $ulasan_rekap = $this->ulasan->getResult($query);

      $this->template('detail', array('prod'=>$produk, 'kat'=>$kategori, 'eta'=>$etalase, 'ulas'=>$ulasan, 'ulas_qty'=>$ulasan_qty, 'ulas_avg'=>$ulasan_avg, 'ulas_rekap'=>$ulasan_rekap));
   }
   public function kategori($slug){
      $this->model('kategori');
      $query = $this->kategori->selectWhere(array('slug'=>$slug));
      $kategori = $this->kategori->getResult($query);
      
        foreach($kategori as $kathits){
            $datakathits = array();
            $datakathits['hits'] = $kathits['hits'] + 1;
            $this->kategori->update($datakathits, array('id_kategori'=>$kategori[0]['id_kategori']));
        }

      $this->model('etalase');
      $query = $this->etalase->selectWhere(array('id_etalase'=>$kategori[0]['id_etalase']),'id_etalase', 'DESC');
      $etalase = $this->etalase->getResult($query);
      
      $this->model('produk');
      $query = $this->produk->query("SELECT AVG(COALESCE(ulasan.rate, 0)) as rating, produk.* FROM produk 
                                       LEFT JOIN ulasan ON produk.id_produk = ulasan.id_produk 
                                       LEFT JOIN kategori ON produk.id_kategori = kategori.id_kategori
                                       WHERE kategori.id_kategori = ".$kategori[0]['id_kategori']."
                                       GROUP BY produk.id_produk ORDER BY produk.dibeli DESC");
      $produk = $this->produk->getResult($query);
      
      $this->template('kategori', array('kat'=>$kategori, 'eta'=>$etalase, 'prod'=>$produk));
   }

   public function etalase($slug){
      $this->model('etalase');
      $query = $this->etalase->selectWhere(array('slug'=>$slug));
      $etalase = $this->etalase->getResult($query);

      $this->model('kategori');
      $query = $this->kategori->selectWhere(array('id_etalase'=>$etalase[0]['id_etalase']),'hits', 'DESC');
      $kategori = $this->kategori->getResult($query);
      
      $this->model('produk');
      $query = $this->produk->query("SELECT AVG(COALESCE(ulasan.rate, 0)) as rating, produk.* FROM produk 
                                    LEFT JOIN ulasan ON produk.id_produk = ulasan.id_produk 
                                    LEFT JOIN kategori ON produk.id_kategori = kategori.id_kategori
                                    LEFT JOIN etalase ON etalase.id_etalase = kategori.id_etalase 
                                    WHERE etalase.id_etalase = ".$etalase[0]['id_etalase']."
                                    GROUP BY produk.id_produk ORDER BY produk.dibeli DESC LIMIT 12");
      $produk = $this->produk->getResult($query);
      
      $this->template('etalase', array('eta'=>$etalase, 'kat'=>$kategori, 'prod'=>$produk));
   }

   public function search(){
      $kata = htmlentities(htmlspecialchars($_POST['kata']), ENT_QUOTES);

      $this->model('produk');
      $query = $this->produk->query("SELECT AVG(COALESCE(ulasan.rate, 0)) as rating, produk.* 
                           FROM produk LEFT JOIN ulasan ON produk.id_produk = ulasan.id_produk WHERE produk.nama_produk LIKE CONCAT('%', '$kata', '%') GROUP BY produk.id_produk ORDER BY produk.dibeli DESC");
      $produk = $this->produk->getResult($query);
      
      $this->template('search', array('produk'=>$produk));
   }
   
   public function terbaru(){
      $this->model('produk');
      $query_baru = $this->produk->query("SELECT AVG(COALESCE(ulasan.rate, 0)) as rating, produk.* 
                           FROM produk LEFT JOIN ulasan ON produk.id_produk = ulasan.id_produk GROUP BY produk.id_produk ORDER BY produk.id_produk DESC LIMIT 12");
      $produkbaru = $this->produk->getResult($query_baru);
      
      $this->template('produkterbaru', array('produk_baru'=>$produkbaru));
   }

   public function terlaris(){
      $this->model('produk');
      $query = $this->produk->query("SELECT AVG(COALESCE(ulasan.rate, 0)) as rating, produk.* 
                           FROM produk LEFT JOIN ulasan ON produk.id_produk = ulasan.id_produk GROUP BY produk.id_produk ORDER BY produk.dibeli DESC LIMIT 12");
      $produklaris = $this->produk->getResult($query);
      
      $this->template('produkterlaris', array('produk_laris'=>$produklaris));
   }

   public function load($posisi, $etalase=''){
      $this->model('produk');
      $query = $this->produk->query("SELECT AVG(COALESCE(ulasan.rate, 0)) as rating, produk.* FROM produk LEFT JOIN ulasan ON produk.id_produk = ulasan.id_produk 
                                    LEFT JOIN kategori ON produk.id_kategori = kategori.id_kategori
                                    LEFT JOIN etalase ON etalase.id_etalase = kategori.id_etalase 
                                    WHERE etalase.id_etalase = '$etalase'
                                    GROUP BY produk.id_produk ORDER BY produk.dibeli DESC LIMIT ".$posisi.", 12");
      $dataproduk = $this->produk->getResult($query);
      
      foreach($dataproduk as $produk_laris){
         echo "<div class='col-md-2 col-sm-4 col-xs-6'>
          <div class='box-produk'>
            <a href='".BASE_PATH."/produk/detail/".$produk_laris['slug']."'>
            <img src='".BASE_PATH."/public/images/source/".$produk_laris['gambar']."'>
              <div class='desc'>
                <h4 class='judul-produk'>".format_judul($produk_laris['nama_produk'], 5, 30)."</h4>
                <h4 class='harga-produk'>Rp ".format_rupiah($produk_laris['harga'])."</h4>
                <h4 class='terjual-produk'><i style='color: #ffc400;' class='glyphicon glyphicon-star'></i> ".number_format($produk_laris['rating'],1)." | <i class='glyphicon glyphicon-shopping-cart'></i> Terjual ".$produk_laris['dibeli']."</h4>
              </div>
            </a>
          </div>
      </div>";
      }
   }

   public function load_kat($posisi, $kategori=''){
      $this->model('produk');
      $query = $this->produk->query("SELECT AVG(COALESCE(ulasan.rate, 0)) as rating, produk.* FROM produk 
                                       LEFT JOIN ulasan ON produk.id_produk = ulasan.id_produk 
                                       LEFT JOIN kategori ON produk.id_kategori = kategori.id_kategori
                                       WHERE kategori.id_kategori = '$kategori'
                                       GROUP BY produk.id_produk ORDER BY produk.dibeli DESC LIMIT ".$posisi.", 12");
      $dataproduk = $this->produk->getResult($query);
      
      foreach($dataproduk as $produk){
         echo "<div class='col-md-2 col-sm-4 col-xs-6'>
                <div class='box-produk'>
                  <a href='".BASE_PATH."/produk/detail/$produk[slug]'>
                  <img src='".BASE_PATH."/public/images/source/".$produk['gambar']."'>
                    <div class='desc'>
                      <h4 class='judul-produk'>".format_judul($produk['nama_produk'], 5, 30)."</h4>
                      <h4 class='harga-produk'>Rp ".format_rupiah($produk['harga'])."</h4>
                      <h4 class='terjual-produk'><i style='color: #ffc400;' class='glyphicon glyphicon-star'></i> ".number_format($produk['rating'],1)." | <i class='glyphicon glyphicon-shopping-cart'></i> Terjual ".$produk['dibeli']."</h4>
                    </div>
                  </a>
                </div>
            </div>";
      }
   }

} 
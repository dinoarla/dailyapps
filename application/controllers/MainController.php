<?php

namespace application\controllers;
$function = array('html', 'date', 'rating', 'judul', 'rupiah', 'profil');
foreach($function as $func){
   require_once ROOT."/application/functions/function_".$func.".php";
}
use \Controller;
class MainController extends Controller{
   public function template($viewName, $data=array()){   
	//Menyiapkan semua model
      $this->model('pengaturan');
      $this->model('menu');
      $this->model('kategori');
      $this->model('informasi');
      $this->model('etalase');
      $this->model('produk');
      $this->model('keranjang');
    
	//Menyiapkan data pengaturan, kategori, informasi dan produk terlaris
      $query = $this->pengaturan->selectAll();
      $datapengaturan = $this->pengaturan->getResult($query);
      
      $query = $this->kategori->selectAll('hits', 'DESC', 15);
      $datakategori = $this->kategori->getResult($query);
      
      $query = $this->informasi->selectAll();
      $datainformasi = $this->informasi->getResult($query);

      $query = $this->etalase->selectAll();
      $dataetalase = $this->etalase->getResult($query);

      $query = $this->produk->query("SELECT AVG(COALESCE(ulasan.rate, 0)) as rating, produk.* 
                           FROM produk LEFT JOIN ulasan ON produk.id_produk = ulasan.id_produk GROUP BY produk.id_produk ORDER BY produk.dibeli DESC LIMIT 6");
      $produklaris = $this->produk->getResult($query);
      
      $query_hitsapp = $this->produk->query("SELECT AVG(COALESCE(ulasan.rate, 0)) as rating, produk.* FROM produk 
                                    LEFT JOIN ulasan ON produk.id_produk = ulasan.id_produk 
                                    LEFT JOIN kategori ON produk.id_kategori = kategori.id_kategori
                                    LEFT JOIN etalase ON etalase.id_etalase = kategori.id_etalase 
                                    WHERE etalase.id_etalase = '1'
                                    GROUP BY produk.id_produk ORDER BY produk.hits DESC LIMIT 6");
      $produkhitsapp = $this->produk->getResult($query_hitsapp);
      
      $query_hitstmp = $this->produk->query("SELECT AVG(COALESCE(ulasan.rate, 0)) as rating, produk.* FROM produk 
                                    LEFT JOIN ulasan ON produk.id_produk = ulasan.id_produk 
                                    LEFT JOIN kategori ON produk.id_kategori = kategori.id_kategori
                                    LEFT JOIN etalase ON etalase.id_etalase = kategori.id_etalase 
                                    WHERE etalase.id_etalase = '2'
                                    GROUP BY produk.id_produk ORDER BY produk.hits DESC LIMIT 6");
      $produkhitstmp = $this->produk->getResult($query_hitstmp);
      
      $query_hitsppt = $this->produk->query("SELECT AVG(COALESCE(ulasan.rate, 0)) as rating, produk.* FROM produk 
                                    LEFT JOIN ulasan ON produk.id_produk = ulasan.id_produk 
                                    LEFT JOIN kategori ON produk.id_kategori = kategori.id_kategori
                                    LEFT JOIN etalase ON etalase.id_etalase = kategori.id_etalase 
                                    WHERE etalase.id_etalase = '3'
                                    GROUP BY produk.id_produk ORDER BY produk.hits DESC LIMIT 6");
      $produkhitsppt = $this->produk->getResult($query_hitsppt);
    
    //Menyiapkan data keranjang belanja	
      $sid = session_id();      
      $query = $this->keranjang->selectJoin(array('produk'), 'LEFT JOIN',array('keranjang.id_produk'=>'produk.id_produk'), array('keranjang.id_session'=>$sid));
      $datakeranjang = $this->keranjang->getResult($query);
    
	//Menyiapkan data menu
      $query = $this->menu->selectWhere(array('induk'=>0), 'urutan', 'ASC');
      $datamenu = $this->menu->getResult($query);
      $menu = array();
      foreach($datamenu as $m){         
         $qsub = $this->menu->selectWhere(array('induk'=>$m['id_menu']), 'urutan', 'ASC');
         $datasub = $this->menu->getResult($qsub);
         
		 //Membuat array sub menu
		 $sub = array();
         foreach($datasub as $s){
            $sub[] = array(
               'judul' => $s['nama_menu'],
               'link' => $this->get_link($s['jenis_link'], $s['link'])
            );
         }
         
		 //Membuat array menu
         $menu[] = array(
               'judul' => $m['nama_menu'],
               'link' => $this->get_link($m['jenis_link'], $m['link']),
               'submenu' => $sub
            );
      }
      
	  //Mengirimkan data ke template
      $view = $this->view('template');
      $view->bind('viewName', $viewName);
      $view->bind('pengaturan', $datapengaturan);
      $view->bind('data', array_merge($data, array(
         'keranjang' => $datakeranjang,
         'menu' => $menu, 
         'pengaturan'=>$datapengaturan, 
         'informasi'=>$datainformasi,
         'etalase'=>$dataetalase,
         'kategori'=>$datakategori,
         'bestseller' => $produklaris,
         'hitsapp'=>$produkhitsapp,
         'hitstmp'=>$produkhitstmp,
         'hitsppt'=>$produkhitsppt)));   
   }
   
   //Membuat fungsi untuk menentukan target menu ketika diklik sesuai nilai jenis link
   function get_link($datajenis, $datalink){
      $link = "";
      if($datajenis == 'kategori'){
         $qkat = $this->kategori->selectWhere(array('id_kategori'=>$datalink));
         $dkat = $this->kategori->getResult($qkat);
         $jml = $this->kategori->getRows($qkat);
         if($jml>=1) $link = BASE_PATH."/produk/kategori/".$dkat[0]['slug'];
      }elseif($datajenis == 'informasi'){
         $qinfo = $this->informasi->selectWhere(array('id_informasi'=>$datalink));
         $dinfo = $this->informasi->getResult($qinfo);
         $jml = $this->informasi->getRows($qinfo);
         if($jml>=1) $link = BASE_PATH."/informasi/konten/".$dinfo[0]['slug'];
      }elseif($datajenis == 'etalase'){
         $qeta = $this->etalase->selectWhere(array('id_etalase'=>$datalink));
         $deta = $this->etalase->getResult($qeta);
         $jml = $this->etalase->getRows($qeta);
         if($jml>=1) $link = BASE_PATH."/produk/etalase/".$deta[0]['slug'];
      }else{
         $link = BASE_PATH."/".$datalink;
      }
      return $link;
   }

   
} 
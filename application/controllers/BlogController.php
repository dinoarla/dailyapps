<?php
use application\controllers\MainController;
class BlogController extends MainController{
   
   public function index(){    
      $this->model('blog');
      $query_blog = $this->blog->selectAll('id_blog', 'DESC LIMIT 4');
      $blog = $this->blog->getResult($query_blog);

      $this->model('blog');
      $query_blog_bd = $this->blog->selectWhere(array('kategori'=>'Bisnis Digital'), 'hits', 'DESC LIMIT 3');
      $blog_bd = $this->blog->getResult($query_blog_bd);
      
      $this->model('blog');
      $query_blog_bdq = $this->blog->selectWhere(array('kategori'=>'Bisnis Digital'));
      $blog_bdqty = $this->blog->getRows($query_blog_bdq);

      $this->model('blog');
      $query_blog_dm = $this->blog->selectWhere(array('kategori'=>'Digital Marketing'), 'hits', 'DESC LIMIT 3');
      $blog_dm = $this->blog->getResult($query_blog_dm);
      
      $this->model('blog');
      $query_blog_dmq = $this->blog->selectWhere(array('kategori'=>'Digital Marketing'));
      $blog_dmqty = $this->blog->getRows($query_blog_dmq);

      $this->model('blog');
      $query_blog_tu = $this->blog->selectWhere(array('kategori'=>'Tutorial'), 'hits', 'DESC LIMIT 3');
      $blog_tu = $this->blog->getResult($query_blog_tu);
      
      $this->model('blog');
      $query_blog_tuq = $this->blog->selectWhere(array('kategori'=>'Tutorial'));
      $blog_tuqty = $this->blog->getRows($query_blog_tuq);

      $this->model('blog');
      $query_blog_tren = $this->blog->selectAll('hits', 'DESC LIMIT 3');
      $blog_tren = $this->blog->getResult($query_blog_tren);

      $this->model('ulasan');
      $query = $this->ulasan->query("SELECT * FROM `ulasan` LEFT JOIN produk ON ulasan.id_produk = produk.id_produk ORDER BY ulasan.tgl DESC LIMIT 3");
      $ulasan_total = $this->ulasan->getResult($query);

      $this->template('blog', array(
         'ulastotal'=>$ulasan_total, 
         'blogd'=>$blog,
         'blogbd'=>$blog_bd,
         'blogdm'=>$blog_dm,
         'blogtu'=>$blog_tu,
         'blogbdqty'=>$blog_bdqty,
         'blogdmqty'=>$blog_dmqty,
         'blogtuqty'=>$blog_tuqty,
         'blogt'=>$blog_tren
      ));
   }

   public function blogdetail($slug){
      $this->model('blog');
      $query = $this->blog->selectWhere(array('slug'=>$slug));
      $blog = $this->blog->getResult($query);
      
      foreach($blog as $bloghits){
            $datahits = array();
            $databloghits['hits'] = $bloghits['hits'] + 1;
            $this->blog->update($databloghits, array('id_blog'=>$blog[0]['id_blog']));
        }

      $this->model('blog');
      $query_blog_tren = $this->blog->selectAll('hits', 'DESC LIMIT 3');
      $blog_tren = $this->blog->getResult($query_blog_tren);

      $this->model('ulasan');
      $query = $this->ulasan->query("SELECT * FROM `ulasan` LEFT JOIN produk ON ulasan.id_produk = produk.id_produk ORDER BY ulasan.tgl DESC LIMIT 3");
      $ulasan_total = $this->ulasan->getResult($query);

      $this->template('blogdetail', array(
         'blogd'=>$blog,
         'ulastotal'=>$ulasan_total, 
         'blogt'=>$blog_tren
      ));
   }


} 
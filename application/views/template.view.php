<!DOCTYPE html>
<html lang="id">
<head>
<?php
   //Memanggil semua fungsi yang diperlukan
    $function = array('html', 'date', 'rupiah');
    foreach($function as $func){
      require_once ROOT."/application/functions/function_".$func.".php";
    }

    //Bagian SEO 
    $url = (isset($_GET['url'])) ? $_GET['url'] : "";
    $url_detail = substr($url, 0, strrpos($url, '/'));
    $keys = "template ppt, ppt template, download template ppt, powerpoint template, template, download template ppt gratis, template web, 
            template web bootstrap, download template web responsive, template web gratis, aplikasi siap pakai, source code, e-commerce, 
            login mikrotik, dailyapps, download gratis digital assets";
      if($url_detail=="produk/etalase"){    
        $eta = $data['eta'][0];    
        $judul = 'Etalase '.$eta['nama_etalase'].' - DailyApps';
        $deskripsi = 'Etalase '.$eta['nama_etalase'].' Terbaik dari DailyApps. Download Sepuasnya Berbagai Macam Aset Digital, Template Website, Template PPT dan Aplikasi Siap Pakai! Gratis dan Berbayar dengan Design Premium Kualitas Terbaik Dunia.';
        $keyword = $keys;
        $gmbr = ''.BASE_PATH.'/public/images/thumbsnew.jpg';
      }elseif($url_detail=="produk/kategori"){ 
        $kat = $data['kat'][0];
        $judul = 'Kategori '.$kat['nama_kategori'].' - DailyApps';
        $deskripsi = 'Kategori '.$kat['nama_kategori'].' Terbaik dari DailyApps. Download Sepuasnya Berbagai Macam Aset Digital, Template Website, Template PPT dan Aplikasi Siap Pakai! Gratis dan Berbayar dengan Design Premium Kualitas Terbaik Dunia.';
        $keyword = $keys;
        $gmbr = ''.BASE_PATH.'/public/images/source/'.$kat['gambar_kategori'].'';
      }elseif($url_detail=="produk/detail"){ 
        $produk = $data['prod'][0];
        $judul = $produk['nama_produk'].' - DailyApps';
        $deskripsi = $produk['nama_produk'].' - DailyApps. Download Sepuasnya Berbagai Macam Aset Digital, Template Website, Template PPT dan Aplikasi Siap Pakai! Gratis dan Berbayar dengan Design Premium Kualitas Terbaik Dunia.';
        $keyword = $keys;
        $gmbr = ''.BASE_PATH.'/public/images/source/'.$produk['gambar'].'';
      }elseif($url_detail=="blog/blogdetail"){ 
        $blog_dt = $data['blogd'][0];
        $judul = $blog_dt['judul'].' - DailyApps Blog & Tutorial';
        $deskripsi = $blog_dt['caption'].' - DailyApps. Download Sepuasnya Berbagai Macam Aset Digital, Template Website, Template PPT dan Aplikasi Siap Pakai! Gratis dan Berbayar dengan Design Premium Kualitas Terbaik Dunia.';
        $keyword = $keys;
        $gmbr = ''.BASE_PATH.'/public/images/source/'.$blog_dt['gambar'].'';
      }elseif($url=="keranjang"){ 
        $judul = 'Keranjang Belanja - DailyApps';
        $deskripsi = 'Ayo Isi Keranjang Belanja dengan Produk Terbaik dari DailyApps. Download Sepuasnya Berbagai Macam Aset Digital, Template Website, Template PPT dan Aplikasi Siap Pakai! Gratis dan Berbayar dengan Design Premium Kualitas Terbaik Dunia.';
        $keyword = $keys;
        $gmbr = ''.BASE_PATH.'/public/images/thumbsnew.jpg';
      }elseif($url=="ulasan"){ 
        $judul = 'Statistik dan Ulasan - DailyApps';
        $deskripsi = 'DailyApps dalam Angka dan Kata. Lihat Kepuasan dan Kepercayaan Customer kepada DailyApps. Download Sepuasnya Berbagai Macam Aset Digital, Template Website, Template PPT dan Aplikasi Siap Pakai! Gratis dan Berbayar dengan Design Premium Kualitas Terbaik Dunia.';
        $keyword = $keys;
        $gmbr = ''.BASE_PATH.'/public/images/thumbsnew.jpg';
      }elseif($url=="tracking"){ 
        $judul = 'Tracking Pesanan - DailyApps';
        $deskripsi = 'Lacak Pesanan Kamu Secara Real Time dengan Fitur Tracking dari DailyApps. Bebas Khawatir Paket Ga Sampai. Download Sepuasnya Berbagai Macam Aset Digital, Template Website, Template PPT dan Aplikasi Siap Pakai! Gratis dan Berbayar dengan Design Premium Kualitas Terbaik Dunia.';
        $keyword = $keys;
        $gmbr = ''.BASE_PATH.'/public/images/thumbsnew.jpg';
      }elseif($url=="pesan"){ 
        $judul = 'Hubungi Kami - DailyApps';
        $deskripsi = 'Kami Selalu Siap Menerima Obrolan dan Keluh Kesah Anda di Dunia Digital. Hubungi DailyApps Sekarang! Dan Raih Impianmu Di Bisnis Digital Bersama DailyApps. Download Sepuasnya Berbagai Macam Aset Digital, Template Website, Template PPT dan Aplikasi Siap Pakai! Gratis dan Berbayar dengan Design Premium Kualitas Terbaik Dunia.';
        $keyword = $keys;
        $gmbr = ''.BASE_PATH.'/public/images/thumbsnew.jpg';
      }elseif($url=="threepoints"){ 
        $judul = 'Threepoints - DailyApps';
        $deskripsi = 'Download Gratis Buletin Mingguan Threepoints dari DailyApps! Membahas tentang 3 hal kunci yang bermanfaat untuk pengembangan bisnis, optimasi jualan, pemasaran usaha, pengembangan diri dan sebagainya.';
        $keyword = $keys;
        $mgbr = ''.BASE_PATH.'/public/images/thumbsnew.jpg';
      }elseif($url=="tentang"){ 
        $judul = 'Tentang - DailyApps';
        $deskripsi = 'Sekilas Tentang DailyApps. Download Sepuasnya Berbagai Macam Aset Digital, Template Website, Template PPT dan Aplikasi Siap Pakai! Gratis dan Berbayar dengan Design Premium Kualitas Terbaik Dunia.';
        $keyword = $keys;
        $gmbr = ''.BASE_PATH.'/public/images/thumbsnew.jpg';
      }elseif($url=="blog"){ 
        $judul = 'Blog & Tutorial - DailyApps';
        $deskripsi = 'Dapatkan Pembelajaran Ilmu dan Pengetahuan Secara Gratis Seputar Bisnis Digital Bersama DailyApps Mulai Dari UMKM Go Online, SEO, Scale Up Bisnis di Era Krisis, Promosi Apik Lewat Login Mikrotik dan Tutorial-tutorial  Bermanfaat Lainnya.';
        $keyword = $keys;
        $gmbr = ''.BASE_PATH.'/public/images/thumbsnew.jpg';
      }else{
        $judul = 'DailyApps: Indonesia Premium Digital Assets & Templates Store';
        $deskripsi = 'Download Sepuasnya Berbagai Macam Aset Digital, Template Website, Template PPT dan Aplikasi Siap Pakai! Gratis dan Berbayar dengan Design Premium Kualitas Terbaik Dunia.';
        $keyword = $keys;
        $gmbr = ''.BASE_PATH.'/public/images/thumbsnew.jpg';
      } 

      echo'<title>'.$judul.'</title>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="robots" content="index, follow">
      <meta name="description" content="'.$deskripsi.'">
      <meta name="keywords" content="'.$keyword.'">
      <meta name="author" content="DailyApps - Powered by Arla Industri">
      <meta name="language" content="Indonesia">
      <meta name="revisit-after" content="7">
      <meta name="webcrawlers" content="all">
      <meta name="rating" content="general">
      <meta name="spiders" content="all">
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      
      <meta name="twitter:card" content="product">
      <meta name="twitter:site" content="@publisher_handle">
      <meta name="twitter:title" content="'.$judul.'">
      <meta name="twitter:description" content="'.$deskripsi.'">
      <meta name="twitter:url" content="'.BASE_PATH.'" />
      <meta name="twitter:creator" content="@author_handle">
      <meta name="twitter:image" content="'.$gmbr.'">

      <meta property="fb:app_id" content="170296005200078" />
      <meta property="og:title" content="'.$judul.'" />
      <meta property="og:type" content="website" />
      <meta property="og:url" content="'.BASE_PATH.'" />
      <meta property="og:image" content="'.$gmbr.'" />
      <meta property="og:description" content="'.$deskripsi.'" />
      <meta property="og:site_name" content="'.$judul.'" />
      
      <meta name="facebook-domain-verification" content="lkx6cusak2xzx0vlveemmno0yv9ywu" />
      
      <link rel="apple-touch-icon" sizes="180x180" href="'.BASE_PATH.'/public/images/favicon/apple-touch-icon.png">
      <link rel="icon" type="image/png" sizes="32x32" href="'.BASE_PATH.'/public/images/favicon/favicon-32x32.png">
      <link rel="icon" type="image/png" sizes="16x16" href="'.BASE_PATH.'/public/images/favicon/favicon-16x16.png">
      <link rel="manifest" href="'.BASE_PATH.'/public/images/favicon/site.webmanifest">';

    //Memanggil file CSS dan library jQuery
    load_css('bootstrap/css/bootstrap.min.css');
    load_css('css/style.css');
    load_script('jquery/jquery-2.0.2.min.js');
   
?>  
    <script src="https://kit.fontawesome.com/d75c306f0c.js" crossorigin="anonymous"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-RN36CKEL61"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-RN36CKEL61');
    </script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script>
         $(window).load(function() {
         $(".loader").fadeOut("slow");
         })
    </script>
</head>
<body><div class="loader"></div>  
<!-- modal keranjang belanja --> 
   <div class="modal slide" id="modalkeranjang" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
                 
      <div class="modal-header">        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"> &times; </span> </button>
        <h3 class="modal-title">Keranjang Belanja</h3>
      </div>
<div class="modal-body" id="modal_keranjang">
<table class="table table-striped">
   <tr>
      <th>No</th>
      <th>Gambar</th>
      <th>Nama Produk</th>
      <th>Harga</th>
      <th>Jumlah</th>
      <th>Total</th>
   </tr>
<?php
$no = 1;
$total = 0;
$jmlitem = 0;
foreach($data['keranjang'] as $produk){
   $subtotal = $produk['jumlah']*$produk['harga'];
   $total += $subtotal;
   $jmlitem += $produk['jumlah'];
?>
   <tr>
      <td><?= $no ?></td>
      <td><img alt="<?= $produk['nama_produk'] ?>" src="<?= BASE_PATH ?>/public/images/thumbs/<?= $produk['gambar'] ?>" width="80"></td>
      <td><?= $produk['nama_produk']."<br><span class='label label-primary'>".$produk['kd_sku']."</span>"?></td>
      <td>Rp <?= format_rupiah($produk['harga']) ?></td>
      <td><?= $produk['jumlah'] ?></td>
      <td>Rp <?= format_rupiah($subtotal) ?></td>
   </tr>
<?php
   $no++;
}   
?>   
   <tr>
      <td colspan="5" style="text-align:right;">Total</td>
      <td><b>Rp <?= format_rupiah($total) ?></b></td>
   </tr>
</table>
         
      
      
      </div>
      <div class="modal-footer">
<?php
if(count($data['keranjang']) != 0){
?>
         <a href="<?= BASE_PATH ?>/keranjang" class="btn btn-primary"><i class="glyphicon glyphicon-check"></i> Lihat Keranjang</a>
<?php
}else{
?>
          <a  class="btn btn-primary disabled"><i class="glyphicon glyphicon-check"></i> Lihat Keranjang</a>
<?php } ?>
      </div>   
         </div>
      </div>
   </div>
<!-- /modal --> 

 
<!-- header dan menu navigasi-->
   <nav class="navbar navbar-fixed-top">
    
    <div class="top_bar">
      <div class="container">
        <div class="col-md-6">
          <ul class="left-top">
            <li><a href='<?= BASE_PATH ?>/tentang'>Tentang DailyApps</a></li>
            <li><a href='<?= BASE_PATH ?>/jasa'>Jasa</a></li>
            <li><a href='<?= BASE_PATH ?>/threepoints'>Buletin Threepoints</a></li>
            <li><a href='<?= BASE_PATH ?>/blog'>Blog & Tutorial</a></li>
            </ul>
        </div>

        <div class="col-md-6">
            <ul class="right-top">
            <li><a href="<?= BASE_PATH ?>/admin" >Masuk</a></li>
            <li><a href="#" >Download Gratis!</a></li>
          </ul>
        </div>
      </div>
    </div>
    <!--top_bar-->

         <div class="container">
            <div class="navbar-header">
               <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
               </button>
               
               <a class="navbar-brand" href="<?= BASE_PATH ?>"><img alt="Logo Head" src="<?= BASE_PATH ?>/public/images/logo.png" class="logo" height="45"></a>
               
               <form method="post" action="<?= BASE_PATH ?>/produk/search" class="pull-right navbar-form visible-md visible-lg">
                  <input type="text" name="kata" placeholder="Cari aplikasi siap pakai, template web premium, presentasi kece?" class="form-control" size="60" maxlength="100">
                  <button type="submit" class="btn btn-primary"><i class='fas fa-search'></i></button>
               </form>
               
               <button class="btn btn-link navbar-right cart" data-toggle="modal" data-target="#modalkeranjang">
                  <i class="fas fa-shopping-cart"></i>
                  <b>Rp <?= format_rupiah($total) ?></b> (<?= $jmlitem ?> barang)
               </button>
            </div>
                        
            <!-- menu navigasi -->
            <div id="navbar" class="collapse navbar-collapse">
               <ul class="nav navbar-nav">
                  <?php
                  foreach($data['menu'] as $m){
                     if(count($m['submenu'])==0) echo "<li><a href='$m[link]'>$m[judul]</a></li>";
                     else{
                        echo "<li class='dropdown'><a style='background: #0b0f20;' href='#' class='dropdown-toggle' data-toggle='dropdown'>$m[judul]  <span class='caret'></span></a>
                           <ul class='dropdown-menu'>";
                        foreach($m['submenu'] as $s){
                           echo "<li><a href='$s[link]'>$s[judul]</a></li>";
                        }
                        echo"</ul></li>";
                     }
                  }
                  ?>  
                  <li class="visible-xs">
                    <form method="post" action="<?= BASE_PATH ?>/produk/search" class="form-s-mobile">
                      <input type="text" name="kata" placeholder="Mau cari apa, sob?" class="form-control" maxlength="30">
                      <button type="submit" class="btn btn-primary visible-xs" style="width: 100%"><i class='glyphicon glyphicon-search'></i> Cari</button>
                    </form>
                  </li>

               </ul>
            </div>
			<!-- /menu -->
         </div>
   </nav>
<!-- /header -->
   
<!-- konten toko online -->
   <div class="container">
      <div class="row">
   
   <?php
      $view = new View($viewName);
      $view->bind('data', $data);

      if($viewName == 'home'){
         echo "<div class='col-md-12'>";
         $view->render();
         echo "</div>";
      }else{ 
      ?>

      <div class="col-md-12">
         <?php $view->render(); ?>
      </div>

      <div class="col-md-12">
      <hr>
      <h3 class="judul-konten">Udah Cek Ini?</h3>
      <div class="row">
         <?php
         foreach($data['bestseller'] as $produk_laris){
            echo "<div class='col-md-2 col-sm-4 col-xs-6'>
                  <div class='box-produk'>
                  <a href='".BASE_PATH."/produk/detail/$produk_laris[slug]'>
                  <img alt='".$produk_laris['nama_produk']."' src='".BASE_PATH."/public/images/source/".$produk_laris['gambar']."'>
                    <div class='desc'>
                      <h4 class='judul-produk'>".format_judul($produk_laris['nama_produk'], 5, 30)."</h4>
                      <h4 class='harga-produk'>Rp ".format_rupiah($produk_laris['harga'])."</h4>
                      <h4 class='terjual-produk'><i class='fas fa-star'></i> ".number_format($produk_laris['rating'],1)." | <i class='glyphicon glyphicon-shopping-cart'></i> Terjual ".$produk_laris['dibeli']."</h4>
                    </div>
                  </a>
                </div>
               </div>";
         }
         ?>            
      </div>
      </div>
   <?php
   }
   ?>         


      </div>
   </div>
<!-- /konten -->
  
<!-- footer -->
   <footer id="top-footer">
      <div class="container">
         <div class="social">
            <a class="facebook" target="blank" href="<?= $pengaturan[0]['facebook'] ?>"></a>
            <a class="twitter" target="blank" href="<?= $pengaturan[0]['twitter'] ?>"></a>
            <a class="instagram" target="blank" href="<?= $pengaturan[0]['instagram'] ?>"></a>
         </div>
         <a class="btn-up pull-right"><i class="glyphicon glyphicon-circle-arrow-up"></i></a>
      </div>
   </footer>
   
   <footer>
      <div class="container">
         <div class="row">
            <div class="col-md-3">
               <h3 class="tagline">
                  <img alt="Logo Footer" src="<?= BASE_PATH ?>/public/images/logo.png" class="logo-footer" style="height:auto; width:100%;"><br><br>
                  The No. 1 Premium Template Store in Indonesia with World Class Design and Affordable Prices.<br><br>
                  Powered By <img alt="Powered by Arla Industri" src="<?= BASE_PATH ?>/public/images/ai.png" class="logo-footer" style="height:auto; width:60%;"><br><br>
               </h3>

                  <?php
                     $s = $data['pengaturan'][0];
                     echo "<a class='btn btn-primary' href='".BASE_PATH."/pesan' style='width:100%;'>Ga Ada Produk Yang Dicari?</a><br><br>";
                     echo "<a class='btn btn-primary' href='https://api.whatsapp.com/send?phone=$s[telp]' style='width:100%;' target='_blank'>Bisa Hubungi Via Whatsapp</a><br><br>";
                     echo "<a class='btn btn-primary' href='mailto:$s[email]' style='width:100%;' target='_blank'>Atau Email ke $s[email]</a><br><br>";
                  ?>
            </div>
            <div class="col-md-3">
               <h3 class="judul">Trending Kategori</h3>
               <ul>
                  <?php
                     foreach($data['kategori'] as $k){
                        echo "<li><a href='".BASE_PATH."/produk/kategori/$k[slug]'>$k[nama_kategori]</a></li>";
                     }
                  ?>                  
               </ul>
            </div>
            <div class="col-md-3">
               <h3 class="judul">Info Pelanggan</h3>
               <ul>
                  <?php
                     foreach($data['informasi'] as $i){
                        echo "<li><a href='".BASE_PATH."/informasi/konten/$i[slug]'>$i[judul]</a></li>";
                     }
                  ?>                  
               </ul>
               
               <h3 class="judul">DailyApps</h3>
               <ul>
                  <li><a href='<?= BASE_PATH ?>/tentang'>Tentang DailyApps</a></li>
                  <li><a href='<?= BASE_PATH ?>/jasa'>Jasa (On Demand Services)</a></li>
                  <li><a href='<?= BASE_PATH ?>/threepoints'>Buletin Mingguan Threepoints</a></li>
                  <li><a href='<?= BASE_PATH ?>/blog'>Blog & Tutorial</a></li>
               </ul>
               
               <h3 class="judul">Kami Juga Buka di</h3>
                  <a href="https://tokopedia.com/dailyapps" target="_blank"><img alt="Tokopedia" class="bayar-ongkir" src="<?= BASE_PATH ?>/public/images/tokped.png"></a>&nbsp;
                  <a href="https://bukalapak.com/u/dinoarla8656" target="_blank"><img alt="Bukalapak" class="bayar-ongkir" src="<?= BASE_PATH ?>/public/images/bl.png"></a>&nbsp;
                  <a href="https://shopee.co.id/dailyapps" target="_blank"><img alt="Shopee" class="bayar-ongkir" src="<?= BASE_PATH ?>/public/images/shopee.png"></a><br>
            </div>
            <div class="col-md-3">
               <h3 class="judul">Pembayaran</h3>
                  <img alt="BNI" class="bayar-ongkir" src="<?= BASE_PATH ?>/public/images/bni.png">&nbsp;
                  <img alt="BRI" class="bayar-ongkir" src="<?= BASE_PATH ?>/public/images/bri.png">&nbsp;
                  <img alt="Mandiri" class="bayar-ongkir" src="<?= BASE_PATH ?>/public/images/mandiri.png">&nbsp;
                  <img alt="Mandiri" class="bayar-ongkir" src="<?= BASE_PATH ?>/public/images/gopay.png">&nbsp;
                  <img alt="Mandiri" class="bayar-ongkir" src="<?= BASE_PATH ?>/public/images/ovo.png">&nbsp;
                  <img alt="BRI" class="bayar-ongkir" src="<?= BASE_PATH ?>/public/images/paypal.png"><br>
               <h3 class="judul">Jasa Pengiriman</h3>
                  <img alt="JNE" class="bayar-ongkir" src="<?= BASE_PATH ?>/public/images/jne.png">&nbsp;
                  <img alt="JNT" class="bayar-ongkir" src="<?= BASE_PATH ?>/public/images/jnt.png">&nbsp;
                  <img alt="SiCepat" class="bayar-ongkir" src="<?= BASE_PATH ?>/public/images/sicepat.png"><br>
               <h3 class="judul">Keamanan</h3>
                  <img alt="SSL" class="bayar-ongkir" src="<?= BASE_PATH ?>/public/images/ssl.png">&nbsp;
                  <img alt="Immunify" class="bayar-ongkir" src="<?= BASE_PATH ?>/public/images/immunify.png">&nbsp;
                  <img alt="Kriptografi" class="bayar-ongkir" src="<?= BASE_PATH ?>/public/images/kripto.png"><br><br>

            </div>
         </div>
      </div>
   </footer>
   
   <footer id="bottom-footer">
      DailyApps Versi 1.2.7 &copy; 2021. Hak Cipta Terpelihara dan Dilindungi Undang-Undang. Salam Hangat Penuh <i style='color: #ff0002;' class='fas fa-heart'></i> dari Arla Industri.
   </footer>
<!-- /footer -->

<?php

   load_script('bootstrap/js/bootstrap.min.js');
   load_script('validate/jquery.validate.min.js');

?>
<script>
   $(function(){
      $('.btn-up').click(function(){
         $('html, body').animate({scrollTop: 0}, 300);
      });
   });

   $('.carousel[data-type="multi"] .item').each(function() {
       var next = $(this).next();
       if (!next.length) {
          next = $(this).siblings(':first');
       }
       next.children(':first-child').clone().appendTo($(this));
    
       for (var i = 0; i < 4; i++) {
          next = next.next();
          if (!next.length) {
             next = $(this).siblings(':first');
          }
    
          next.children(':first-child').clone().appendTo($(this));
       }
    });
    
    var channelID = "UCfhJznggbCN5Kc_y6ioW6KQ";
    var reqURL = "https://www.youtube.com/feeds/videos.xml?channel_id=";
        $.getJSON("https://api.rss2json.com/v1/api.json?rss_url=" + encodeURIComponent(reqURL)+channelID, function(data) {
           var link = data.items[0].link;
           var id = link.substr(link.indexOf("=")+1);
        $("#youtube_video").attr("src","https://youtube.com/embed/"+ id + "?controls=0&showinfo=0&rel=0");
    		var link = data.items[1].link;
           	var id = link.substr(link.indexOf("=")+1);
        $("#youtube_video2").attr("src","https://youtube.com/embed/"+ id + "?controls=0&showinfo=0&rel=0");
    		var link = data.items[2].link;
         	var id = link.substr(link.indexOf("=")+1);
        $("#youtube_video3").attr("src","https://youtube.com/embed/"+ id + "?controls=0&showinfo=0&rel=0");
    });

</script>
</body>
</html>

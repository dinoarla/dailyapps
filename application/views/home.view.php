<?php
$rataulas = $data['ulastotal_avg'][0];
$rekapulas = $data['ulastotal_rekap'][0];
$prodbeli = $data['proddibeli'][0];
?>


<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
    <li data-target="#carousel-example-generic" data-slide-to="4"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img alt="Banner Utama" src="<?= BASE_PATH ?>/public/images/banner/banner_st_new.jpg">
    </div>
    <div class="item">
      <img alt="Banner Dua" src="<?= BASE_PATH ?>/public/images/banner/banner_dua_new.jpg">
    </div>
    <div class="item">
      <img alt="Banner Tiga" src="<?= BASE_PATH ?>/public/images/banner/banner-tiga.jpg">
    </div>
    <div class="item">
      <img alt="Banner Empat" src="<?= BASE_PATH ?>/public/images/banner/banner-empat.jpg">
    </div>
    <div class="item">
      <img alt="Banner Lima" src="<?= BASE_PATH ?>/public/images/banner/banner-lima.jpg">
    </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>

<br>

<h3 class="judul-konten">Produk Terlaris <a class="lihat-semua" href="<?= BASE_PATH ?>/produk/terlaris">Lihat Semua</a></h3>
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

</div><br>
<a class="btn btn-primary-outline lihat-semua-mobile" href="<?= BASE_PATH ?>/produk/terlaris">Lihat Semua</a>

<hr>
<h3 class="judul-konten">Produk Terbaru <a class="lihat-semua" href="<?= BASE_PATH ?>/produk/terbaru">Lihat Semua</a></h3>
<div class="row">

<?php
foreach($data['produk_baru'] as $produk_baru){
   echo "<div class='col-md-2 col-sm-4 col-xs-6'>
          <div class='box-produk'>
            <a href='".BASE_PATH."/produk/detail/$produk_baru[slug]'>
            <img alt='".$produk_baru['nama_produk']."' src='".BASE_PATH."/public/images/source/".$produk_baru['gambar']."'>
              <div class='desc'>
                <h4 class='judul-produk'>".format_judul($produk_baru['nama_produk'], 5, 30)."</h4>
                <h4 class='harga-produk'>Rp ".format_rupiah($produk_baru['harga'])."</h4>
                <h4 class='terjual-produk'><i  class='fas fa-star'></i> ".number_format($produk_baru['rating'],1)." | <i class='glyphicon glyphicon-shopping-cart'></i> Terjual ".$produk_baru  ['dibeli']."</h4>
              </div>
            </a>
          </div>
      </div>";
}
?>   

</div><br>
<a class="btn btn-primary-outline lihat-semua-mobile" href="<?= BASE_PATH ?>/produk/terbaru">Lihat Semua</a>
    
<hr>
<h3 class="judul-konten">DailyApps Spesial Bulan <?php echo tgl_indonesia_bulan(date('Y-m-d')); ?></h3>
<div class="row">
    
  <div class="col-md-4 col-sm-4 col-xs-12 box-kategori">
    <div><img alt="Banner-01" src="<?= BASE_PATH ?>/public/images/banner/1.jpg"></div><br>
  </div>
  <div class="col-md-4 col-sm-4 col-xs-12 box-kategori">
    <div><img alt="Banner-02" src="<?= BASE_PATH ?>/public/images/banner/2.jpg"></div><br>
  </div>
  <div class="col-md-4 col-sm-4 col-xs-12 box-kategori">
    <div><img alt="Banner-03" src="<?= BASE_PATH ?>/public/images/banner/3.jpg"></div>
  </div>
  
</div>

<hr>
<h3 class="judul-konten">Cari Aplikasi Siap Pakai? <a class="lihat-semua" href="<?= BASE_PATH ?>/produk/etalase/aplikasi-siap-pakai">Lihat Semua</a></h3>
<div class="row">

<?php
foreach($data['kat_app'] as $kat_app){
   echo "<div class='col-md-2 col-sm-4 col-xs-6'>
            <a href='".BASE_PATH."/produk/kategori/$kat_app[slug]'>
              <div class='box-kategori-new'>
                <i class='fas fa-".$kat_app['ikon']." fa-2x'></i>
                <h4 class='judul-kategori'>".$kat_app['nama_kategori']."</h4>
              </div>
            </a>
        </div>";
}
?>     

</div><br>
<h3 class="judul-konten">Terhits di Aplikasi Siap Pakai</h3>
<div class="row">

<?php
foreach($data['hitsapp'] as $hits_app){
   echo "<div class='col-md-2 col-sm-4 col-xs-6'>
          <div class='box-produk'>
            <a href='".BASE_PATH."/produk/detail/$hits_app[slug]'>
            <img alt='".$hits_app['nama_produk']."' src='".BASE_PATH."/public/images/source/".$hits_app['gambar']."'>
              <div class='desc'>
                <h4 class='judul-produk'>".format_judul($hits_app['nama_produk'], 5, 30)."</h4>
                <h4 class='harga-produk'>Rp ".format_rupiah($hits_app['harga'])."</h4>
                <h4 class='terjual-produk'><i  class='fas fa-star'></i> ".number_format($hits_app['rating'],1)." | <i class='glyphicon glyphicon-shopping-cart'></i> Terjual ".$hits_app['dibeli']."</h4>
              </div>
            </a>
          </div>
      </div>";
}
?>   

</div><br>
<a class="btn btn-primary-outline lihat-semua-mobile" href="<?= BASE_PATH ?>/produk/etalase/aplikasi-siap-pakai">Lihat Semua</a>

<hr>
<h3 class="judul-konten">Cari Template Web Kece? <a class="lihat-semua" href="<?= BASE_PATH ?>/produk/etalase/template-web-premium">Lihat Semua</a></h3>
<div class="row">

<?php
foreach($data['kat_tmp'] as $kat_tmp){
  echo "<div class='col-md-2 col-sm-4 col-xs-6'>
            <a href='".BASE_PATH."/produk/kategori/$kat_tmp[slug]'>
              <div class='box-kategori-new'>
                <i class='fas fa-".$kat_tmp['ikon']." fa-2x'></i>
                <h4 class='judul-kategori'>".$kat_tmp['nama_kategori']."</h4>
              </div>
            </a>
        </div>";
}
?>   

</div><br>
<h3 class="judul-konten">Terhits di Template Web</h3>
<div class="row">

<?php
foreach($data['hitstmp'] as $hits_tmp){
   echo "<div class='col-md-2 col-sm-4 col-xs-6'>
          <div class='box-produk'>
            <a href='".BASE_PATH."/produk/detail/$hits_tmp[slug]'>
            <img alt='".$hits_tmp['nama_produk']."' src='".BASE_PATH."/public/images/source/".$hits_tmp['gambar']."'>
              <div class='desc'>
                <h4 class='judul-produk'>".format_judul($hits_tmp['nama_produk'], 5, 30)."</h4>
                <h4 class='harga-produk'>Rp ".format_rupiah($hits_tmp['harga'])."</h4>
                <h4 class='terjual-produk'><i  class='fas fa-star'></i> ".number_format($hits_tmp['rating'],1)." | <i class='glyphicon glyphicon-shopping-cart'></i> Terjual ".$hits_tmp['dibeli']."</h4>
              </div>
            </a>
          </div>
      </div>";
}
?>   

</div><br>
<a class="btn btn-primary-outline lihat-semua-mobile" href="<?= BASE_PATH ?>/produk/etalase/template-web-premium">Lihat Semua</a>

<hr>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12 box-kategori">
    <img alt="Banner GIF" src="<?= BASE_PATH ?>/public/images/banner/ppt.jpg">
  </div>
</div><br>

<h3 class="judul-konten">Mau Tampil Beda Saat Presentasi? <a class="lihat-semua" href="<?= BASE_PATH ?>/produk/etalase/template-presentasi">Lihat Semua</a></h3>
<div class="row">

<?php
foreach($data['kat_ppt'] as $kat_ppt){
   echo "<div class='col-md-2 col-sm-4 col-xs-6'>
            <a href='".BASE_PATH."/produk/kategori/$kat_ppt[slug]'>
              <div class='box-kategori-new'>
                <i class='fas fa-".$kat_ppt['ikon']." fa-2x'></i>
                <h4 class='judul-kategori'>".$kat_ppt['nama_kategori']."</h4>
              </div>
            </a>
        </div>";
}
?> 

</div><br>
<h3 class="judul-konten">Terhits di Template Presentasi</h3>
<div class="row">

<?php
foreach($data['hitsppt'] as $hits_ppt){
   echo "<div class='col-md-2 col-sm-4 col-xs-6'>
          <div class='box-produk'>
            <a href='".BASE_PATH."/produk/detail/$hits_ppt[slug]'>
            <img alt='".$hits_ppt['nama_produk']."' src='".BASE_PATH."/public/images/source/".$hits_ppt['gambar']."'>
              <div class='desc'>
                <h4 class='judul-produk'>".format_judul($hits_ppt['nama_produk'], 5, 30)."</h4>
                <h4 class='harga-produk'>Rp ".format_rupiah($hits_ppt['harga'])."</h4>
                <h4 class='terjual-produk'><i  class='fas fa-star'></i> ".number_format($hits_ppt['rating'],1)." | <i class='glyphicon glyphicon-shopping-cart'></i> Terjual ".$hits_ppt['dibeli']."</h4>
              </div>
            </a>
          </div>
      </div>";
}
?>   

</div><br>
<a class="btn btn-primary-outline lihat-semua-mobile" href="<?= BASE_PATH ?>/produk/etalase/template-presentasi">Lihat Semua</a>

<hr>
<h3 class="judul-konten">DailyApps Jasa <a class="lihat-semua" href="<?= BASE_PATH ?>/jasa">Lihat Jasa</a></h3>
<div class="row">
    
  <div class="col-md-3 col-sm-3 col-xs-6 box-kategori">
    <div><a href="<?= BASE_PATH ?>/mikrotik" ><img alt="Banner-01" src="<?= BASE_PATH ?>/public/images/jasa/1.jpg"></a></div><br>
  </div>
  <div class="col-md-3 col-sm-3 col-xs-6 box-kategori">
    <div><img alt="Banner-02" src="<?= BASE_PATH ?>/public/images/jasa/2.jpg"></div><br>
  </div>
  <div class="col-md-3 col-sm-3 col-xs-6 box-kategori">
    <div><img alt="Banner-02" src="<?= BASE_PATH ?>/public/images/jasa/3.jpg"></div><br>
  </div>
  <div class="col-md-3 col-sm-3 col-xs-6 box-kategori">
    <div><img alt="Banner-03" src="<?= BASE_PATH ?>/public/images/jasa/4.jpg"></div>
  </div>
  
</div>
<a class="btn btn-primary-outline lihat-semua-mobile" href="<?= BASE_PATH ?>/jasa">Lihat Jasa</a>


<hr>
<h3 class="judul-konten">DailyApps Dalam Angka dan Kata<a class="lihat-semua" href="<?= BASE_PATH ?>/ulasan">Lihat Ulasan</a></h3>
<div class="row">
  <div class="col-sm-6">
      <div class="well">
           <div class="row">
              <div class="col-md-6 col-xs-12 text-center">
                  <h1 class="rating-num"><?= number_format($rataulas['rataulasan'],1) ?><small class="kecil"> /5</small></h1>
                  <div class="rating">
                      <?= stars($rataulas['rataulasan']) ?>
                  </div>
                  <div>
                      (<?= $data['ulastotal_qty'] ?>) Total Ulasan
                  </div>
                  <br>
              </div>
              <div class="col-md-6 col-xs-12">
                  <div class="rating-desc">
                      <div class="row">
                         <div class="col-md-2 col-xs-2 text-right">
                             <span class="fas fa-star"></span> 5
                         </div>
                         <div class="col-md-8 col-xs-8">
                             <div class="progress">
                                 <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20"
                                     aria-valuemin="0" aria-valuemax="100" style="width: <?= number_format($rekapulas['lima']/$data['ulastotal_qty']*100,1) ?>%">
                                 </div>
                             </div>
                         </div>
                         <div class="col-md-2 col-xs-2 text-left">
                             <?= number_format($rekapulas['lima'],0) ?>
                         </div>
                      </div>
                      <!-- END 5 STAR-->
                      <div class="row">
                         <div class="col-md-2 col-xs-2 text-right">
                             <span class="fas fa-star"></span> 4
                         </div>
                         <div class="col-md-8 col-xs-8">
                             <div class="progress">
                                 <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20"
                                     aria-valuemin="0" aria-valuemax="100" style="width: <?= number_format($rekapulas['empat']/$data['ulastotal_qty']*100,1) ?>%">
                                 </div>
                             </div>
                         </div>
                         <div class="col-md-2 col-xs-2 text-left">
                             <?= number_format($rekapulas['empat'],0) ?>
                         </div>
                      </div>
                      <!-- END 4 STAR-->
                      <div class="row">
                         <div class="col-md-2 col-xs-2 text-right">
                             <span class="fas fa-star"></span> 3
                         </div>
                         <div class="col-md-8 col-xs-8">
                             <div class="progress">
                                 <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20"
                                     aria-valuemin="0" aria-valuemax="100" style="width: <?= number_format($rekapulas['tiga']/$data['ulastotal_qty']*100,1) ?>%">
                                 </div>
                             </div>
                         </div>
                         <div class="col-md-2 col-xs-2 text-left">
                             <?= number_format($rekapulas['tiga'],0) ?>
                         </div>
                      </div>
                      <!-- END 3 STAR-->
                      <div class="row">
                         <div class="col-md-2 col-xs-2 text-right">
                             <span class="fas fa-star"></span> 2
                         </div>
                         <div class="col-md-8 col-xs-8">
                             <div class="progress">
                                 <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20"
                                     aria-valuemin="0" aria-valuemax="100" style="width: <?= number_format($rekapulas['dua']/$data['ulastotal_qty']*100,1) ?>%">
                                 </div>
                             </div>
                         </div>
                         <div class="col-md-2 col-xs-2 text-left">
                             <?= number_format($rekapulas['dua'],0) ?>
                         </div>
                      </div>
                      <!-- END 2 STAR-->
                      <div class="row">
                         <div class="col-md-2 col-xs-2 text-right">
                             <span class="fas fa-star"></span> 1
                         </div>
                         <div class="col-md-8 col-xs-8">
                             <div class="progress">
                                 <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20"
                                     aria-valuemin="0" aria-valuemax="100" style="width: <?= number_format($rekapulas['satu']/$data['ulastotal_qty']*100,1) ?>%">
                                 </div>
                             </div>
                         </div>
                         <div class="col-md-2 col-xs-2 text-left">
                             <?= number_format($rekapulas['satu'],0) ?>
                         </div>
                      </div>
                      <!-- END 1 STAR-->
                  </div>
                  <!-- END ROW -->
              </div>
           </div>
           </div>
         </div>

      <div class="col-sm-6">
          <div id="carousel-example-generic-review" class="carousel slide" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
              <?php
               $count = 0;
               foreach($data['ulastotal'] as $ulasan){
              ?>
               <div class="item <?php 
                            if($count==0){echo "active";}else{echo " ";}?>" data-interval="2000"><hr>
                 <?php echo "<div class='reviews'>
                    <div class='row blockquote review-item'>
                      <div class='col-md-3 text-center'>
                      <table style='margin-left:auto; margin-right:auto'><tr><td><div class='profile-pic'>".getProfilePicture($ulasan['cust'])."</div></td></tr></table>                  
                          <small>".$ulasan['cust']." <br><span class='review-source'>".tgl_indonesia($ulasan['tgl'])."</span></small>

                      </div>
                      <div class='col-md-6'>
                         <div class='rating'>".stars($ulasan['rate'])."</div>
                           <p class='review-text'>".$ulasan['isi_ulasan']." </p>
                         <div class='caption'>
                           <small class='review-source'>Sumber: ".$ulasan['sumber']."</small>
                         </div>
                      </div>
                      <div class='col-md-3 text-center'><a href='".BASE_PATH."/produk/detail/".$ulasan['slug']."'>
                         <div class='box-produk-ulas'><img alt='".$ulasan['nama_produk']."' class='img-rounded' src='".BASE_PATH."/public/images/source/".$ulasan['gambar']."'></div>
                        <div class='desc-produk-ulas'><h4 class='judul-produk-ulas'>".$ulasan['nama_produk']." </h4></div>
                        </a>
                      </div>                          
                    </div>  
                  </div></div>"; ?>
               <?php $count++;} ?>
            </div>
          </div>
      </div>
</div><br>
<a class="btn btn-primary-outline lihat-semua-mobile" href="<?= BASE_PATH ?>/ulasan">Lihat Ulasan</a>

<hr>
<div class="row">
  <div class="col-md-3 col-xs-6 text-center home-stat">
      <i class="fas fa-shipping-fast fa-3x"></i>
      <h1 class="stat-num"><?= number_format($data['transqty'],0) ?></h1>
      <div class="stat-cap">
          Transaksi Sukses
      </div>
  </div>
  <div class="col-md-3 col-xs-6 text-center home-stat">
      <i class="fas fa-people-carry fa-3x"></i>
      <h1 class="stat-num"><?= number_format($prodbeli['jmlbeli'],0) ?></h1>
      <div class="stat-cap">
          Produk Terjual
      </div>
  </div>
  <div class="col-md-3 col-xs-6 text-center home-stat">
      <i class="fas fa-parachute-box fa-3x"></i>
      <h1 class="stat-num"><?= number_format($data['prodqty'],0) ?></h1>
      <div class="stat-cap">
          Total Produk
      </div>
  </div>
  <div class="col-md-3 col-xs-6 text-center home-stat">
      <i class="fas fa-archive fa-3x"></i>
      <h1 class="stat-num"><?= number_format($data['katqty'],0) ?></h1>
      <div class="stat-cap">
          Jenis Kategori
      </div>
  </div>
</div>

<hr>
<h3 class="judul-konten">Buletin Mingguan Threepoints  <a class="lihat-semua" href="<?= BASE_PATH ?>/threepoints">Lihat Semua</a></h3>
<div class="row">

<?php
foreach($data['threepoints'] as $tp){
   echo "<div class='col-md-3 col-sm-4 col-xs-12'>
          <div class='box-produk'>
            <a href='".BASE_PATH."/threepoints/tpdetail/$tp[slug]'>
            <img alt='".$tp['judul']."' src='".BASE_PATH."/public/images/source/".$tp['gambar_threepoints']."'>
              <div class='desc-threepoints'>
                <span class='label label-primary'>Threepoints</span>
                <h4 class='judul-threepoints'>".$tp['judul']."</h4>
                <hr class='hr-threepoints'>
                <h4 class='prod-threepoints'>
                    <i class='far fa-clock'></i> ".tgl_indonesia($tp['produksi'])."&nbsp; / &nbsp;
                	<i class='far fa-eye'></i> ".$tp['hits']."
                </h4>
              </div>

            </a>
          </div>
      </div>";
}
?>   

</div><br>
<a class="btn btn-primary-outline lihat-semua-mobile" href="<?= BASE_PATH ?>/threepoints">Lihat Semua</a>

<hr>
<h3 class="judul-konten">Blog & Tutorial<a class="lihat-semua" href="<?= BASE_PATH ?>/blog">Lihat Semua</a></h3>
<div class="row">

<?php
	foreach($data['blogd'] as $blogdi){
	   echo "
	   <div class='col-md-4 col-sm-4 col-xs-12'>
	          <div class='box-produk'>
	            <a href='".BASE_PATH."/blog/blogdetail/$blogdi[slug]'>
	            <img alt='".$blogdi['judul']."' src='".BASE_PATH."/public/images/source/".$blogdi['gambar']."'>
	              <div class='desc-blog'>
	                <span class='label label-primary'>".$blogdi['kategori']."</span>
	                <h4 class='judul-blog'>".$blogdi['judul']."</h4>
	                <h5 class='isi-blog'>".format_judul($blogdi['caption'], 100,300)."</h5>
	                <hr class='hr-blog'>
	                <h4 class='prod-blog'>
	                	<i class='far fa-clock'></i> ".tgl_indonesia($blogdi['produksi'])." &nbsp; / &nbsp;
	                	<i class='far fa-user'></i> Dino Arla &nbsp; / &nbsp;
	                	<i class='far fa-eye'></i> ".$blogdi['hits']."
	                </h4>
	              </div>

	            </a>
	          </div>
	      </div>";
}
?>

</div><br>
<a class="btn btn-primary-outline lihat-semua-mobile" href="<?= BASE_PATH ?>/blog">Lihat Semua</a>

<hr>
<h3 class="judul-konten">DailyApps Youtube Channel <a target="_blank" style="background-color: #ff000a;" class="lihat-semua" href="https://www.youtube.com/channel/UCfhJznggbCN5Kc_y6ioW6KQ?sub_confirmation=1">Subscribe</a>&nbsp; </h3>
<div class="row">
    
  <div class="col-md-4 col-sm-4 col-xs-12">
    <div class="videoWrapper">
        <iframe id="youtube_video" style="border:none;" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div><br>
  </div>
  <div class="col-md-4 col-sm-4 col-xs-12">
    <div class="videoWrapper">
        <iframe id="youtube_video2" style="border:none;" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div><br>
  </div>
  <div class="col-md-4 col-sm-4 col-xs-12">
    <div class="videoWrapper">
        <iframe id="youtube_video3" style="border:none;" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
  </div>

</div><br>
<a target="_blank" style="background-color: #ff000a; color: #fff; border-color: #ff000a;" class="btn lihat-semua-mobile" href="https://www.youtube.com/channel/UCfhJznggbCN5Kc_y6ioW6KQ?sub_confirmation=1">Subscribe</a>





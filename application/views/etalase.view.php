<?php
   $eta = $data['eta'][0];
?>

<ol class="breadcrumb">
	<li><a href="<?= BASE_PATH ?>">Beranda</a></li>
	<li class="active">Etalase <?= $eta['nama_etalase'] ?></li>
</ol>


<h3 class="judul-konten">Etalase <?= $eta['nama_etalase'] ?></h3>
<div class="row">

        <div id="carousel-example-generic-kategori" class="carousel slide" data-ride="carousel" data-type="multi">
            <div class="carousel-inner">
            <?php
            $count = 0;
            foreach($data['kat'] as $kat_app){
            ?>
                <div class="item <?php 
                      if($count==0){echo "active";}else{echo "";}?>" data-interval="2500">
                      <?php   echo "<div class='col-md-2 col-sm-4 col-xs-6'>
                                    <a href='".BASE_PATH."/produk/kategori/$kat_app[slug]'>
                                      <div class='box-kategori'>
                                        <img alt='".$kat_app['nama_kategori']."' src='".BASE_PATH."/public/images/source/".$kat_app['gambar_kategori']."'>
                                      </div>
                                      <div class='desc-kategori'>
                                        <h4 class='judul-kategori'>".format_judul($kat_app['nama_kategori'],3,15)."</h4>
                                      </div>
                                  </a>
                            </div>"; ?>
                  </div>
                      <?php $count++;} ?>
            </div>              
            
            <!-- Controls -->
            <div class="col-sm-12" style="text-align: center;">
              <a class="left glyphicon glyphicon-chevron-left btn btn-default testimonial_btn" href="#carousel-example-generic-kategori"
                data-slide="prev"></a>

              <a class="right glyphicon glyphicon-chevron-right btn btn-default testimonial_btn" href="#carousel-example-generic-kategori"
                data-slide="next"></a>
            </div>
        </div>
</div>

<hr>
<h3 class="judul-konten">Terlaris di Etalase <?= $eta['nama_etalase'] ?></h3>
<div class="row" id="produk">
<?php
foreach($data['prod'] as $produk_laris){
   echo "<div class='col-md-2 col-sm-4 col-xs-6'>
          <div class='box-produk'>
            <a href='".BASE_PATH."/produk/detail/".$produk_laris['slug']."'>
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

<div class="loading"><img alt="Load More" src="<?= BASE_PATH ?>/public/images/loading_more.gif"></div>
<button class="btn btn-ld btn-load text-center" data-posisi="12" data-etalase="<?= $eta['id_etalase'] ?>">Lihat Lebih Banyak</button>
<button class="btn btn-ldm btn-load text-center" data-posisi="12" data-etalase="<?= $eta['id_etalase'] ?>">Lihat Lebih Banyak</button>

<script>
   var posisi;
   var etalase;
   $(function(){
      $('.loading').hide();
      $('.btn-load').click(function(){
         $('.loading').show();
         posisi = parseInt($(this).attr('data-posisi'));
         etalase = parseInt($(this).attr('data-etalase'));
         $.ajax({
           url : "<?= BASE_PATH ?>/produk/load/"+posisi+"/"+etalase,
           type : "GET",
           success : function(data){
             $('#produk').append(data);
             $('.btn-load').attr({"data-posisi":posisi+12});
             $('.loading').hide();
           }
         });
      });
   });
</script>
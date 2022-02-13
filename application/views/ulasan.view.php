<?php
$rataulas = $data['ulastotal_avg'][0];
$rekapulas = $data['ulastotal_rekap'][0];
$prodbeli = $data['proddibeli'][0];
?>

<div class="col-md-9">
   
   <h3 class="judul-konten">Statistik dan Ulasan</h3><hr>
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

        <div class="row" id="ulasan">
         <?php
         foreach($data['ulastotal'] as $ulasan){
            echo "
            <div class='col-md-12'>
            <hr>
            <div class='reviews'>
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
            </div>
            </div>";
         }
         ?> 

         </div>

         <div class="loading"><img alt="Load More" src="<?= BASE_PATH ?>/public/images/loading_more.gif"></div>
          <button class="btn btn-ld btn-load text-center" data-posisi="5">Lihat Lebih Banyak</button>
          <button class="btn btn-ldm btn-load text-center" data-posisi="5">Lihat Lebih Banyak</button>

</div>

<div class="col-md-3">
   <a href="https://panel.niagahoster.co.id/ref/36975" target="_blank"><img src="https://niagaspace.sgp1.cdn.digitaloceanspaces.com/assets/images/affiliasi/banner/ads-persona-offline-to-online-business-cloud-hosting-affiliate-300-x-600.png" alt="Cloud Hosting Indonesia" style="border:0; max-width:100%; height:auto;" /></a>
</div>

<script>
   var posisi;
   $(function(){
      $('.loading').hide();
      $('.btn-load').click(function(){
         $('.loading').show();
         posisi = parseInt($(this).attr('data-posisi'));
         $.ajax({
           url : "<?= BASE_PATH ?>/ulasan/load_ulasan/"+posisi,
           type : "GET",
           success : function(data){
             $('#ulasan').append(data);
             $('.btn-load').attr({"data-posisi":posisi+5});
             $('.loading').hide();
           }
         });
      });
   });
</script>
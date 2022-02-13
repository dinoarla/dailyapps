<?php
$produk = $data['prod'][0];
$kategori = $data['kat'][0];
$etalase = $data['eta'][0];
$rataulas = $data['ulas_avg'][0];
$rekapulas = $data['ulas_rekap'][0];
?>

<ol class="breadcrumb">
  <li><a href="<?= BASE_PATH ?>">Beranda</a></li>
  <li><a href="<?= BASE_PATH ."/produk/etalase/".$etalase['slug'] ?>">Etalase <?= $etalase['nama_etalase'] ?></a></li>
  <li><a href="<?= BASE_PATH ."/produk/kategori/".$kategori['slug'] ?>"><?= $kategori['nama_kategori'] ?></a></li>
  <li class="active"><?= $produk['nama_produk'] ?></li>
</ol>
   
<div class="row" id="produk">
   <div class="col-md-4">
      <div class="preview">       
         <div class="preview-pic tab-content">
           <div class="tab-pane active" id="pic-1"><img alt="Preview Pic-01" class="img-rounded" src="<?= BASE_PATH ?>/public/images/source/<?= $produk['gambar'] ?>"></div>
           <div class="tab-pane" id="pic-2"><img alt="Preview Pic-02" class="img-rounded" src="<?= BASE_PATH ?>/public/images/source/<?= $produk['gambard'] ?>" /></div>
           <div class="tab-pane" id="pic-3"><img alt="Preview Pic-03" class="img-rounded" src="<?= BASE_PATH ?>/public/images/source/<?= $produk['gambart'] ?>" /></div>
           <div class="tab-pane" id="pic-4"><img alt="Preview Pic-04" class="img-rounded" src="<?= BASE_PATH ?>/public/images/source/<?= $produk['gambare'] ?>" /></div>
           <div class="tab-pane" id="pic-5"><img alt="Preview Pic-05" class="img-rounded" src="<?= BASE_PATH ?>/public/images/source/<?= $produk['gambarl'] ?>" /></div>
         </div>
         <ul class="preview-thumbnail nav nav-tabs">
           <li class="active"><a data-target="#pic-1" data-toggle="tab"><img alt="Preview Thumb-01" class="img-rounded" src="<?= BASE_PATH ?>/public/images/source/<?= $produk['gambar'] ?>"></a></li>
           <li><a data-target="#pic-2" data-toggle="tab"><img alt="Preview Thumb-02" class="img-rounded" src="<?= BASE_PATH ?>/public/images/source/<?= $produk['gambard'] ?>" /></a></li>
           <li><a data-target="#pic-3" data-toggle="tab"><img alt="Preview Thumb-03" class="img-rounded" src="<?= BASE_PATH ?>/public/images/source/<?= $produk['gambart'] ?>" /></a></li>
           <li><a data-target="#pic-4" data-toggle="tab"><img alt="Preview Thumb-04" class="img-rounded" src="<?= BASE_PATH ?>/public/images/source/<?= $produk['gambare'] ?>" /></a></li>
           <li><a data-target="#pic-5" data-toggle="tab"><img alt="Preview Thumb-05" class="img-rounded" src="<?= BASE_PATH ?>/public/images/source/<?= $produk['gambarl'] ?>" /></a></li>
         </ul> 
      </div>
   </div>

   <div class="col-md-8">
      <div class="row">
        <div class="col-md-12">
         <h3 class="nama-produk"> <?= $produk['nama_produk'] ?></h3>
       </div>
      </div><!-- end row-->
   

      <div class="row">
       <div class="col-md-12">
        <span><i  class='fas fa-star'></i> <?= number_format($rataulas['rataulasan'],1) ?> | <i class='glyphicon glyphicon-shopping-cart'></i> Terjual <?= $produk['dibeli'] ?></span>
       </div>
      </div><!-- end row -->
      
      <div class="row">
       <div class="col-md-12">
        <h2 class="harga-produk-detail"><b>Rp <?= format_rupiah($produk['harga']) ?></b></h2>
       </div>
      </div><!-- end row -->

      <div class="row">
       <div class="col-md-12">
         <form class="tambah-krj" method="post" action="<?= BASE_PATH ?>/keranjang/tambah/<?= $produk['id_produk'] ?>">
            <div class="col-xs-3">
               <input type="number" name="jumlah" value="1" min="1" class="form-control">
            </div>
            <div class="col-xs-9">
               <?php
   				if($produk['stok']>0){
   			?>
   				<button type="submit" class="btn btn-primary">
   					<i class="glyphicon glyphicon-shopping-cart"></i> Masukkan Keranjang
   				</button>
   			<?php
   				}else{
   			?>
   				<a class="btn btn-danger disabled">
   					Stok Habis
   				</a>
   			<?php
   				}
   			?>
            </div>
         </form>
         </div>
      </div>

      <div class="row">
       <div class="col-md-3">
         <h5 class="beli-mp">Beli lewat marketplace: </h5>
       </div>
       <div class="col-md-9">
         <a target="_blank" href="<?= $produk['link_tp'] ?>"><img alt="Tokopedia" class="img-mp" src="<?= BASE_PATH ?>/public/images/tokped.png"></a>&nbsp;
         <a target="_blank" href="<?= $produk['link_bl'] ?>"><img alt="Bukalapak" class="img-mp" src="<?= BASE_PATH ?>/public/images/bl.png"></a>&nbsp;
         <a target="_blank" href="<?= $produk['link_sh'] ?>"><img alt="Shopee" class="img-mp" src="<?= BASE_PATH ?>/public/images/shopee.png"></a>
       </div>
      </div><!-- end row -->


      <!-- Nav tabs -->
      <ul class="nav nav-tabs nav-produk" role="tablist">
          <li role="presentation" class="active">
            <a href="#deskripsi" aria-controls="deskripsi" role="tab" data-toggle="tab">Deskripsi</a>
          </li>
          <li role="presentation">
            <a href="#demo" aria-controls="demo" role="tab" data-toggle="tab">Demo</a>
          </li>
          <li role="presentation">
            <a href="#reviews" aria-controls="reviews" role="tab" data-toggle="tab">Ulasan</a>
          </li>
      </ul>

      <!-- Tab panes -->
      <div class="tab-content">
       <div role="tabpanel" class="tab-pane active" id="deskripsi">
         <p class="top-10">
            <div class="well">
               <p>SKU: <b><?= $produk['kd_sku'] ?></b></p>
               <p>Kategori: <b><a href="<?= BASE_PATH ."/produk/kategori/".$kategori['slug'] ?>"><?= $kategori['nama_kategori'] ?></a></b></p>
               <p>Etalase: <b><a href="<?= BASE_PATH ."/produk/etalase/".$etalase['slug'] ?>"><?= $etalase['nama_etalase'] ?></a></b></p>
            </div>
         </p>
         <p class="top-10">
            <?= $produk['deskripsi'] ?>
         </p>
       </div>
       <div role="tabpanel" class="tab-pane top-10" id="demo">
         <p class="top-10">
            <div class="videoWrapper">
               <iframe src="https://www.youtube.com/embed/<?= $produk['link_demo'] ?>" title="YouTube video player" style="border:none" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
         </p>
       </div>
       <div role="tabpanel" class="tab-pane" id="reviews">
         <p class="top-10">
                   <div class="well">
                       <div class="row">
                           <div class="col-md-6 col-xs-12 text-center">
                               <h1 class="rating-num"><?= number_format($rataulas['rataulasan'],1) ?><small class="kecil"> /5</small></h1>
                               <div class="rating">
                                   <?= stars($rataulas['rataulasan']) ?>
                               </div>
                               <div>
                                   (<?= $data['ulas_qty'] ?>) Total Ulasan
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
                                                  aria-valuemin="0" aria-valuemax="100" style="width: <?= number_format($rekapulas['lima']/$data['ulas_qty']*100,1) ?>%">
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
                                                  aria-valuemin="0" aria-valuemax="100" style="width: <?= number_format($rekapulas['empat']/$data['ulas_qty']*100,1) ?>%">
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
                                                  aria-valuemin="0" aria-valuemax="100" style="width: <?= number_format($rekapulas['tiga']/$data['ulas_qty']*100,1) ?>%">
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
                                                  aria-valuemin="0" aria-valuemax="100" style="width: <?= number_format($rekapulas['dua']/$data['ulas_qty']*100,1) ?>%">
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
                                                  aria-valuemin="0" aria-valuemax="100" style="width: <?= number_format($rekapulas['satu']/$data['ulas_qty']*100,1) ?>%">
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

                   <?php
                     foreach($data['ulas'] as $ulasan){
                        echo "<hr>
                        <div class='reviews'>
                          <div class='row blockquote review-item'>
                            <div class='col-md-3 text-center'>
                              <table style='margin-left:auto; margin-right:auto'><tr><td><div class='profile-pic'>".getProfilePicture($ulasan['cust'])."</div></td></tr></table>
                                <small>".$ulasan['cust']." <br><span class='review-source'>".tgl_indonesia($ulasan['tgl'])."</span></small>

                            </div>
                            <div class='col-md-9'>
                               <div class='rating'>".stars($ulasan['rate'])."</div>
                              <p class='review-text'>".$ulasan['isi_ulasan']." </p>

                              <small class='review-source'>Sumber: ".$ulasan['sumber']."</small>
                            </div>                          
                          </div>  
                        </div>";
                     }
                     ?>  
         </p>
       </div>
      </div>

   </div>
</div>

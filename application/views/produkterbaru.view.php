<ol class="breadcrumb">
  <li><a href="<?= BASE_PATH ?>">Beranda</a></li>
  <li class="active">Produk Terbaru</li>
</ol>

<h3 class="judul-konten">Produk Terbaru</h3>
<div class="row" id="produk">
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
</div>
<ol class="breadcrumb">
  <li><a href="<?= BASE_PATH ?>">Beranda</a></li>
  <li class="active">Produk Terlaris</li>
</ol>

<h3 class="judul-konten">Produk Terlaris</h3>
<div class="row" id="produk">
<?php
foreach($data['produk_laris'] as $produk_laris){
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
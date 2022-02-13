<?php
  $kata = htmlentities(htmlspecialchars($_REQUEST['kata']), ENT_QUOTES);
?>

<h3 class="judul-konten">Hasil Pencarian dari <b style="color: blue"><?php echo "$kata"; ?></b></h3>
<div class="row" id="produk">
<?php
foreach($data['produk'] as $produk){
   echo "<div class='col-md-2 col-sm-4 col-xs-6'>
          <div class='box-produk'>
            <a href='".BASE_PATH."/produk/detail/$produk[slug]'>
            <img alt='".$produk['nama_produk']."'  src='".BASE_PATH."/public/images/source/".$produk['gambar']."'>
              <div class='desc'>
                <h4 class='judul-produk'>".format_judul($produk['nama_produk'], 5, 30)."</h4>
                <h4 class='harga-produk'>Rp ".format_rupiah($produk['harga'])."</h4>
                <h4 class='terjual-produk'><i class='fas fa-star'></i> ".number_format($produk['rating'],1)." | <i class='glyphicon glyphicon-shopping-cart'></i> Terjual ".$produk['dibeli']."</h4>
              </div>
            </a>
          </div>
      </div>";
}
?>   
</div>

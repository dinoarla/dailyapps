<?php
   $kat = $data['kat'][0];
   $etalase = $data['eta'][0];
?>

<ol class="breadcrumb">
  <li><a href="<?= BASE_PATH ?>">Beranda</a></li>
  <li><a href="<?= BASE_PATH ."/produk/etalase/".$etalase['slug'] ?>">Etalase <?= $etalase['nama_etalase'] ?></a></li>
  <li class="active"><?= $kat['nama_kategori'] ?></li>
</ol>

<h3 class="judul-konten">Produk <?= $kat['nama_kategori'] ?></h3>
<div class="row" id="produk">
<?php
foreach($data['prod'] as $produk){
   echo "<div class='col-md-2 col-sm-4 col-xs-6'>
          <div class='box-produk'>
            <a href='".BASE_PATH."/produk/detail/$produk[slug]'>
            <img alt='".$produk['nama_produk']."' src='".BASE_PATH."/public/images/source/".$produk['gambar']."'>
              <div class='desc'>
                <h4 class='judul-produk'>".format_judul($produk['nama_produk'], 5, 30)."</h4>
                <h4 class='harga-produk'>Rp ".format_rupiah($produk['harga'])."</h4>
                <h4 class='terjual-produk'><i style='color: #ffc400;' class='fas fa-star'></i> ".number_format($produk['rating'],1)." | <i class='glyphicon glyphicon-shopping-cart'></i> Terjual ".$produk['dibeli']."</h4>
              </div>
            </a>
          </div>
      </div>";
}
?>   
</div>

<div class="loading"><img alt="Load More" src="<?= BASE_PATH ?>/public/images/loading_more.gif"></div>
<button class="btn btn-ld btn-load text-center" data-posisi="12" data-kategori="<?= $kat['id_kategori'] ?>">Lihat Lebih Banyak</button>
<button class="btn btn-ldm btn-load text-center" data-posisi="12" data-kategori="<?= $kat['id_kategori'] ?>">Lihat Lebih Banyak</button>

<script>
   var posisi;
   var kategori;
   $(function(){
      $('.loading').hide();
      $('.btn-load').click(function(){
         $('.loading').show();
         posisi = parseInt($(this).attr('data-posisi'));
         kategori = parseInt($(this).attr('data-kategori'));
         $.ajax({
           url : "<?= BASE_PATH ?>/produk/load_kat/"+posisi+"/"+kategori,
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

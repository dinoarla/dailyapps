<?php
$blog_dt = $data['blogd'][0];
?>

<ol class="breadcrumb">
  <li><a href="<?= BASE_PATH ?>">Beranda</a></li>
  <li><a href="<?= BASE_PATH."/blog" ?>">Blog & Tutorial</a></li>
  <li class="active"><?= $blog_dt['judul'] ?></li>
</ol>

<div class="row">
	<div class="col-md-9">
		<div class="head-single">
			<span class='label label-primary'><?= $blog_dt['kategori'] ?></span>
			<h4 class='judul-single'><?= $blog_dt['judul'] ?></h4>
			<h4 class='prod'>
            	<i class='far fa-clock'></i>&nbsp;<?= tgl_indonesia($blog_dt['produksi']) ?> &nbsp; / &nbsp;
            	<i class='far fa-user'></i>&nbsp; Dino Arla &nbsp; / &nbsp;
            	<i class='far fa-eye'></i>&nbsp;<?= $blog_dt['hits'] ?>
            </h4><br>
            <?php echo "<img alt='".$blog_dt['judul']."' src='".BASE_PATH."/public/images/source/".$blog_dt['gambar']."'>" ?>
		</div><br><br>

		<div class="isi"><?= $blog_dt['isi'] ?></div>
		
	</div>

	<div class="col-md-3">
		
		<h3 class="judul-konten">Video Terbaru</h3>
		<div class="videoWrapper">
	        <iframe id="youtube_video" style="border:none;" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	    </div><br>
	    <div class="videoWrapper">
	        <iframe id="youtube_video2" style="border:none;" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	    </div><br>
	    <div class="videoWrapper">
	        <iframe id="youtube_video3" style="border:none;" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	    </div><hr>

	    <a href="https://dailyapps.id" target="_blank"><img src="../../public/images/source/BANNER/banner_blog_side.jpg" alt="Banner Sidebar Dailyapps" style="border:0; max-width:100%; height:auto; display: block; margin-left: auto; margin-right: auto;"/></a><hr>

	    <h3 class="judul-konten">Konten Terpopuler</h3>
	    <?php
               foreach($data['blogt'] as $blogti)
               {
               	echo "<div class='row'>
               	<div class='col-md-4 col-sm-4 col-xs-4'>
               		<a href='".BASE_PATH."/blog/blogdetail/$blogti[slug]'>
                    	<div class='box-produk-review-ulas'><img alt='".$blogti['judul']."' class='img-rounded' src='".BASE_PATH."/public/images/thumbs/".$blogti['gambar']."'></div>
                    </a></div>
                    <div class='col-md-8 col-sm-8 col-xs-8'>
                    <p><b>".format_judul($blogti['judul'], 5, 40)."</b> </p>
                    <span class='prod_blog_widget'><i class='far fa-clock'></i> ".tgl_indonesia($blogti['produksi'])."</span>
                    </div>
                    </div><br>";
               }
        ?>
	    <hr>

	    <h3 class="judul-konten">Ulasan Terbaru</h3>
	    <?php
               foreach($data['ulastotal'] as $ulasan)
               {
               	echo "<div class='row'>
               	<div class='col-md-4 col-sm-4 col-xs-4'>
               		<a href='".BASE_PATH."/produk/detail/".$ulasan['slug']."'>
                    	<div class='box-produk-review-ulas'><img alt='".$ulasan['nama_produk']."' class='img-rounded' src='".BASE_PATH."/public/images/thumbs/".$ulasan['gambar']."'></div>
                    </a></div>
                    <div class='col-md-8 col-sm-8 col-xs-8'>
                    <div class='rating'>".stars($ulasan['rate'])."</div>
                    <p>".format_judul($ulasan['isi_ulasan'], 5, 40)." </p>
                    </div>
                    </div><br>";
               }
        ?>
	    <hr>
	    
	    <h3 class="judul-konten" >Sosial Media</h3>
	    <a class="btn sosmed_widget sosmed_fb" href="https://www.facebook.com/store.dailyapps">Like Kami di Facebook</a>
	    <a class="btn sosmed_widget sosmed_yt" href="https://www.youtube.com/channel/UCfhJznggbCN5Kc_y6ioW6KQ?sub_confirmation=1">Subscribe Kami di Youtube</a>
	    <hr>

	    <img alt='Iklan Widget Akhir' src='<?= BASE_PATH ?>/public/images/source/ETALASE/00-ADDPHOTO/ADDPHOTO-MP-V3.jpg'>

	</div>

</div>
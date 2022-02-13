<style type="text/css">
 .jumbotron {
    background-color: #141a34;
    color: #fff;
    padding: 75px 25px;
  }
  
</style>

<div class="jumbotron text-center">
  <h1>DailyApps Blog & Tutorial</h1> <br>
  <p>Akses Blog & Tutorial Seputar Pemrograman dan Bisnis Digital Berbahasa Indonesia Secara Gratis. </p> 
</div>

<div class="row">

	<div class='col-md-9'>
	<h3 class="judul-konten">Headline</h3>
		<div class="row">
		<?php
		foreach($data['blogd'] as $blogdi){
		   echo "
		   <div class='col-md-6 col-sm-4 col-xs-12'>
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
		</div>
		
		<img class="banner_blogst" alt='Iklan Banner Satu' src='<?= BASE_PATH ?>/public/images/source/BANNER/banner_blog.jpg'>


	<h3 class="judul-konten">Bisnis Digital (<?= number_format($data['blogbdqty'],0) ?>)</h3>
		<div class="row">
		<?php
		foreach($data['blogbd'] as $blogbdi){
		   echo "
		   <div class='col-md-4 col-sm-4 col-xs-12'>
		          <div class='box-produk'>
		            <a href='".BASE_PATH."/blog/blogdetail/$blogbdi[slug]'>
		            <img alt='".$blogbdi['judul']."' src='".BASE_PATH."/public/images/source/".$blogbdi['gambar']."'>
		              <div class='desc-blog'>
		                <span class='label label-primary'>".$blogbdi['kategori']."</span> 
		                <h4 class='judul-blog-kat'>".$blogbdi['judul']."</h4>
		                <hr class='hr-blog'>
		                <h4 class='prod-blog'>
		                	<i class='far fa-clock'></i> ".tgl_indonesia($blogbdi['produksi'])."
		                </h4>
		              </div>

		            </a>
		          </div>
		      </div>";

		}
		?>
		</div><hr>

	<h3 class="judul-konten">Digital Marketing (<?= number_format($data['blogdmqty'],0) ?>)</h3>
		<div class="row">
		<?php
		foreach($data['blogdm'] as $blogdmi){
		   echo "
		   <div class='col-md-4 col-sm-4 col-xs-12'>
		          <div class='box-produk'>
		            <a href='".BASE_PATH."/blog/blogdetail/$blogdmi[slug]'>
		            <img alt='".$blogdmi['judul']."' src='".BASE_PATH."/public/images/source/".$blogdmi['gambar']."'>
		              <div class='desc-blog'>
		                <span class='label label-primary'>".$blogdmi['kategori']."</span> 
		                <h4 class='judul-blog-kat'>".$blogdmi['judul']."</h4>
		                <hr class='hr-blog'>
		                <h4 class='prod-blog'>
		                	<i class='far fa-clock'></i> ".tgl_indonesia($blogdmi['produksi'])."
		                </h4>
		              </div>

		            </a>
		          </div>
		      </div>";

		}
		?>
		</div><hr>

	<h3 class="judul-konten">Tutorial (<?= number_format($data['blogtuqty'],0) ?>)</h3>
		<div class="row">
		<?php
		foreach($data['blogtu'] as $blogtui){
		   echo "
		   <div class='col-md-4 col-sm-4 col-xs-12'>
		          <div class='box-produk'>
		            <a href='".BASE_PATH."/blog/blogdetail/$blogtui[slug]'>
		            <img alt='".$blogtui['judul']."' src='".BASE_PATH."/public/images/source/".$blogtui['gambar']."'>
		              <div class='desc-blog'>
		                <span class='label label-primary'>".$blogtui['kategori']."</span> 
		                <h4 class='judul-blog-kat'>".$blogtui['judul']."</h4>
		                <hr class='hr-blog'>
		                <h4 class='prod-blog'>
		                	<i class='far fa-clock'></i> ".tgl_indonesia($blogtui['produksi'])."
		                </h4>
		              </div>

		            </a>
		          </div>
		      </div>";

		}
		?>
		</div>

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
	    
	    <h3 class="judul-konten">Sosial Media</h3>
	    <a class="btn sosmed_widget sosmed_fb" href="https://www.facebook.com/store.dailyapps">Like Kami di Facebook</a>
	    <a class="btn sosmed_widget sosmed_yt" href="https://www.youtube.com/channel/UCfhJznggbCN5Kc_y6ioW6KQ?sub_confirmation=1">Subscribe Kami di Youtube</a>
	    <hr>

	    <img alt='Iklan Widget Akhir' src='<?= BASE_PATH ?>/public/images/source/ETALASE/00-ADDPHOTO/ADDPHOTO-MP-V3.jpg'>

	</div>

</div>
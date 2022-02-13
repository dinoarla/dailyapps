<style type="text/css">
 .about-title {
    font-size: 24px;
    text-transform: uppercase;
    color: #303030;
    font-weight: 600;
    margin-bottom: 20px;
  }
  .about-sub {
    font-size: 19px;
    line-height: 1.375em;
    color: #303030;
    font-weight: 400;
    margin-bottom: 40px;
  } 

 .jumbotron {
    background-color: #141a34;
    color: #fff;
    padding: 75px 25px;
  }
  .container-fluid {
    padding: 60px 50px;
  }
  .bg-grey {
    background-color: #f6f6f6;
  }

  .logo-small {
    color: #141a34;
    font-size: 50px;
    margin-bottom: 20px;
  }
  .logo {
    color: #141a34;
    font-size: 200px;
  }
  .thumbnail {
    padding: 0 0 15px 0;
    border: none;
    border-radius: 0;
  }
  .thumbnail img {
    width: 100%;
    height: 100%;
    margin-bottom: 10px;
  }
</style>

<div class="jumbotron text-center">
  <h1>Tentang DailyApps</h1> <br>
  <p>The No. 1 Premium Template Store in Indonesia with World Class Design and Affordable Prices.</p> 
</div>

<!-- Container (About Section) -->
<div id="about" class="container-fluid">
  <div class="row">
    <div class="col-sm-8">
      <h2 class="about-title">Dear developer and designer</h2><br>
      <p>The letter "D" in our store name are stands for you. <br>We really know that so much free-code and free-design across the universe. <br>But we also really know that it was not necessary for the guys like you. <br>Thanks for coming to our store with a struggle. <br>You buy a product from our store it means that you are support more people on the same genre like you in our community called "BeeTech Valley".</p><br>
      <h4>"Everything here were built on the hands and home of people just like you and us." <br><br><i>Enjoy the dish! Welcome home, your daily home.</i></h4>
    </div>
    <div class="col-sm-4">
      <img src="<?= BASE_PATH ?>/public/images/brand_about.jpg"></span>
    </div>
  </div>
</div>

<div class="container-fluid bg-grey">
  <div class="row">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-globe logo slideanim"></span>
    </div>
    <div class="col-sm-8">
      <h2 class="about-title">A future store in front of you</h2><br>
      <h4 class="about-sub"><strong>MISSION:</strong> To Be The No. 1 Premium Template Store in Indonesia With World Class Design and Affordable Prices</h4><br>
      <h4 class="about-sub"><strong>VISSION:</strong> We provides premium digital assets, ready-use software and high quality templates for your needs and purpose from top designer and developer across the world with free and commercial license.</h4>
    </div>
  </div>
</div>

<!-- Container (Services Section) -->
<div id="services" class="container-fluid text-center">
  <h2 class="about-title">More than just a store</h2>
  <h4 class="about-sub">We offer creative products, valuable knowledge, multi experience and much more...</h4>
  <br>
  <div class="row slideanim">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-cloud logo-small"></span>
      <h4>Premium Digital Assets</h4>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-cd logo-small"></span>
      <h4>Ready-use Software</h4>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-duplicate logo-small"></span>
      <h4>High Quality Template</h4>
    </div>
  </div>
  <br><br>
  <div class="row slideanim">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-book logo-small"></span>
      <h4>Free Bulletin Weekly</h4>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-blackboard logo-small"></span>
      <h4>Free Best Tutorial</h4>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-gift logo-small"></span>
      <h4>Freemium Products</h4>
    </div>
  </div>
</div>

<!-- Container (Portfolio Section) -->
<div id="portfolio" class="container-fluid text-center bg-grey">
  <h2 class="about-title">Threepoints</h2>
  <h4 class="about-sub">Free Weekly Bulletin. Upload Every Wednesday.</h4>
  <div class="row text-center slideanim">
	<?php
	foreach($data['threepoints'] as $tp){
	   echo "<div class='col-md-3 col-sm-4 col-xs-12'>
	          <div class='box-produk'>
	            <a href='".BASE_PATH."/threepoints/tpdetail/$tp[slug]'>
	            <img src='".BASE_PATH."/public/images/source/".$tp['gambar_threepoints']."'>
	              <div class='desc-threepoints'>
	                <span class='label label-primary'>Threepoints</span>
	                <h5 class='judul-threepoints'>".$tp['judul']."</h5>
	                <hr class='hr-threepoints'>
	                <h5 class='prod-threepoints'>
	                    <i class='far fa-clock'></i> ".tgl_indonesia($tp['produksi'])."&nbsp; / &nbsp;
                	    <i class='far fa-eye'></i> ".$tp['hits']."
	                </h5>
	              </div>
	            </a>
	          </div>
	      </div>";
	}
	?> 
  </div>
</div>

<!-- Container (Pricing Section) -->
<div id="pricing" class="container-fluid">
  <div class="text-center">
   	<h2 class="about-title">What our customers say</h2><br>
  </div>
  <div id="myCarousel" class="carousel slide text-center" data-ride="carousel">

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
              <?php
               $count = 0;
               foreach($data['ulastotal'] as $ulasan){
              ?>
               <div class="item <?php 
                            if($count==0){echo "active";}else{echo " ";}?>" data-interval="2000">
                 <?php echo "<div class='reviews'>
                    <div class='row blockquote review-item'>
                      <div class='col-md-3 text-center'>
                      <table align='center' cellpadding='0' cellspacing='0'><tr><td><div class='profile-pic'>".getProfilePicture($ulasan['cust'])."</div></td></tr></table>                  
                          <small>".$ulasan['cust']." <br><font class='review-source'>".tgl_indonesia($ulasan['tgl'])."</font></small>

                      </div>
                      <div class='col-md-6'>
                         <div class='rating'>".stars($ulasan['rate'])."</div>
                           <p class='review-text'>".$ulasan['isi_ulasan']." </p>
                         <div class='caption'>
                           <small class='review-source'>Sumber: ".$ulasan['sumber']."</small>
                         </div>
                      </div>
                      <div class='col-md-3 text-center'><a href='".BASE_PATH."/produk/detail/".$ulasan['slug']."'>
                         <div class='box-produk-ulas'><img class='img-rounded' src='".BASE_PATH."/public/images/source/".$ulasan['gambar']."'></div>
                        <div class='desc-produk-ulas'><h4 class='judul-produk-ulas'>".$ulasan['nama_produk']." </h4></div>
                        </a>
                      </div>                          
                    </div>  
                  </div></div>"; ?>
               <?php $count++;} ?>
             </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<!-- Container (Portfolio Section) -->
<div id="blog" class="container-fluid text-center bg-grey">
  <h2 class="about-title">Blog & Tutorial</h2>
  <h4 class="about-sub">Upgrade your skill and mindset here. Don't worry! It always free.</h4>
  <div class="row text-center slideanim">
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
</div>
<style type="text/css">
 .jumbotron {
    background-color: #141a34;
    color: #fff;
    padding: 75px 25px;
  }
  
</style>

<div class="jumbotron text-center">
  <h1>Buletin Mingguan Threepoints</h1> <br>
  <p>Download Buletin Mingguan Threepoints Secara Gratis. Tayang Setiap Rabu </p> 
</div>

  <div class='row'>

<?php
foreach($data['threepointsd'] as $tpd){
   echo "
   <div class='col-md-3 col-sm-4 col-xs-12'>
          <div class='box-produk'>
            <a href='".BASE_PATH."/threepoints/tpdetail/$tpd[slug]'>
            <img alt='".$tpd['judul']."' src='".BASE_PATH."/public/images/source/".$tpd['gambar_threepoints']."'>
              <div class='desc-threepoints'>
                <span class='label label-primary'>Threepoints</span>
                <h4 class='judul-threepoints'>".$tpd['judul']."</h4>
                <hr class='hr-threepoints'>
                <h4 class='prod-threepoints'>
                    <i class='far fa-clock'></i> ".tgl_indonesia($tpd['produksi'])."&nbsp; / &nbsp;
                	<i class='far fa-eye'></i> ".$tpd['hits']."
                </h4>
              </div>

            </a>
          </div>
      </div>";

}
?>   

</div>
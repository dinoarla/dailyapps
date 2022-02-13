<?php
load_css('dataTables/css/dataTables.bootstrap.min.css');
load_script('dataTables/js/jquery.dataTables.min.js');
load_script('dataTables/js/dataTables.bootstrap.min.js');
?>
<div class="col-md-9">
   
<h3 class="judul-konten">Tracking Pesanan</h3><hr>
<div class="table-responsive">
<table class="table table-striped table-tracking">
   <thead>
      <tr>
         <th>No</th>
         <th>No. Invoice</th>
         <th>Platform</th>
         <th>Nama Pemesan</th>
         <th>Status</th>
         <th>No. Resi</th>
      </tr>
   </thead>
   <tbody>
      
   </tbody>
</table>


   </div>
</div>

<div class="col-md-3">
   <a href="https://panel.niagahoster.co.id/ref/36975" target="_blank"><img src="https://niagaspace.sgp1.cdn.digitaloceanspaces.com/assets/images/affiliasi/banner/ads-persona-offline-to-online-business-cloud-hosting-affiliate-300-x-600.png" alt="Cloud Hosting Indonesia" style="border:0; max-width:100%; height:auto;" /></a>
</div>

<script>
var table;
$(function(){
   table = $('.table-tracking').DataTable({
      "processing" : true,
      "ajax" : {
         "url" : "<?= BASE_PATH ?>/tracking/listData",
         "type" : "POST"
      }
   }); 
});
</script>
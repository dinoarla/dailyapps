<div class="col-md-9"> 

<h3 class="judul-konten">Hubungi Kami</h3><hr>
<form class="form form-horizontal form-pesan" method="post" data-toggle="validator" action="<?= BASE_PATH ?>/pesan/kirim_pesan">

<?php
   if(isset($data['msg'])){
      if(is_array($data['msg'])){
?>
   <div class="alert alert-danger">
      <ul>
<?php
      foreach($data['msg'] as $error){
         echo "<li>$error</li>";
      }
?>
      </ul>
   </div>
<?php
      }else{
         echo "<div class='alert alert-success'>$data[msg]</div>";
      }
   }
form_input("Nama", "nama", "text", 8, "", "required data-error='Nama harus diisi'");
form_input("Email", "email", "email", 8, "", "required data-error='Email harus diisi yang valid'");

$list = array(
   'Request_Template'=>'Request Template',
   'Link_Download_Belum_Diemail'=>'Link Download Belum Diemail',
   'Produk_Tidak_Bisa_di_Download'=>'Produk Tidak Bisa di Download', 
   'Produk_Tidak_Bisa_Digunakan'=>'Produk Tidak Bisa Digunakan', 
   'Produk_Tidak_Sesuai_Orderan'=>'Produk Tidak Sesuai Orderan',
   'Situs_E-Commerce_(dailyapps.id)'=>'Situs E-Commerce (dailyapps.id)',
   'Hak_Kekayaan_Intelektual'=>'Hak Kekayaan Intelektual',
   'Lisensi_Legalitas_Copyright'=>'Lisensi, Legalitas, Copyright',
   'Lainnya'=>'Lainnya'
);
form_combobox("Subjek", "subjek", $list, 8, "", "required data-error='Subjek harus diisi'");

form_textarea("Pesan", "pesan", "", "maxlength='500' required data-error='Pesan harus diisi' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'");
?>
   <div class="form-group">
      <div class="col-md-10 col-md-offset-2">
         <div class="g-recaptcha" data-sitekey="6Le9zsobAAAAAJ04dqxhWxQ8CY1N0DSCHlaL2k2x"></div>
      </div>
   </div>
   
   <div class="col-sm-offset-2">&nbsp;
<?php create_button("Kirim Pesan", "primary", "", "send"); ?>
   </div><br>
</form>


</div>

<div class="col-md-3">
   <a href="https://panel.niagahoster.co.id/ref/36975" target="_blank"><img src="https://niagaspace.sgp1.cdn.digitaloceanspaces.com/assets/images/affiliasi/banner/ads-persona-offline-to-online-business-cloud-hosting-affiliate-300-x-600.png" alt="Cloud Hosting Indonesia" style="border:0; max-width:100%; height:auto;"/></a>
</div>



<script>
   $(function(){
      $('.form-pesan .form-control').after('<div class="help-block with-errors"></div>');
   });
</script>
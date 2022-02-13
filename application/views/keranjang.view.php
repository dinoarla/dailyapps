<?php
load_css('dataTables/css/dataTables.bootstrap.min.css');
load_script('dataTables/js/jquery.dataTables.min.js');
load_script('dataTables/js/dataTables.bootstrap.min.js');
?>
<div class="col-md-9">
   
<h3 class="judul-konten">Keranjang Belanja</h3><hr>

<?php
if(count($data['keranjang']) != 0){
?>

<form id="form-keranjang">
<table class="table table-striped table-keranjang">
   <thead>
      <tr>
         <th>No</th>
         <th>Gambar</th>
         <th>Nama Produk</th>
         <th>Harga</th>
         <th>Jumlah</th>
         <th>Total</th>
         <th>Batal</th>
      </tr>
   </thead>
   <tbody>
      
   </tbody>
</table>
</form>

<hr>

<div>
<a href="<?= BASE_PATH ?>" class="btn btn-primary">
   <i class="glyphicon glyphicon-search"></i> Belanja Lagi
</a>
<a style="float: right;" href="<?= BASE_PATH ?>/biodata" class="btn btn-success">
   <i class="glyphicon glyphicon-check"></i> Selesai Belanja
</a>
</div><br>
<?php
}else{
?>
<div class="row" style="text-align: center;">
   <img alt="Keranjang Kosong" src="<?= BASE_PATH ?>/public/images/cart_empty.png">
   <h5>Belum ada produk di dalam keranjang belanja.</h5>
<hr>
<a href="<?= BASE_PATH ?>" class="btn btn-primary">
   <i class="glyphicon glyphicon-search"></i> Ayo Belanja
</a>
</div><br>
<?php } ?>

</div>

<div class="col-md-3">
    <a href="https://panel.niagahoster.co.id/ref/36975" target="_blank"><img src="https://niagaspace.sgp1.cdn.digitaloceanspaces.com/assets/images/affiliasi/banner/ads-persona-offline-to-online-business-cloud-hosting-affiliate-336-x-280.png" alt="Cloud Hosting Indonesia" style="border:0; max-width:100%; height:auto;" /></a>
</div>

<script>
var table;
$(function(){
   table = $('.table-keranjang').DataTable({
      "dom" : 'rt',
      "bSort" : false,
      "processing" : true,
      "ajax" : {
         "url" : "<?= BASE_PATH ?>/keranjang/dataOrder",
         "type" : "POST"
      }
   }); 
});

function changeValue(){
   $.ajax({
      url : "<?= BASE_PATH ?>/keranjang/update",
      type : "POST",
     data : $('#form-keranjang').serialize(),
      success : function(data){
      table.ajax.reload();
      },
      error : function(){
         alert("Tidak dapat mengubah data!");
      }
   });
}

function deleteData(id){
   if(confirm("Apakah yakin data akan dihapus?")){
      $.ajax({
         url : "<?= BASE_PATH ?>/keranjang/batal/"+id,
         type : "GET",
         success : function(data){
            table.ajax.reload();
         },
         error : function(){
           alert("Tidak dapat menghapus data!");
         }
      });
   }
}
</script>

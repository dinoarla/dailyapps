<div class="col-md-8">
   
<h3 class="judul-konten">Biodata Pemesan</h3><hr>
<form class="form form-horizontal form-biodata" data-toggle="validator" method="post" action="<?= BASE_PATH ?>/biodata/simpan">

   
<?php
form_input("Nama", "nama", "text", 8, "", "maxlength='30' required data-error='Nama harus diisi'");
form_input("Email", "email", "email", 8, "", "maxlength='40' required data-error='Email harus diisi dengan yang valid'");
form_input("No. HP / WA", "telepon", "number", 4, "", "maxlength='12' required data-error='No. HP Whatsapp harus diisi' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'");
form_input("Catatan", "catatan", "text", 8, "", "maxlength='40' required data-error='Silakan isikan catatan anda'");


echo '<div class="col-sm-offset-2"> &nbsp;';
create_button("Pembayaran", "primary", "", "floppy-disk");
echo '</div><br>';
?>
</form>

</div>

<div class="col-md-4 panel panel-default">
   <div class="panel-body">
    <?php
      $no = 1;
      $total = 0;
      $jmlitem = 0;
      foreach($data['keranjang'] as $produk){
         $subtotal = $produk['jumlah']*$produk['harga'];
         $total += $subtotal;
         $jmlitem += $produk['jumlah'];
      }
    ?>
    <h3 class="page-header">Ringkasan Pesanan</h3>
      <h5 style="color: #959595;><span class="pull-left">Total Harga &nbsp;</span> (<?= $jmlitem ?> barang) <span class="pull-right">Rp <?= format_rupiah($total) ?></span></h5>
      <hr>
      <h4><b><span class="pull-left">Total Harga</span>  <span class="pull-right">Rp <?= format_rupiah($total) ?></span></b></h4>
    </div>
</div>

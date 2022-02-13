<div class="panel panel-default">
   <div class="panel-body">

<?php
   $transaksi = $data['transaksi'][0];
   $pengaturan = $data['pengaturan'][0];
?>
   <h2 class="page-header">Konfirmasi Pemesanan</h2>
   <table>
      <tr><td width="40%">Nama</td><td>: <?= $transaksi['nama_pemesan'] ?></td></tr>
      <tr><td>Email</td><td>: <?= $transaksi['email'] ?></td></tr>
      <tr><td>No. HP / WA</td><td>: <?= $transaksi['telp'] ?></td></tr>
   </table><hr>
   
   Nomor Invoice: <b><span style="font-size: 12px; color: blue;"><?= 'DA-'.date('ymwd', strtotime($transaksi['tanggal'])).''.str_pad($transaksi['id_transaksi'],7,"0",STR_PAD_LEFT)?></span></b><br><br>
   <table class="table table-bordered table-striped">
   <thead>
      <tr>
         <td>No</td> 
         <td>Nama Produk</td> 
         <td>Jumlah</td> 
         <td>Harga</td>
         <td>Subtotal</td>
      </tr>
   </thead>
   <tbody>
   <?php
   $no = 0;
   $total = 0;
   $total_berat = 0;
   foreach($data['detail'] as $detail){
      $no++;
      $subtotal = $detail['jumlah'] * $detail['harga'];
      $total += $subtotal;         
      
      
      $harga_rp = format_rupiah($detail['harga']);
      $subtotal_rp = format_rupiah($subtotal);
      
      echo "<tr>
            <td>$no</td>
            <td>$detail[nama_produk]<br><span class='label label-primary'>$detail[kd_sku]</span></td>
            <td>$detail[jumlah]</td>
            <td>Rp. $harga_rp</td>
            <td>Rp. $subtotal_rp</td>
         </tr>"; 
   }
      $grandtotal = $total;
      
      $grandtotal_rp = format_rupiah($grandtotal);
      $total_rp = format_rupiah($total);
      
      echo "<tr><td colspan='3'></td><td>Total </td><td> Rp. $total_rp </td></tr>
          <tr><td colspan='3'></td><td><b>Total Bayar</b></td><td><b>Rp. $grandtotal_rp </b></td></tr>";
   ?>
   </tbody>
   </table>
   
   <p>Catatan:</p>
   <li>Silakan melakukan pembayaran maksimal 2 x 24 jam sesuai jumlah di atas ke salah satu rekening berikut: </li><br>
   <div class="well">
   
      <img alt="BNI" class="bayar-ongkir" src="<?= BASE_PATH ?>/public/images/bni.png">&nbsp;No. Rekening: <b><?= $pengaturan['rekening'] ?></b> a.n. <b><?= $pengaturan['pemilik_rekening'] ?></b>
      
   </div>

   <li>Silakan konfirmasi setelah melakukan pembayaran melalui Whatsapp ke <b><?= $pengaturan['sms'] ?></b></li>
   <li>Produk anda akan kami kirimkan ke email <b><?= $transaksi['email'] ?></b> maksimal <b>4 jam</b> setelah kami mengkonfirmasi pembayaran</li>
   
   </div>
</div>

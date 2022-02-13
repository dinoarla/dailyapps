<?php
create_title("Data Transaksi");
   
start_content();
   create_table(array("No. Invoice", "Platform", "Nama Pemesan", "Waktu", "Status", "No. Resi", "Aksi"));
end_content();

start_modal('modal-form', 'return saveData()');
   echo "<input type='hidden' name='ket' id='ket'>";
   
   form_input("Nama Pemesan", "nama", "text", 5, "", "readonly");
   form_input("Email", "email", "text", 5, "", "readonly");
   form_input("Whatsapp", "telpon", "text", 5, "", "readonly");
   form_input("Catatan", "catatan", "text", 5, "", "readonly");
   
   $list = array('Baru'=>'Baru', 'Lunas'=>'Lunas', 'Batal'=>'Batal');
   form_combobox('Status', 'status', $list, 3, '', 'required');
   form_input("Alamat", "alamat", "text", 9, "");
   form_input("Kurir", "kurir", "text", 5, "");
   form_input("No. Resi", "no_resi", "text", 5, "");
   $list = array('da'=>'da', 'tokped'=>'tokped', 'bl'=>'bl', 'shopee'=>'shopee');
   form_combobox('Source', 'source', $list, 3, '');
   
   echo "<h4 class='page-header'><b> Detail Transaksi </b></h4>
   <div class='tabel-detail'>
      <table class='table table-bordered table-striped'>
         <thead>
            <tr>
              <th>No</th>
              <th>Nama Produk</th>
              <th>Jumlah</th>
              <th>Harga</th>
              <th>Total</th>
            </tr>
         </thead>
         <tbody></tbody>
         <tfoot></tfoot>
      </table>
   </div>";
end_modal();
?>

<script type="text/javascript">
var table, save_method;
$(function(){
   table = $('.panel .table').DataTable({
      "processing" : true,
      "ajax" : {
         "url" : "<?= BASE_PATH ?>/admin/transaksi/listData",
         "type" : "POST"
      }
   }); 
});

function editForm(id){
   save_method = "edit";
   $('#modal-form form')[0].reset();
   $('.tabel-detail tbody, .tabel-detail tfoot').html("");
   $.ajax({
      url : "<?= BASE_PATH ?>/admin/transaksi/edit/"+id,
      type : "GET",
      dataType : "JSON",
      success : function(data){
         $('#modal-form').modal('show');
         $('.modal-title').text('Edit Transaksi');
         
         $('#id').val(data.trans.id_transaksi);
         $('#nama').val(data.trans.nama_pemesan);
         $('#email').val(data.trans.email);
         $('#telpon').val(data.trans.telp);
         $('#catatan').val(data.trans.catatan);
         $('#status').val(data.trans.status);
         $('#alamat').val(data.trans.alamat);
         $('#kurir').val(data.trans.kurir);
         $('#no_resi').val(data.trans.no_resi);
         $('#source').val(data.trans.source);
         
		 //Mengisi tabel transaksi detail
         for(i in data.baris){
           $('.tabel-detail tbody').append(data.baris[i]);
         }
		 $('.tabel-detail tfoot').append(data.total);
        
         if(data.trans.status == "Lunas") $('#ket').val('lunas');
         else if(data.trans.status == "Batal") $('#ket').val('batal');
      },
      error : function(){
         alert("Tidak dapat menampilkan data!");
      }
   });
}

function saveData(){
   url = "<?= BASE_PATH ?>/admin/transaksi/update";
   
   $.ajax({
      url : url,
      type : "POST",
      data : $('#modal-form form').serialize(),
      success : function(data){
         $('#modal-form').modal('hide');
         table.ajax.reload();
      },
        error : function(){
        alert("Tidak dapat menyimpan data!");
      }   
   });
   return false;
}

function deleteData(id){
   if(confirm("Apakah yakin data akan dihapus?")){
      $.ajax({
         url : "<?= BASE_PATH ?>/admin/transaksi/delete/"+id,
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
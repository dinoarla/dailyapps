<?php
create_title("Data Ulasan");

//Membuat tabel
start_content();
   create_button("Tambah", "success", "addForm()", "plus-sign");
   create_table(array("Produk", "Isi Ulasan", "Aksi"));
end_content();

//Membuat modal form
start_modal('modal-form', 'return saveData()');
   form_input("Customer", "cust", "text", 5, "", "required");
   form_input("Rate", "rate", "number", 2, "", "required");
   
   $list = array();
   foreach($data as $d){
      $key = $d['id_produk'];
      $list[$key] = $d['nama_produk'];
   }
   form_combobox('Produk', 'produk', $list, 4);

   form_input("Isi Ulasan", "isi_ulasan", "text", 8, "", "required");
   form_input("Tanggal", "tgl", "text", 2, "", "required");
   form_input("Sumber", "sumber", "text", 4, "", "required");
end_modal();
?>

<script type="text/javascript">
var table, save_method;
$(function(){
//Menampilkan data ke tabel dengan AJAX
   table = $('.table').DataTable({
      "processing" : true,
      "ajax" : {
         "url" : "<?= BASE_PATH ?>/admin/ulasan/listData",
         "type" : "POST"
      }
   }); 
});

//Menampilkan form tambah data
function addForm(){
   save_method = "add";
   $('#modal-form').modal('show');
   $('#modal-form form')[0].reset();                
   $('.modal-title').text('Tambah Ulasan');
}

//Menampilkan form edit data
function editForm(id){
   save_method = "edit";
   $('#modal-form form')[0].reset();
   $.ajax({
      url : "<?= BASE_PATH ?>/admin/ulasan/edit/"+id,
      type : "GET",
      dataType : "JSON",
      success : function(data){
         $('#modal-form').modal('show');
         $('.modal-title').text('Edit Ulasan');
         
         $('#id').val(data.id_ulasan);
         $('#cust').val(data.cust);
         $('#rate').val(data.rate);
         $('#produk').val(data.id_produk);
         $('#isi_ulasan').val(data.isi_ulasan);
         $('#tgl').val(data.tgl);
         $('#sumber').val(data.sumber);
      },
      error : function(){
         alert("Tidak dapat menampilkan data!");
      }
   });
}
//Menyimpan data dengan AJAX
function saveData(){
   if(save_method == "add") url = "<?= BASE_PATH ?>/admin/ulasan/insert";
   else url = "<?= BASE_PATH ?>/admin/ulasan/update";
   
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

//Menghapus data dengan AJAX
function deleteData(id){
   if(confirm("Apakah yakin data akan dihapus?")){
      $.ajax({
         url : "<?= BASE_PATH ?>/admin/ulasan/delete/"+id,
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
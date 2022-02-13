<?php
create_title("Data Etalase");

//Membuat tabel
start_content();
   create_button("Tambah", "success", "addForm()", "plus-sign");
   create_table(array("Nama Etalase", "Slug", "Aksi"));
end_content();

//Membuat modal form
start_modal('modal-form', 'return saveData()');
   form_input("Nama Etalase", "etalase", "text", 5, "", "required");
   form_input("Slug", "slug", "text", 5, "", "required");
end_modal();
?>

<script type="text/javascript">
var table, save_method;
$(function(){
//Menampilkan data ke tabel dengan AJAX
   table = $('.table').DataTable({
      "processing" : true,
      "ajax" : {
         "url" : "<?= BASE_PATH ?>/admin/etalase/listData",
         "type" : "POST"
      }
   }); 
});

//Menampilkan form tambah data
function addForm(){
   save_method = "add";
   $('#modal-form').modal('show');
   $('#modal-form form')[0].reset();                
   $('.modal-title').text('Tambah Etalase');
}

//Menampilkan form edit data
function editForm(id){
   save_method = "edit";
   $('#modal-form form')[0].reset();
   $.ajax({
      url : "<?= BASE_PATH ?>/admin/etalase/edit/"+id,
      type : "GET",
      dataType : "JSON",
      success : function(data){
         $('#modal-form').modal('show');
         $('.modal-title').text('Edit Etalase');
         
         $('#id').val(data.id_etalase);
         $('#etalase').val(data.nama_etalase);
         $('#slug').val(data.slug);
      },
      error : function(){
         alert("Tidak dapat menampilkan data!");
      }
   });
}
//Menyimpan data dengan AJAX
function saveData(){
   if(save_method == "add") url = "<?= BASE_PATH ?>/admin/etalase/insert";
   else url = "<?= BASE_PATH ?>/admin/etalase/update";
   
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
         url : "<?= BASE_PATH ?>/admin/etalase/delete/"+id,
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
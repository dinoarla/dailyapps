<?php
create_title("Data Kategori");

//Membuat tabel
start_content();
   create_button("Tambah", "success", "addForm()", "plus-sign");
   create_table(array("Gambar Kategori", "Nama Kategori", "Etalase", "Kode", "Hits","Aksi"));
end_content();

//Membuat modal form
start_modal('modal-form', 'return saveData()');
   form_input("Nama Kategori", "kategori", "text", 5, "", "required");
   form_input("Slug", "slug", "text", 5, "", "required");
   
   $list = array();
   foreach($data as $d){
      $key = $d['id_etalase'];
      $list[$key] = $d['nama_etalase'];
   }
   form_combobox('Etalase', 'etalase', $list, 4);

   form_mediapicker("Gambar Kategori", "gambar_kategori", 4, 0, "modal-form");
   form_input("Kode", "kd_kat", "text", 2, "", "required");
end_modal();
?>

<script type="text/javascript">
var table, save_method;
$(function(){
//Menampilkan data ke tabel dengan AJAX
   table = $('.table').DataTable({
      "processing" : true,
      "ajax" : {
         "url" : "<?= BASE_PATH ?>/admin/kategori/listData",
         "type" : "POST"
      }
   }); 
});

//Menampilkan form tambah data
function addForm(){
   save_method = "add";
   $('#modal-form').modal('show');
   $('#modal-form form')[0].reset();                
   $('.modal-title').text('Tambah Kategori');
   $('#img-gambar').html('');
}

//Menampilkan form edit data
function editForm(id){
   save_method = "edit";
   $('#modal-form form')[0].reset();
   $.ajax({
      url : "<?= BASE_PATH ?>/admin/kategori/edit/"+id,
      type : "GET",
      dataType : "JSON",
      success : function(data){
         $('#modal-form').modal('show');
         $('.modal-title').text('Edit Kategori');
         
         $('#id').val(data.id_kategori);
         $('#kategori').val(data.nama_kategori);
         $('#slug').val(data.slug);
         $('#etalase').val(data.id_etalase);
         $('#gambar_kategori').val(data.gambar_kategori);
         $('#kd_kat').val(data.kd_kat);
      },
      error : function(){
         alert("Tidak dapat menampilkan data!");
      }
   });
}
//Menyimpan data dengan AJAX
function saveData(){
   if(save_method == "add") url = "<?= BASE_PATH ?>/admin/kategori/insert";
   else url = "<?= BASE_PATH ?>/admin/kategori/update";
   
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
         url : "<?= BASE_PATH ?>/admin/kategori/delete/"+id,
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
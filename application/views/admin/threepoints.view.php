<?php
create_title("Threepoints Production");

//Membuat tabel
start_content();
   create_button("Tambah", "success", "addForm()", "plus-sign");
   create_table(array("Gambar", "Judul", "Slug", "Produksi", "Hits","Aksi"));
end_content();

//Membuat modal form
start_modal('modal-form', 'return saveData()');
   form_input("Judul", "judul", "text", 5, "", "required");
   form_input("Slug", "slug", "text", 5, "", "required");

   form_mediapicker("Gambar Utama", "gambar_threepoints", 4, 0, "modal-form");
   form_mediapicker("Gambar Dua", "gambar_threepointsd", 4, 0, "modal-form");
   form_mediapicker("Gambar Tiga", "gambar_threepointst", 4, 0, "modal-form");
   form_mediapicker("Gambar Empat", "gambar_threepointse", 4, 0, "modal-form");
   form_mediapicker("Gambar Lima", "gambar_threepointsl", 4, 0, "modal-form");
   form_mediapicker("Gambar Enam", "gambar_threepointsen", 4, 0, "modal-form");

   form_textarea("Deskripsi", "deskripsi", "richtext");
   form_input("Produksi", "produksi", "text", 2, "", "required");
end_modal();
?>

<script type="text/javascript">
var table, save_method;
$(function(){
//Menampilkan data ke tabel dengan AJAX
   table = $('.table').DataTable({
      "processing" : true,
      "ajax" : {
         "url" : "<?= BASE_PATH ?>/admin/threepoints/listData",
         "type" : "POST"
      }
   }); 
});

//Menampilkan form tambah data
function addForm(){
   save_method = "add";
   $('#modal-form').modal('show');
   $('#modal-form form')[0].reset();                
   $('.modal-title').text('Tambah Threepoints');
   $('#img-gambar').html('');
   $('#img-gambard').html('');
   $('#img-gambart').html('');
   $('#img-gambare').html('');
   $('#img-gambarl').html('');
   $('#img-gambaren').html('');
}

//Menampilkan form edit data
function editForm(id){
   save_method = "edit";
   $('#modal-form form')[0].reset();
   $.ajax({
      url : "<?= BASE_PATH ?>/admin/threepoints/edit/"+id,
      type : "GET",
      dataType : "JSON",
      success : function(data){
         $('#modal-form').modal('show');
         $('.modal-title').text('Edit Threepoints');
         
         $('#id').val(data.id_threepoints);
         $('#judul').val(data.judul);
         $('#slug').val(data.slug);
         $('#gambar_threepoints').val(data.gambar_threepoints);
         $('#img-gambar').html('<br><img src="<?= BASE_PATH ?>/public/images/source/'+data.gambar_threepoints+'" width="150">');
         $('#gambar_threepointsd').val(data.gambar_threepointsd);
         $('#img-gambard').html('<br><img src="<?= BASE_PATH ?>/public/images/source/'+data.gambar_threepointsd+'" width="150">');
         $('#gambar_threepointst').val(data.gambar_threepointst);
         $('#img-gambart').html('<br><img src="<?= BASE_PATH ?>/public/images/source/'+data.gambar_threepointst+'" width="150">');
         $('#gambar_threepointse').val(data.gambar_threepointse);
         $('#img-gambare').html('<br><img src="<?= BASE_PATH ?>/public/images/source/'+data.gambar_threepointse+'" width="150">');
         $('#gambar_threepointsl').val(data.gambar_threepointsl);
         $('#img-gambarl').html('<br><img src="<?= BASE_PATH ?>/public/images/source/'+data.gambar_threepointsl+'" width="150">');
         $('#gambar_threepointsen').val(data.gambar_threepointsen);
         $('#img-gambaren').html('<br><img src="<?= BASE_PATH ?>/public/images/source/'+data.gambar_threepointsen+'" width="150">');
         tinymce.get('deskripsi').setContent(data.deskripsi);
         $('#produksi').val(data.produksi);
      },
      error : function(){
         alert("Tidak dapat menampilkan data!");
      }
   });
}
//Menyimpan data dengan AJAX
function saveData(){
   if(save_method == "add") url = "<?= BASE_PATH ?>/admin/threepoints/insert";
   else url = "<?= BASE_PATH ?>/admin/threepoints/update";
   
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
         url : "<?= BASE_PATH ?>/admin/threepoints/delete/"+id,
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
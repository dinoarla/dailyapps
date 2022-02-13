<?php
create_title("Banner & Iklan");

//Membuat tabel
start_content();
   create_button("Tambah", "success", "addForm()", "plus-sign");
   create_table(array("Banner", "Judul", "Jenis", "Url", "Aksi"));
end_content();

//Membuat modal form
start_modal('modal-form', 'return saveData()');
   form_mediapicker("Banner", "banner", 4, 0, "modal-form");
   form_input("Judul", "judul", "text", 5, "", "required");
   
   $list = array('home_banner'=>'home_banner', 'home_promo'=>'home_promo', 'krj_side'=>'krj_side', 'stat_side'=>'stat_side', 'track_side'=>'track_side', 'hub_side'=>'hub_side');
   form_combobox('Jenis Banner', 'jenis_banner', $list, 3, '', 'required');
   
   form_input("Url", "url", "text", 8, "", "required");
end_modal();
?>

<script type="text/javascript">
var table, save_method;
$(function(){
//Menampilkan data ke tabel dengan AJAX
   table = $('.table').DataTable({
      "processing" : true,
      "ajax" : {
         "url" : "<?= BASE_PATH ?>/admin/banner/listData",
         "type" : "POST"
      }
   }); 
});

//Menampilkan form tambah data
function addForm(){
   save_method = "add";
   $('#modal-form').modal('show');
   $('#modal-form form')[0].reset();                
   $('.modal-title').text('Tambah Banner');
   $('#img-gambar').html('');
}

//Menampilkan form edit data
function editForm(id){
   save_method = "edit";
   $('#modal-form form')[0].reset();
   $.ajax({
      url : "<?= BASE_PATH ?>/admin/banner/edit/"+id,
      type : "GET",
      dataType : "JSON",
      success : function(data){
         $('#modal-form').modal('show');
         $('.modal-title').text('Edit Banner');
         
         $('#id').val(data.id_banner);
         $('#banner').val(data.banner);
         $('#judul').val(data.judul);
         $('#jenis_banner').val(data.jenis_banner);
         $('#url').val(data.url);
      },
      error : function(){
         alert("Tidak dapat menampilkan data!");
      }
   });
}
//Menyimpan data dengan AJAX
function saveData(){
   if(save_method == "add") url = "<?= BASE_PATH ?>/admin/banner/insert";
   else url = "<?= BASE_PATH ?>/admin/banner/update";
   
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
         url : "<?= BASE_PATH ?>/admin/banner/delete/"+id,
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
<?php
create_title("Blog Production");

//Membuat tabel   
start_content();
   create_button("Tambah", "success", "addForm()", "plus-sign");
   create_table(array("Gambar", "Judul", "Produksi", "Kategori", "Hits", "Aksi"));
end_content();

//Membuat modal form
start_modal('modal-form', 'return saveData()');
   form_input("Judul", "judul", "text", 5, "", "required");
   form_input("Slug", "slug", "text", 5, "", "required");
   
   $list = array('Bisnis Digital'=>'Bisnis Digital', 'Digital Marketing'=>'Digital Marketing', 'Tutorial'=>'Tutorial');
   form_combobox('Kategori Blog', 'kategori', $list, 3, '', 'required');
   
   form_mediapicker("Gambar", "gambar", 4, 0, "modal-form");
   
   form_input("Caption", "caption", "text", 10, "", "required");
   form_input("Produksi", "produksi", "text", 2, "", "required");
   form_textarea("Isi Blog", "isi", "richtext");
end_modal();
?>

<script type="text/javascript">
var table, save_method;
$(function(){
//Menampilkan data ke tabel dengan AJAX
   table = $('.table').DataTable({
      "processing" : true,
      "ajax" : {
         "url" : "<?= BASE_PATH ?>/admin/blog/listData",
         "type" : "POST"
      }
   }); 
});

//Menampilkan form tambah data
function addForm(){
   save_method = "add";
   $('#modal-form').modal('show');
   $('#modal-form form')[0].reset();                
   $('.modal-title').text('Tambah Blog');
   $('#img-gambar').html('');
}

//Menampilkan form edit data
function editForm(id){
   save_method = "edit";
   $('#modal-form form')[0].reset();
   $.ajax({
      url : "<?= BASE_PATH ?>/admin/blog/edit/"+id,
      type : "GET",
      dataType : "JSON",
      success : function(data){
         $('#modal-form').modal('show');
         $('.modal-title').text('Edit Blog');
         
         $('#id').val(data.id_blog);
         $('#judul').val(data.judul);
         $('#slug').val(data.slug);
         $('#kategori').val(data.kategori);
         $('#gambar').val(data.gambar);
         $('#img-gambar').html('<br><img src="<?= BASE_PATH ?>/public/images/source/'+data.gambar+'" width="150">');
         $('#caption').val(data.caption);
         $('#produksi').val(data.produksi);
         tinymce.get('isi').setContent(data.isi);
      },
      error : function(){
         alert("Tidak dapat menampilkan data!");
      }
   });
}

//Menyimpan data dengan AJAX
function saveData(){
   if(save_method == "add") url = "<?= BASE_PATH ?>/admin/blog/insert";
   else url = "<?= BASE_PATH ?>/admin/blog/update";
   
   $.ajax({
      url : url,
      type : "POST",
      data : $('#modal-form form').serialize(),
      success : function(data){
         if(data=='success'){
            $('#modal-form').modal('hide');
            table.ajax.reload();
         }else{
            alert(data);
         }
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
         url : "<?= BASE_PATH ?>/admin/blog/delete/"+id,
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
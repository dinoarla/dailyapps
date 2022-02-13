<?php
use \application\controllers\AdminMainController;
class MediaController extends AdminMainController{
   function __construct(){
      parent::__construct();
   }

//Menampilkan halaman threepoints   
   public function index(){
      $this->template('admin/media', 'Media');
   }
}
<?php
use application\controllers\MainController;
class NyasarController extends MainController{
   
   public function index(){      
      $this->template('nyasar');
   }

} 
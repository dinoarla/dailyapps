<?php
class ThreepointsModel extends Model{
   public function __construct(){
      $this->connect();
      $this->_table = "threepoints";      
   }
}
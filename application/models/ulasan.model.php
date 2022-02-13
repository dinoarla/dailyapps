<?php
class UlasanModel extends Model{
   public function __construct(){
      $this->connect();
      $this->_table = "ulasan";      
   }
}
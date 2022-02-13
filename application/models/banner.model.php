<?php
class BannerModel extends Model{
   public function __construct(){
      $this->connect();
      $this->_table = "banner";      
   }
}
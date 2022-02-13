<?php
class BlogModel extends Model{
   public function __construct(){
      $this->connect();
      $this->_table = "blog";      
   }
}
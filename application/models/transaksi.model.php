<?php
class TransaksiModel extends Model{
   public function __construct(){
      $this->connect();
      $this->_table = "transaksi";      
   }
}
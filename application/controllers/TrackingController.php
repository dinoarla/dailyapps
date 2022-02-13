<?php
use application\controllers\MainController;
class TrackingController extends MainController{
   
   public function index(){      
      $this->template('tracking');
   }

//Menampilkan data melalui ajax      
   public function listData(){
      $this->model('transaksi');
      $query = $this->transaksi->selectAll("tanggal", "DESC");
      $list = $this->transaksi->getResult($query);
      $data = array();
      $no = 0;
      foreach($list as $li){
         $no ++;
         $row = array();
         $row[] = $no;
         $row[] = 'DA-'.date('ymwd', strtotime($li['tanggal'])).''.str_pad($li['id_transaksi'],7,"0",STR_PAD_LEFT);
         $row[] = '<img class="bayar-ongkir" src="'.BASE_PATH.'/public/images/'.$li['source'].'.png">';
         $row[] = get_starred($li['nama_pemesan']).'<br><small>Dipesan pada '.tgl_indonesia($li['tanggal']).'</small>';
         $row[] = $li['status'];
         $row[] = '<a target="_blank" href="https://cekresi.com/?noresi='.$li['no_resi'].'">'.$li['no_resi'].'</a>';
         $data[] = $row;
      }
      
      $output = array("data" => $data);
      echo json_encode($output);
   }
} 
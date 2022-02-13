<?php
use application\controllers\MainController;
class PesanController extends MainController{
   public function index(){
      $this->template('pesan');
   }
   
   public function kirim_pesan(){
      $this->model('pesan');
      
      $data = array();
      $data['nama'] = $this->validate($_POST['nama']);
      $data['email'] = $this->validate($_POST['email']);
      $data['subjek'] = $this->validate($_POST['subjek']);
      $data['pesan'] = $this->validate($_POST['pesan']);
      $data['tanggal'] = date('Y-m-d');
      
      $error = array();
      
     
      $datacaptcha = $_POST['g-recaptcha-response'];
      $secret_key = '6Le9zsobAAAAANPjwnxt-ahKYJLPQzgO-FWzwKwN';   
      
      $api_url = 'https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.'&response='.$datacaptcha;
      $response = @file_get_contents($api_url);
      $dataresponse = json_decode($response, true);
      if(!$dataresponse['success']) array_push($error, "Gagal memasukkan captcha");
      
      if(count($error)==0){
         $simpan = $this->pesan->insert($data);
         if($simpan) $this->redirect('pesan/berhasil');
      }else{
         $this->template('pesan', array('msg'=> $error));
      }
   }
   
   function berhasil(){
      $msg = "Terimakasih telah menghubungi kami! Kami akan segera menindak lanjuti pesan yang Anda kirim!";
      $this->template('pesan', array('msg'=> $msg));
   }
} 
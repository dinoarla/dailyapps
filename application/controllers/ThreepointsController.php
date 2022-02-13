<?php
use application\controllers\MainController;
class ThreepointsController extends MainController{
   
   public function index(){    
      $this->model('threepoints');
      $query_threepoints = $this->threepoints->selectAll('id_threepoints', 'DESC');
      $threepoints = $this->threepoints->getResult($query_threepoints);

      $this->template('threepoints', array(
         'threepointsd'=>$threepoints
      ));
   }

   public function tpdetail($slug){
      $this->model('threepoints');
      $query = $this->threepoints->selectWhere(array('slug'=>$slug));
      $threepoints = $this->threepoints->getResult($query);
      
      foreach($threepoints as $tphits){
            $datahits = array();
            $datatphits['hits'] = $tphits['hits'] + 1;
            $this->threepoints->update($datatphits, array('id_threepoints'=>$threepoints[0]['id_threepoints']));
        }

      $this->template('tpdetail', array(
         'threepointsd'=>$threepoints
      ));
   }


} 
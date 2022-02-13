<?php
function stars($all){
   $r = floor($all * 100) / 100;
   
   $stars="";
   $newwhole = floor($r);
   for($s=0;$s<$newwhole;$s++){
         $stars .= "<i class='fas fa-star'></i>"; 
      }
   for($s=5;$s>$newwhole;$s--){
         $stars .= "<i class='far fa-star'></i>"; 
      }
      return $stars;
}

?>
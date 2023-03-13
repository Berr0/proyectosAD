<?php

  function obtenerColor(){
    
    $random = rand(0,3);
    $color = "";
    
    switch($random){
      case 0: $color = "info";break;
      case 1: $color = "warning";break;
      case 2: $color = "danger";break;
      case 3: $color = "dark";break;
    }
    
    return $color;
    
  }


?>
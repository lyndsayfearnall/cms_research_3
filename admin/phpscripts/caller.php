<?php
  //DO NOT PUT LINK TO CALLER.PHP IN THE CONFIG FILE. (Only called from a link, or else it will start to cause errors)
  //otherwise, this will get called all the time and fuck with your files
  require_once("config.php");

//similar to event listener in JS, triggered by html link click
  if(isset($_GET['caller_id'])){
    $dir = $_GET['caller_id'];
    if($dir == 'logout'){
      logged_out();
    }else if($dir == 'delete'){
      $id = $_GET['id'];
      deleteUser($id);
    }else{
      echo "Caller id was passed incorrectly";
    }
  }


?>

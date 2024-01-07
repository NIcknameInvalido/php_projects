<?php 
  function sessao($redireciona=1){
   
    if($redireciona==0){
        header('Location: login.php');
        exit();
    }
  }
?>
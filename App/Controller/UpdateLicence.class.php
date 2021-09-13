<?php

require_once('../Class/Conn.class.php');
require_once('../Class/Licencas.class.php');

$licenca = new Licencas();

if(isset($_POST['id'])){
$chave = $_POST['val_chave'];

$update = $licenca->updateLicence($chave);

  if($update){
      echo 1;
  }else{
      echo 0;
  };
    
}else{
    return ;
}
<?php

require_once('../Class/Conn.class.php');
require_once('../Class/Licencas.class.php');



$licenca = new Licencas();
//$_POST['id_licence'];

if(isset($_POST['id'])){

   $ID = $_POST['id'];
   $hostname = $_POST['hostname'];
   $username = $_POST['username'];
   $num_serie = $_POST['num_serie'];
   $local = $_POST['local'];
   $andar = $_POST['andar'];

   $change =  $licenca->ChangeLicence($ID, $hostname, $username, $num_serie, $local, $andar);
   
   if($change){
       $hostname;
       echo 1;
   }else{
       echo 0;
   }

}else{
   echo '{"erro":true,"msg":"Erro ao realizar a solicitação"}';
}
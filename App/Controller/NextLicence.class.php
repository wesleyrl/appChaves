<?php

require_once('../Class/Conn.class.php');
require_once('../Class/Licencas.class.php');

$licenca = new Licencas();
//$_POST['id_licence'];

if(isset($_POST['id_chave'])){
   $id_licence = $_POST['id_chave'];
   $cod =  $licenca->nextLicence($id_licence);
   
   echo json_encode($cod);

}else{
   echo '{"erro":true,"msg":"Erro ao realizar a solicitação"}';
}
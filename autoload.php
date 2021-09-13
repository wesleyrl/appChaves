<?php


date_default_timezone_set("America/Sao_Paulo");//definindo a hora padrão

class Autoload{

    public function __construct()
    {
        spl_autoload_extensions('.class.php');
        spl_autoload_register(array($this, 'load'));
    }


    private function load($className){
        
        $extensions = spl_autoload_extensions();
        require_once('App/Class/'. $className . $extensions);
      
    }

}

$autoload = new Autoload();

$s = scandir('class');

$arrayClass = array();

foreach($s as $k){

    if($k != "." && $k != ".."){
        $ex = explode('.',$k);
        $class = $ex[0];
        $arrayClass[$class] = new $class();
    }
}

$i = (object)$arrayClass;//ii->clientes->cadastrar()
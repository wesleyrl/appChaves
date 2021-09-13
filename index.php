<?php
include_once('autoload.php');
if(isset($_GET['url'])){

    $explode = explode('/', $_GET['url']);
    $name_page = $explode[0];

    if(is_file('pages/'.$name_page.'.php')){
        include_once('pages/'.$name_page.'.php');
    }else{

        if(is_file('pages/aluno/'.$name_page.'.php')){
            include_once('pages/aluno/'.$name_page.'.php');
        }else{
            if(is_file('pages/admin/'.$name_page.'.php')){
                include_once('pages/admin/'.$name_page.'.php');
            }else{
                echo '404';
            }
        }
        
    }

}else{

    include_once('pages/home.php');
}


?>
<?php


class Conn{

    private $user;
    private $pass;
    private $host;
    private $db;

    public function __construct()
    {
        $this->user = 'root';
        $this->pass = '';
        $this->host = 'localhost';
        $this->db = 'licenca';
    }

    public function pdo(){
       try{
           $pdo = new PDO("mysql:host = $this->host; dbname=$this->db",$this->user, $this->pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'));
           return $pdo;
       }catch(PDOException $e){
           var_dump($e);
       }
    }

}
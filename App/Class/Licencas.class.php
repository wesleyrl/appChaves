<?php



class Licencas extends Conn{

    public function __construct()
    {
        $this->conn = new Conn();
        $this->pdo = $this->conn->pdo();
    }

    public function getLicence(){
        $query = $this->pdo->prepare("select * from licencas where usuario = '' AND  NUMERO_SERIE = '' limit 1");
        $query->execute();
        $fetch = $query->fetch(PDO::FETCH_OBJ);

        return $fetch;
    }

    public function nextLicence($id){
        $query = $this->pdo->prepare("select * from licencas where ID = (select min(ID) from licencas where ID > :id and NUMERO_SERIE = '' limit 1) ");
        $query->bindValue(":id",$id);
        $query->execute();
        $fetch = $query->fetch(PDO::FETCH_OBJ);
        

        return $fetch;
    }

    public function ChangeLicence($ID, $hostname, $username, $num_serie, $local, $andar){
        $query =  $this->pdo->query("update licencas set NUMERO_SERIE = '$num_serie', UNIDADE = '$local', USUARIO = '$username', ANDAR = '$andar', PATRIMONIO = '$hostname' WHERE ID = '$ID'");
        if($query){
            return 1;
        }else{
            return 2;
        }
    }


    public function updateLicence($num_serie){
        $query =  $this->pdo->query("update licencas set NUMERO_SERIE = 'LICENCA INVALIDA' WHERE CHAVES = '$num_serie'");
        if($query){
            return 1;
        }else{
            return 2;
        }
    }

    /**
     * status:
     * usadas
     * erro
     * livres
     */

    public function countStatus($status){
        switch($status){
            case 'usadas':
                $query = $this->pdo->prepare("select  count(*) as total   from licencas where usuario != '' and (unidade != '' and NUMERO_SERIE != 'LICENCA INVALIDA')");
            break;
            case 'erro':
                $query = $this->pdo->prepare("select count(*)  as total from licencas where numero_serie = 'LICENCA INVALIDA'");
            break;
            case 'livres':
                $query = $this->pdo->prepare("select count(*) as total from licencas where usuario = '' and  NUMERO_SERIE = ''");
            break;
            default:
                $query = $this->pdo->prepare("select count(*)  from licencas");
            break;

          
        }

        $query->execute();
        $fetch = $query->fetch(PDO::FETCH_OBJ);
        return $fetch;
    }

   


}
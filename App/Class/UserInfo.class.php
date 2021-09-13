<?php



class UserInfo{

    private $hostname;
    private $userName;
    
    public function getHostname(){
        return php_uname('n');
    }

    public function getUserName(){
        exec('wmic COMPUTERSYSTEM Get UserName', $user);

        $this->userName = explode('\\',$user[1]);
        
        return  $this->userName[1];
        
    }


}

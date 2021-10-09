<?php

class DAO{
    private $serverName; 
    private $userName; 
    private $password; 
    private $databaseName; 

    protected function connect(){
        $this->servername = "localhost"; 
        $this->userName = "root"; 
        $this->password = ""; 
        $this->databaseName = "Test_Database_3"; 

        $connection = new mysqli( $this->servername, $this->userName, $this->password, $this->databaseName); 
        return $connection; 
    }
}

?>
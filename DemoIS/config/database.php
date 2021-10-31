<?php

class Database{
    
    private $host_cv = "localhost";
    private $dbName_cv = "demo_db"; 
    private $username_cv = "root"; 
    private $password_cv = ""; 

    public $conn_cv;

    public function getConnection(){
        try{
            $this->conn_cv = new PDO("mysql:host=".$this->host_cv.";dbname=".$this->dbName_cv,$this->username_cv,$this->password_cv);

        
        }
        catch(PDOException $exception_lv){
            echo "Database Connection Failed: ".$exception_lv->getMessage();
        }  
        return $this->conn_cv; 
    }

        
}

?>
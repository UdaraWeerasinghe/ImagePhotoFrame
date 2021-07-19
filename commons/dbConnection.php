<?php
class dbConnection{ //class for the db
    public $conn;
    private $hostname="localhost"; 
    private $dbusename="root";   //user name
    private $dbpassword="";         //password
    private $db="ipfdb";            //db name
        
    function __construct() {
        $this->conn= new mysqli(
        $this->hostname,
        $this->dbusename,
        $this->dbpassword,        
        $this->db        
                );
       if(!$this->conn->connect_error)
       {
   
        $GLOBALS["con"]=$this->conn;
       }
       else{
            echo "Not Success";
        $GLOBALS["con"]=$this->conn;
       } 
    } 
}


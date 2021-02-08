<?php
include_once '../../commons/dbConnection.php';
$dbConnObj= new dbConnection();

class Module{
    public function  getAllModules($userRole){
        
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM role_module rm,module m WHERE rm.role_id='$userRole' AND rm.module_id=m.module_id";
        $results = $con->query($sql);
        return $results;
    }
}


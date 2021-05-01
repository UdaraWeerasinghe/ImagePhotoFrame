<?php
include_once '../../commons/dbConnection.php';
$dbConnObj= new dbConnection();

class Supplier{
     public function  getSupplierInserId(){ ///get last insert id 
        $con=$GLOBALS['con'];
        $sql="SELECT supplier_id FROM supplier ORDER BY supplier_id DESC LIMIT 1";
        $results = $con->query($sql);
        return $results;
    }
    
     public function  addSupplier($supplierId,$name,$cno,$email,$address){ ////add suplier 
        $con = $GLOBALS['con'];
        $sql = "INSERT INTO supplier(supplier_id,supplier_name,supplier_cno,supplier_email,supplier_address)"
                . "VALUES('$supplierId','$name','$cno','$email','$address')";
        $con->query($sql)or die($con->error);
        return true; 
    }
    
    public function  addSupplierMat($supplierId,$material){ ////add supplier material 
        $con = $GLOBALS['con'];
        $sql = "INSERT INTO supplier_material(supplier_id,material_id) VALUES('$supplierId','$material')";
        $con->query($sql)or die($con->error);
        return true; 
    }
    public function  getSupplier(){ ///get all suplier
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM supplier";
        $results = $con->query($sql);
        return $results;
    }
    
    public function  getSupplierById($supId){ ///get suplier by id
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM supplier WHERE supplier_id='$supId'";
        $results = $con->query($sql);
        return $results;
    }
    public function  getSupplierMaterial($supId){ ///get suplier by id
        $con=$GLOBALS['con'];
        $sql="SELECT sp.material_id, m.material_name FROM supplier_material sp, material m "
                . "WHERE sp.supplier_id='$supId' AND sp.material_id=m.material_id";
        $results = $con->query($sql);
        return $results;
    }
    public function  getMaterialsNotSelect($supId){ ///get materil supplier does not seleted
        $con=$GLOBALS['con'];
        $sql="SELECT material_id FROM material  WHERE material_id NOT IN "
                . "(SELECT material_id FROM supplier_material WHERE supplier_id='$supId')";
        $results = $con->query($sql) or die($con->error);
        return $results;
    }
    
    public function  isValidCno($cno){ ///check cno availble
        $con=$GLOBALS['con'];
        $sql="SELECT 1 FROM supplier WHERE supplier_cno='$cno'";
        $results = $con->query($sql);
        if($results->num_rows>0)
         {
            return true;
         }
         else
          {
             return false;
          }
    }
    public function  isValidEmail($email){ ///check email availble
        $con=$GLOBALS['con'];
        $sql="SELECT 1 FROM supplier WHERE supplier_email='$email'";
        $results = $con->query($sql);
        if($results->num_rows>0)
         {
            return true;
         }
         else
          {
             return false;
          }
    }
    
     public function  isValidUpdateCno($cno,$supId){ ///check cno availble to update
        $con=$GLOBALS['con'];
        $sql="SELECT 1 FROM supplier WHERE supplier_cno='$cno' AND supplier_id!='$supId'";
        $results = $con->query($sql);
        if($results->num_rows>0)
         {
            return true;
         }
         else
          {
             return false;
          }
    }
    public function  isValidUpdateEmail($email,$supId){ ///check email availble to update
        $con=$GLOBALS['con'];
        $sql="SELECT 1 FROM supplier WHERE supplier_email='$email' AND supplier_id!='$supId'";
        $results = $con->query($sql);
        if($results->num_rows>0)
         {
            return true;
         }
         else
          {
             return false;
          }
    }
    
    public function  deactivateCustomer($supId){ ///gdeactivate supplier
        $con=$GLOBALS['con'];
        $sql="UPDATE supplier SET supplier_status='0' WHERE supplier_id='$supId'";
        $results = $con->query($sql);
        return $results;
    }
    public function  activateCustomer($supId){ ///activate suplier
        $con=$GLOBALS['con'];
         $sql="UPDATE supplier SET supplier_status='1' WHERE supplier_id='$supId'";
        $results = $con->query($sql);
        return $results;
    }
    public function  DeleteSupplierMaterial($supId){ ///activate suplier
        $con=$GLOBALS['con'];
        $sql="DELETE FROM supplier_material WHERE supplier_id='$supId'";
        $results = $con->query($sql);
        return $results;
    }
}
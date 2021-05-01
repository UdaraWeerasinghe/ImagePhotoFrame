<?php
include '../model/supplier-model.php'; //include supplier module
$supplierObj=new Supplier();

include '../model/log-model.php';   ///include log model
$logObj= new Log();

$status=$_REQUEST["status"];
switch ($status){
    
        case "addSupplier":
                $name=$_POST["name"];
                $cno=$_POST["cno"];
                $email=$_POST["email"];
                $address=$_POST["address"];
            
            $idResult=$supplierObj->getSupplierInserId();
            $nor=$idResult->num_rows;
                if($nor==0){
                    $newid = "SUP00001";
                }
                else{
                    $idRow=$idResult->fetch_assoc();
                    $lid=$idRow["supplier_id"];
                    $num=substr($lid, 3);
                    $num++;
                    $newid = "SUP".str_pad($num,5,"0",STR_PAD_LEFT);
                }
                $isAdded=$supplierObj->addSupplier($newid, $name, $cno, $email, $address);
                if($isAdded){
                    foreach ($_POST["materialId"] as $m){
                        $supplierObj->addSupplierMat($newid, $m);
                    }
                }
                $name=base64_encode($name);
                $msg= base64_encode("Successfully add to the supplier list");
                
                session_start();
                $userId=$_SESSION["user"]["user_id"];
                $activity="Add new supplier"." ".$newid;
                $logObj->addLog($userId, $activity); //add log
                
                header("Location:../view/supplier.php?alert&type=success&name=$name&msg=$msg");
            break;
            
        ///////////////check existency for add////    
        case "validateCno":
            $isValid=$supplierObj->isValidCno($_POST["cno"]);
            if($isValid=="true"){
                echo 'Exist';
            }else{
                echo 'NotExist';
            }
            break;
            
        case "validateEmail":
            $isValid=$supplierObj->isValidEmail($_POST["email"]);
            if($isValid=="true"){
                echo 'Exist';
            }else{
                echo 'NotExist';
            }
            break;
            ///////////////check existency for add//// 
            ///////////////check existency for update//// 
        case "validateUpdateCno":
            $isValid=$supplierObj->isValidUpdateCno($_POST["cno"],$_POST["supId"]);
            if($isValid=="true"){
                echo 'Exist';
            }else{
                echo 'NotExist';
            }
            break;
            
        case "validateUpdateEmail":
            $isValid=$supplierObj->isValidUpdateEmail($_POST["email"],$_POST["supId"]);
            if($isValid=="true"){
                echo 'Exist';
            }else{
                echo 'NotExist';
            }
            break;
            ///////////////check existency for update//// 
       case "supplierMail":
        $email=$_POST["email"];
        $name=$_POST["name"];
        ?>
        <input type="hidden" name="name" value="<?php echo $name; ?>">
        <label>Email Address</label>
        <input class="form-control mb-4" type="text" name="email" value="<?php echo $email ?>" readonly="readonly">
        <div>
            <label>Subject</label>
            <input class="form-control mb-4" type="text" id="subject" name="subject" placeholder="Enter the subject of Email...">
            <div class="invalid-tooltip" id="subjectTooltip" style="position: relative; top: -10px"></div>
        </div>
        <label>Body</label>
        <textarea class="form-control" name="body" id="body" style="height: 150px;">Dear <?php echo $name; ?>,</textarea>
          <div class="invalid-tooltip" id="bodyTooltip" style="position: relative;"></div>
          <?php
        break;
    
    case "sendMail":
        $email=$_POST["email"];
        $subject=$_POST["subject"];
        $body=$_POST["body"];
        
        session_start();
        $userId=$_SESSION["user"]["user_id"];
        $activity="Sent email to supplier "." ".$email;
        $logObj->addLog($userId, $activity); //add log
        
        require '../../includes/phpMailer-header.php';

        $mail->setFrom('imagephotoframs@gmail.com');
        $mail->addAddress($email);     
        $mail->addReplyTo('imagephotoframs@gmail.com', 'Information');


        $mail->isHTML(FALSE);                                  
        $mail->Subject = $subject;
        $mail->Body    = $body;
        $mail->AltBody = $body;
        
        $name= base64_encode($_POST["name"]);
        $msg= base64_encode("Successfully Sent Email To");
        
        if ($mail->Send()) { 
            header("Location:../view/supplier.php?alert&type=success&name=$name&msg=$msg"); 
            }
            else{
                echo $mail->ErrorInfo;
            }
        break;
        
    case "devactivateSupplier":
        $supplierObj->deactivateCustomer($_REQUEST["supId"]);
        $email= $_REQUEST["email"];
        $name= base64_encode($_REQUEST["name"]);
        $msg= base64_encode("Successfully Deactivated");
        
        session_start();
        $userId=$_SESSION["user"]["user_id"];
        $activity="Deactivate supplier "." ".$_REQUEST["supId"];
        $logObj->addLog($userId, $activity); //add log
        
        header("Location:../view/supplier.php?alert&type=success&name=$name&msg=$msg");
        break;
    
     case "activateSupplier":
        $supplierObj->activateCustomer($_REQUEST["supId"]);
        $email= $_REQUEST["email"];
        $name= base64_encode($_REQUEST["name"]);
        $msg= base64_encode("Successfully Activated");
        
        session_start();
        $userId=$_SESSION["user"]["user_id"];
        $activity="Activate supplier "." ".$_REQUEST["supId"];
        $logObj->addLog($userId, $activity); //add log
        
        header("Location:../view/supplier.php?alert&type=success&name=$name&msg=$msg");
        break;
    case "updateSupplier":
        $result=$supplierObj->DeleteSupplierMaterial($_POST["supId"]);
                if($result){
                    foreach ($_POST["materialId"] as $m){
                        $supplierObj->addSupplierMat($_POST["supId"], $m);
                    }
                }
        $msg= base64_encode("Successfully Updated");
        $supId= base64_encode($_POST["supId"]);
        
        session_start();
        $userId=$_SESSION["user"]["user_id"];
        $activity="Update supplier "." ".$_POST["supId"];
        $logObj->addLog($userId, $activity); //add log
        
        header("Location:../view/view-supplier.php?sup_id=$supId&alert&type=success&name=$name&msg=$msg");
        break;
}
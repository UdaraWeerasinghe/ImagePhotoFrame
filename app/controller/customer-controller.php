<?php
include '../model/customer-model.php';  //iclude customer model
$customerObj=new Customer();                  //create custemr object

include '../model/log-model.php';
$logObj= new Log();

$status=$_REQUEST["status"];
switch ($status){
    
    case "blockCustomer":
        $customerObj->blockCustomer($_REQUEST["customerId"]);
        
        session_start();
        $userId=$_SESSION["user"]["user_id"];
        $activity="Block customer"." ".$_REQUEST["customerId"];
        $logObj->addLog($userId, $activity); //add log
        
        $email= $_REQUEST["email"];
        $name= base64_encode($_REQUEST["name"]);
        $msg= base64_encode("Successfully Blocked");
        
        require '../../includes/phpMailer-header.php';

        $mail->setFrom('imagephotoframs@gmail.com');
        $mail->addAddress($email);     
        $mail->addReplyTo('imagephotoframs@gmail.com', 'Information');


        $mail->isHTML(FALSE);                                  
        $mail->Subject = 'Ban notice';
        $mail->Body    = 'You have been banned form Image Photo Frame';
        $mail->AltBody = 'You have been banned form Image Photo Frame';

//        $mail->AddEmbeddedImage('../../images/system/icon.jpg', 'icon');

        if ($mail->Send()) { 
            header("Location:../view/customer.php?alert&type=success&name=$name&msg=$msg");  
            }
            else{
                echo $mail->ErrorInfo;
            }

        break;
    
    case "unBlockCustomer":
        $customerObj->unBlockCustomer($_REQUEST["customerId"]);
        session_start();
        $userId=$_SESSION["user"]["user_id"];
        $activity="Unblack customer"." ".$_REQUEST["customerId"];
        $logObj->addLog($userId, $activity); //add log
        
        $email= $_REQUEST["email"];
        $name= base64_encode($_REQUEST["name"]);
        $msg= base64_encode("Successfully unblocked");
        $customerObj->unBlockCustomer($_REQUEST["customerId"]);
        $name= base64_encode($_REQUEST["name"]);
        $msg= base64_encode("Successfully Blocked");
        
        require '../../includes/phpMailer-header.php';

        $mail->setFrom('imagephotoframs@gmail.com');
        $mail->addAddress($email);     
        $mail->addReplyTo('imagephotoframs@gmail.com', 'Information');


        $mail->isHTML(FALSE);                                  
        $mail->Subject = 'Unblocked notice';
        $mail->Body    = 'You have been unblocked form Image Photo Frame';
        $mail->AltBody = 'You have been unblocked form Image Photo Frame';

//        $mail->AddEmbeddedImage('../../images/system/icon.jpg', 'icon');

        if ($mail->Send()) { 
            header("Location:../view/customer.php?alert&type=success&name=$name&msg=$msg"); 
            }
            else{
                echo $mail->ErrorInfo;
            }
        break;
        
    case "CustomerMail":
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
    
    case "sendCustomerMail":
        $email=$_POST["email"];
        $subject=$_POST["subject"];
        $body=$_POST["body"];
        
        session_start();
        $userId=$_SESSION["user"]["user_id"];
        $activity="Sent email to customer";
        $logObj->addLog($userId, $activity); //add log
        
        require '../../includes/phpMailer-header.php';

        $mail->setFrom('imagephotoframs@gmail.com');
        $mail->addAddress($email);     
        $mail->addReplyTo('imagephotoframs@gmail.com', 'Information');


        $mail->isHTML(FALSE);                                  
        $mail->Subject = $subject;
        $mail->Body    = $body;
        $mail->AltBody = $body;
        
        $name= base64_encode($_REQUEST["name"]);
        $msg= base64_encode("Successfully Sent");
        
        if ($mail->Send()) { 
            header("Location:../view/customer.php?alert&type=success&name=$name&msg=$msg"); 
            }
            else{
                echo $mail->ErrorInfo;
            }
        break;
}

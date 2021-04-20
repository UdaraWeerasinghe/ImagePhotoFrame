<?php
include '../model/customer-model.php';  //iclude customer model
$customerObj=new Customer();                  //create custemr object

$status=$_REQUEST["status"];
switch ($status){
    
    case "blockCustomer":
        $customerObj->blockCustomer($_REQUEST["customerId"]);
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
        <label>Email Address</label>
        <input class="form-control mb-4" type="text" name="email" value="<?php echo $email ?>" readonly="readonly">
        <label>Subject</label>
        <input class="form-control mb-4" type="text" name="subject" placeholder="Enter the subject of Email...">
        <label>Body</label>
        <textarea class="form-control" name="body" style="height: 150px;">Dear <?php echo $name; ?>,</textarea>
          
          <?php
        break;
    
    case "sendCustomerMail":
        $email=$_POST["email"];
        $subject=$_POST["subject"];
        $body=$_POST["body"];
        
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

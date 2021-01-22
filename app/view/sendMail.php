<?php                       
require '../../includes/phpMailer-header.php';

    $mail->setFrom('imagephotoframs@gmail.com');
    $mail->addAddress('udaraw1997@gmail.com');     
    $mail->addReplyTo('imagephotoframs@gmail.com', 'Information');

    $mail->isHTML(true);                                  
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';

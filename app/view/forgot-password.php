<?php
session_start();
if(isset($_SESSION['user'])){
    header("Location: ../view/dashboard.php");
}?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link type="text/css" rel="stylesheet" href="../../bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="../../fontawesome-pro-5.13.0-web/css/all.css">
        <link type="text/css" rel="stylesheet" href="../../css/style.css">

    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row" style="background-color: #173F5F; padding: 10px 10px 10px 0px">
                        <div class="col-12">
                            <h3 style="color: white;font-family: Cooper Std Black; text-align: center; margin-top: 10px;">IMAGE PHOTO FRAMES</h3></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row"   style="margin-top: 60px;">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <h4 align="center">Reset your password</h4>
                    <div class="card bg-light" style="padding: 20px;">
                        <form id="forgotPassword" method="post" action="../controller/login-controller.php?status=checkEmail"  class="needs-validation" novalidate>
                            <label style="font-weight:bold; font-size: 14px;">Enter your user account's verified email address and we will send you a password reset link.</label><br>
                            
                            <?php if(isset($_REQUEST["warning"])){
                                ?>
                            <input class="form-control" style="border: #dc3545E6 solid 1px;" 
                                   id="email" name="email" 
                                   value="<?php echo base64_decode($_REQUEST["warning"]); ?>" 
                                   type="email">
                            <div class="form-control" id="email-invalid" 
                                 style="margin-top: 3px;height: 30px; color: white; 
                                 background-color: #dc3545E6; font-size: 14px; 
                                 padding: 2px 0px 2px 5px;">
                                That address is not a verified email!
                            </div>
                            <?php
                            }else{
                                ?>
                            <input class="form-control" id="email" name="email" type="email">
                            <?php
                            }
                            ?>
                            <div style="position: inherit" class="invalid-tooltip">Plase enter the email address!</div>
                        <input type="submit" value="Send password reset email" class="btn btn-success form-control" style="margin-top: 10px;">
                        </form>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>    
    </body>
    <script type="text/javascript" src="../../js/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="../../bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../js/login-validation.js"></script>
</html>

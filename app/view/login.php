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
                            <h3 style="color: white;font-family: Cooper Std Black; text-align: center; margin-top: 10px;">
                                IMAGE PHOTO FRAMES
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row"   style="margin-top: 60px;">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <h4 align="center">User Login</h4>
                    <div class="card bg-light" style="padding: 20px;">
                        <form id="login" method="post" enctype="multipart/form-data" 
                              action="../controller/login-controller.php?status=login"  
                              class="needs-validation" novalidate>
                            <div>
                                <label>User Name</label><br>
                                <input class="form-control" name="uName" id="uName" 
                                       type="text" placeholder="Enter user name...">
                                <div style="position: inherit" class="invalid-tooltip">
                                    Plase enter the user name
                                </div>
                            </div>
                            <div>
                                <label>Password:</label>
                                <input class="form-control" name="password" id="password" 
                                       type="password" placeholder="Enter your password...">
                                <div style="position: inherit" class="invalid-tooltip">
                                    Plase enter the password
                                </div>
                            </div>
                            <?php
                            if(isset($_REQUEST["warning"])){
                                ?>
                            <div class="form-control" id="warningMsg" 
                                 style="margin-top: 3px;height: 30px; color: white; background-color: #dc3545E6; 
                                 font-size: 14px; padding: 2px 0px 2px 5px;">
                                User name and password does not match
                            </div>
                            <?php
                            }
                            ?>
                                <a style="font-size: 12px;" href="forgot-password.php">
                                    Forgot Password?
                                </a>
                            <input type="submit" value="Login" class="btn btn-primary form-control"
                                   style="margin-top: 10px;">
                        </form>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>  
     <script type="text/javascript" src="../../js/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="../../bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../js/login-validation.js"></script>
    </body>
</html>

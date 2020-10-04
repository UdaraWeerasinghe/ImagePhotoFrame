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
        <script type="text/javascript" src="../../js/jquery-3.5.1.js"></script>
        <link type="text/css" rel="stylesheet" href="../../bootstrap/css/bootstrap.css">
        <script type="text/javascript" src="../../bootstrap/js/bootstrap.min.js"></script>
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
        <div class="container-fluid">
            <div class="row" style="margin-top: 50px;">
                <div class="col-md-3"></div>
                <div class="col-md-6 border" style="padding: 20px;">
                    <h4 align="center">User Login</h4>
                    <form method="post" action="../controller/login-controller.php?status=login">
                    <label>User Name:</label><br>
                    <input class="form-control" name="uName" type="text" placeholder="Enter user name..">
                    <label>Password:</label>
                    <input class="form-control" name="password" type="password" placeholder="Enter password..">
                    <input type="submit" value="Login" class="btn btn-primary form-control" style="margin-top: 20px;">
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>    
    </body>
</html>

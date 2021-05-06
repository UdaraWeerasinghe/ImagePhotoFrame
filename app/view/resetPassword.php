<?php
if(isset($_REQUEST["key"])){
    $login_id= base64_decode($_REQUEST["key"]);
?>
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
        <div class="container">
            <div class="row"   style="margin-top: 60px;">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <h4 align="center">Change Password</h4>
                    <div class="card bg-light" style="padding: 20px;">
                        <form id="reset" method="post" action="../controller/login-controller.php?status=resetPassword">
                        <label>New password</label><br>
                        <div>
                        <input class="form-control" name="password1" id="password1" type="password" placeholder="">
                        <div class="invalid-tooltip"style="position: inherit">Please enter new password</div>
                        </div>
                        <label>Confirm Password:</label>
                        <div>
                        <input class="form-control" name="password2" id="password2" type="password" placeholder="">
                        <div class="invalid-tooltip"id="password2Tolltip"style="position: inherit"></div>
                        </div>
                        <input type="hidden" value="<?php echo $login_id ?>" name="login_id">
                        <input type="submit" value="Change Password" class="btn btn-success form-control" style="margin-top: 10px;">
                        </form>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>  
        <script type="text/javascript" src="../../js/sweetalert2.js"></script>
        <script>
            $("#reset").submit(function (){
                var password1=$("#password1").val();
                var password2=$("#password2").val();
                
                if(password1==""){
                    $("#password1").addClass("is-invalid");
                    return false;
                }else{
                    $("#password1").addClass("is-valid");
                }
                if(password2==""){
                    $("#password2").addClass("is-invalid");
                    $("#password2Tolltip").html("please enter confirm password");
                    return false;
                }else{
                    $("#password2").addClass("is-valid");
                    $("#password2").html("");
                }
                if(password1==password2){
                     $("#password2").addClass("is-valid");
                }else{
                    $("#password2").addClass("is-invalid");
                    $("#password2Tolltip").html("Password does not match");
                    return false;
                    
                }
                
                
            });
        </script>
    </body>
</html>

  <?php      
    }else{
        echo 'Somthing went wron';
    }


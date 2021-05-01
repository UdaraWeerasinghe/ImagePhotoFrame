<?php include '../../commons/session.php'; //incude session
$userRole=$_SESSION["user"]["role_id"];
$userId=$_SESSION["user"]["user_id"];

if(isset($_GET["alert"])){
        ?>
        <input type="hidden" id="alert" value="<?php echo $_REQUEST["type"]?>">
        <input type="hidden" id="msg" value="<?php echo base64_decode($_REQUEST["msg"])?>">
    <?php
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link type="text/css" rel="stylesheet" href="../../bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="../../fontawesome-pro-5.13.0-web/css/all.css">
        <link type="text/css" rel="stylesheet" href="../../css/style.css">

        <?php include_once '../../commons/dbConnection.php'; 
        
        include '../model/module-model.php';
            $moduleObj = new Module();
            $moduleResult=$moduleObj->getAllModules($userRole); //load module releted to the user role
           
            include '../model/user-model.php';
            $userObj= new User();
            $userResult=$userObj->viewUser($userId);
            $uRow=$userResult->fetch_assoc();
            ?>
    </head>
    <body>
        
        <?php include 'dashboard-header.php'; ?>
        
        <div style="flex-wrap: wrap; display: flex;">
            <div id="sidemenu" class="sidemenu">
                <a href="dashboard.php" style="text-decoration: none;">
                    <div class="module">
                        <i class="fas fa-tachometer-alt-fast">&nbsp;&nbsp;</i>
                         <span class="module-name">Dashboard</span>
                    </div>
                </a>
                <?php
                 while ($row=$moduleResult->fetch_assoc()){    ///display user module
                                  ?>
                <a href="<?php echo $row["module_url"]; ?>" style="text-decoration: none;">
                    <div class="module">
                        <i class="<?php echo $row["module_class"]; ?> ">&nbsp;&nbsp;</i>
                         <span class="module-name"> <?php echo $row["module_name"];?> </span>
                    </div>
                </a>

                 <?php }?>
            </div>
            <div class="dashbord-body" id="dashbord-body" style="height: 800px;">
                <div class="container">
                    <div style="background-color: #4b778d; padding: 30px;
                             border-radius: 20px; margin: 20px 0px 0px 0px;">
                        <div class="row ">
                            <div class="col-md-3" style="padding-right: 20px;">
                                <img height="200px" width="200px" style="border-radius: 50%"
                                     src="../../images/user_image/<?php echo $uRow["user_image"] ?>">
                            </div>
                            <div class="col-md-9" style="padding: 50px 0px 0px 0px;">
                                <h3 style="color: white">
                                    <?php echo $uRow["user_fname"]." ".$uRow["user_lname"]; 
                                    echo '<br>'; echo "(".$uRow["role_name"].")"?>
                                </h3>
                            </div>
                        </div>
                        <div class="row mb-4" style="padding: 0px 0px 0px 80px;">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-5">
                                <label style="color: white; font-size: 18px">
                                    <b>Email : </b><?php echo $uRow["user_email"]?>
                                </label>
                            </div>
                            
                            <div class="col-sm-5">
                                <label style="color: white; font-size: 18px">
                                    <b>Contact No : </b><?php echo $uRow["user_cno"]?>
                                </label>
                            </div>
                        </div>
                        <div class="row mb-4" style="padding: 0px 0px 0px 80px;">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-5">
                                <label style="color: white; font-size: 18px">
                                    <b>Date of birth : </b><?php echo $uRow["user_dob"]?>
                                </label>
                            </div>
                            <div class="col-sm-5">
                                <label style="color: white; font-size: 18px">
                                    <b>NIC : </b><?php echo $uRow["user_nic"]?>
                                </label>
                            </div>
                        </div>
                        <div class="row" style="padding: 0px 0px 0px 80px;">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-5">
                                <label style="color: white; font-size: 18px">
                                    <b>Gender : </b>
                                        <?php 
                                        if($uRow["user_gender"]=="1"){
                                        echo "Male";
                                        }else{
                                            echo "Female";
                                        }
                                        ?>
                                </label>
                            </div>
                            <div class="col-sm-5"> 
                                 <label style="color: white; font-size: 18px">
                                    <b>Address : </b><?php echo $uRow["user_address"]?>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12" style="text-align: end; padding-right: 50px;">
                                <a href="update-profile.php" class="btn btn-warning"><i class="far fa-pencil-alt"></i>&nbsp;Update Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         
        </div>   
         <script type="text/javascript" src="../../js/jquery-3.5.1.js"></script>
         <script type="text/javascript" src="../../bootstrap/js/bootstrap.min.js"></script>
         <script type="text/javascript" src="../../js/sweetalert2.js"></script>
         <script type="text/javascript" src="../../js/change-password-validation.js"></script>
        <script src="../../js/jsStyle.js"></script>
        
        <script>
           //sweet alert for operations
            $(document).ready(function() {
                var alert = $("#alert").val();
                var msg = $("#msg").val();
                if(alert=="success"){
                  Swal.fire({
                position: 'center',
                icon: alert,
                title: 'Successfull!',
                text: msg,
                showConfirmButton: false,
                timer: 2000
              });   
            } 
        });
        //sweetAlert trime
        var url = window.location.href;
        var splitUrl = url.split('?')[0];
        var newSplitUrl = splitUrl.split('localhost')[1];
        window.history.pushState({}, document.title, "" + newSplitUrl);
        //sweetAlert trime
        </script>
    </body>
</html>


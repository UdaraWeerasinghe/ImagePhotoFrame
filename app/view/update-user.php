<?php include '../../commons/session.php'; 
$userRole=$_SESSION["user"]["role_id"];
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script type="text/javascript" src="../../js/jquery-3.5.1.js"></script>
        <link type="text/css" rel="stylesheet" href="../../bootstrap/css/bootstrap.css">
        <script type="text/javascript" src="../../bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../../fontawesome-pro-5.13.0-web/css/all.css">
        <link type="text/css" rel="stylesheet" href="../../css/style.css">

        <?php include_once '../../commons/dbConnection.php'; 
        
        include '../model/module-model.php';
            $moduleObj = new Module();
            $moduleResult=$moduleObj->getAllModules($userRole);
            
            include '../model/user-model.php';
            $userObj = new User();
            $userResult=$userObj->getAllUserWithRole();
            $roleResult=$userObj->getAllRole();
            $userId=$_REQUEST["userId"];
            $viewUser=$userObj->viewUser($userId);
            $uRow=$viewUser->fetch_assoc()
            
        ?>
    </head>
    <body>
        
        <?php include 'dashboard-header.php'; ?>
        
        <div style="flex-wrap: wrap; display: flex;">
            <div id="sidemenu" class="sidemenu">
                <a href="dashboard.php" style="text-decoration: none;">
                    <div class="module module">
                        <i class="fas fa-tachometer-alt-fast">&nbsp;&nbsp;</i>
                         <span class="module-name">Dashboard</span>
                    </div>
                </a>
                <?php
                 while ($row=$moduleResult->fetch_assoc()){
                                  ?>
                <a href="<?php echo $row["module_url"]; ?>" style="text-decoration: none;">
                    <div class="module <?php
                            if($row["module_id"]=='1'){
                                echo 'module-active';
                            }
                            ?>">
                        <i class="<?php echo $row["module_class"]; ?> ">&nbsp;&nbsp;</i>
                         <span class="module-name"> <?php echo $row["module_name"];?> </span>
                    </div>
                </a>

                 <?php }?>
            </div>
            <div class="dashbord-body" id="dashbord-body">
                <h3 style="text-align: center; margin-top: 10px;">User Management</h3>
                <ul class="nav nav-tabs">
                  <li class="nav-item">
                      <a class="nav-link" href="user.php">All Users</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="#add-user">Add User</a>
                  </li>
                </ul>
                
                <div class="container">
                    <div style="background-color: #4b778d; padding: 30px;
                             border-radius: 20px; margin: 20px 0px 0px 0px;">
                        <form id="updateUser" enctype="multipart/form-data" method="post">
                            <input type="hidden" name="userId" value="<?php echo $userId; ?>">
                        <div class="row ">
                            <div class="col-md-3">
                                <span class="btn" style="position: relative;overflow: hidden; height:200px; 
                                      width:200px; border-radius: 50%;">
                                    <img id="img_prev" height="200px" width="200px" style="border-radius: 50%;
                                         position: absolute; right: 0px; "
                                         src="../../images/user_image/<?php echo $uRow['user_image']; ?>">
                                    <span style="width: 184px; height: 50px; background-color: #4b778d; opacity: 75%;
                                          position: absolute; bottom: 0px; right:10px;">
                                        <i class="fas fa-camera-retro fa-2x" style="color: white; margin-top: 8px;"></i>
                                    </span>
                                    <input type="file" id="user_img" name="user_img" onchange="readURL(this)"
                                           style="position: absolute;top: 6px;
                                           right: 0px;
                                           width: 200px; height: 200px;
                                           border-radius: 50%;cursor: inherit;opacity: 0;">
                                </span>
                                
                            </div>
                            <div class="col-md-9" style="padding: 50px 0px 0px 0px;">
                                <div class="row mb-4" style="padding: 0px 15px 0px 0px">
                                    <div class="col-sm-6">
                                        <label style="color: white; font-size: 18px">
                                            <b>First Name : </b>
                                        </label>
                                        <input type="text" name="fName" id="fName" 
                                               class="form-control" value="<?php echo $uRow["user_fname"]; ?>">
                                        <div id="fnameTooltip" style="position: absolute;width: 92%; left: 16px" class="invalid-tooltip"></div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label style="color: white; font-size: 18px">
                                            <b>Last Name : </b>
                                        </label>
                                        <input type="text" name="lName" id="lName" class="form-control"
                                               value="<?php echo $uRow["user_lname"]; ?>">
                                        <div id="lnameTooltip" style="position: absolute;width: 92%; left: 16px" class="invalid-tooltip"></div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                  
                                    <div class="col-sm-6">
                                        <label style="color: white; font-size: 18px">
                                            <b>Email : </b>
                                        </label>
                                        <input class="form-control" id="email" name="email" id="email"
                                               value="<?php echo $uRow["user_email"]; ?>">
                                        <div id="emailTooltip" style="position: absolute;width: 92%; left: 16px" class="invalid-tooltip"></div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label style="color: white; font-size: 18px">
                                            <b>Contact No : </b>
                                        </label>
                                        <input class="form-control" name="cn" id="cn" value="<?php echo $uRow["user_cno"]; ?>">
                                        <div id="cnoTooltip" style="position: absolute;width: 92%; left: 16px" class="invalid-tooltip"></div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-sm-6">
                                        <label style="color: white; font-size: 18px">
                                            <b>User Role : </b>
                                        </label>
                                        <select id="uRole" name="uRole" class="form-control">
                                                    <option value="<?php echo $uRow["role_id"]; ?>"><?php echo $uRow["role_name"]; ?></option>
                                                    <?php
                                                    while ($role=$roleResult->fetch_assoc()){
                                                    ?>
                                                    <option value="<?php echo $role["role_id"]; ?>"><?php echo $role["role_name"]; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                        </select>
                                        <div id="uRoleTooltip" style="position: absolute;width: 92%; left: 16px" class="invalid-tooltip"></div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label style="color: white; font-size: 18px">
                                            <b>NIC : </b>
                                        </label>
                                        <input class="form-control" name="nic" id="nic" value="<?php echo $uRow["user_nic"]; ?>">
                                        <div id="nicTooltip" style="position: absolute;width: 92%; left: 16px" class="invalid-tooltip"></div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-sm-6">
                                        <label style="color: white; font-size: 18px">
                                            <b>Date of birth : </b>
                                        </label>
                                        <input class="form-control" name="dob" id="dob" type="date" value="<?php echo $uRow["user_dob"]; ?>">
                                        <div id="dobTooltip" style="position: absolute;width: 92%; left: 16px" class="invalid-tooltip"></div>
                                    </div>
                                    <div class="col-sm-6"> 
                                         <label style="color: white; font-size: 18px">
                                            <b>Gender : </b>
                                         </label><br>
                                         <div style="padding-left: 90px;">
                                               <?php
                                        if($uRow['user_gender']==1){
                                            ?>
                                            <input type="radio" id="gender" name="gender" checked="" value="1"/>&nbsp;
                                            <label class="control-label">Male</label>
                                            &nbsp;
                                        <input type="radio" id="gender" name="gender" value="0" />&nbsp;
                                        <label class="control-label">Female</label>
                                            <?php
                                        }
                                        else {
                                            ?>
                                        <input type="radio" id="gender" name="gender"  value="1"/>&nbsp;
                                        <label class="control-label">Male</label>
                                        &nbsp;
                                        <input type="radio" id="gender" name="gender" checked="" value="0" />&nbsp;
                                        <label class="control-label">Female</label>
                                        <?php
                                        }
                                        ?>
                                         </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label style="color: white; font-size: 18px">
                                            <b>Address : </b>
                                        </label>
                                        <textarea class="form-control" name="address" id="address"><?php echo $uRow["user_address"]; ?></textarea>
                                        <div id="addressTooltip" style="position: absolute;width: 92%; left: 16px" class="invalid-tooltip"></div>
                                    </div>
                                    <div class="col-sm-5"> 

                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-12" style="text-align: end; padding: 15px 15px 0px 0px;">
                                <button type="submit" class="btn btn-warning"><i class="far fa-pencil-alt"></i>Update</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>

            </div>
         
        </div>  
        <script type="text/javascript" src="../../js/jquery-3.5.1.js"></script>
        <script type="text/javascript" src="../../js/sweetalert2.js"></script>
        <script type="text/javascript" src="../../bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../../js/addUser-validation.js"></script>
        <script src="../../js/jsStyle.js"></script>
        <script type="text/javascript" src="../../js/change-password-validation.js"></script>
        <script type="text/javascript">
      
        function readURL(input) {
        if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#img_prev')
            .attr('src', e.target.result)
            .height(200)
            .width(200);
        };

        reader.readAsDataURL(input.files[0]);
    }
}   
        </script>
        
    </body>
</html>


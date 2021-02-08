<?php include '../../commons/session.php'; 
$userRole=$_SESSION["user"]["role_id"];?>
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
            <div class="dashbord-body" id="dashbord-body" style="flex: 70%; height: 800px;">
                <h3 style="text-align: center; margin-top: 20px;">Update User</h3><hr>
           <div class="container mt-3">
                    <div id="add-user" class="container "><br>
                        <div class="row">
                            <div style="text-align: center" class="col-12"> 
                            </div> 
                        </div>
                      <div class="row">
                            <div style="text-align: center" class="col-12" id="vAlert"> 
                            </div> 
                        </div>
                        
                            <?php
                         while ($uRow=$viewUser->fetch_assoc()){
                             ?>
                               <form id="addUser" enctype="multipart/form-data" method="post" action="../controller/user-controller.php?status=updateUser">
                                   <input name="userId" value="<?php echo $userId; ?>" type="hidden">
                                <div class="row" style="margin-top: 10px;">
                                    <div class="col-md-2">
                                        <label>First Name</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" id="fName" name="fName" value="<?php echo $uRow["user_fname"]; ?>" class="form-control">
                                    </div>
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2">
                                        <label>Last Name</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" id="lName" name="lName" value="<?php echo $uRow["user_lname"]; ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 10px;"><div class="col-12">&nbsp;</div></div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="email" id="email" name="email" value="<?php echo $uRow["user_email"]; ?>" class="form-control">
                                    </div>
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2">
                                        <label>Contact Number</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" id="cn" name="cn" value="<?php echo $uRow["user_cno"]; ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 10px;"><div class="col-12">&nbsp;</div></div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <label>Date Of Birth</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="date" id="dob" name="dob" value="<?php echo $uRow["user_dob"]; ?>" class="form-control">
                                    </div>
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2">
                                        <label>User NIC</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" id="nic" name="nic" value="<?php echo $uRow["user_nic"]; ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 10px;"><div class="col-12">&nbsp;</div></div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <label>User Role</label>
                                    </div>
                                    <div class="col-md-3">
                                        <select id="uRole" name="uRole"  class="form-control">
                                            <option value="<?php echo $uRow["role_id"]; ?>"><?php echo $uRow["role_name"]; ?></option>
                                            <?php
                                            while ($role=$roleResult->fetch_assoc()){
                                            ?>
                                            <option value="<?php echo $role["role_id"]; ?>"><?php echo $role["role_name"]; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2">
                                           <label>gender</label>
                                    </div>
                                    <div class="col-md-3">
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
                                <div class="row" style="margin-top: 10px;"><div class="col-12">&nbsp;</div></div>
                                <div class="row">
                                    <div class="col-md-2">
                                        
                                    </div>
                                    <div class="col-md-3">
                                        
                                    </div>
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2">
                                        <label>User Image</label>
                                    </div>
                                    <div class="col-md-3">
                                        <img id="img_prev" width="100px" height="100px" src="../../images/user_image/<?php echo $uRow['user_image']; ?>">
                                        <input type="file" id="user_img" name="user_img" onchange="readURL(this)" class="form-control">
                                         <img >
                                    </div>
                                </div>
                                 <div class="row" style="margin-top: 10px;"><div class="col-12">&nbsp;</div></div>
                                <div class="row">
                                    <div class="col-md-12" style="text-align: end">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </form>
                         <?php } ?>
                          
                </div>
              </div>
         
                
            </div>
         
        </div>   
        <script type="text/javascript" src="../../js/user-validation.js"></script>
        <script src="../../js/jsStyle.js"></script>
        <script type="text/javascript">
      
        function readURL(input) {
        if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#img_prev')
            .attr('src', e.target.result)
            .height(100)
            .width(100);
        };

        reader.readAsDataURL(input.files[0]);
    }
}   
        </script>
        
    </body>
</html>

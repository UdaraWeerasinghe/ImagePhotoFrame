<?php include '../../commons/session.php'; ?>
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
            $moduleResult=$moduleObj->getAllModules();
            
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
            <div class="dashbord-body" style="flex: 70%; height: 800px;">
                <h3 style="text-align: center; margin-top: 20px;">View User</h3><hr>
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
                                <div class="row" style="margin-top: 10px;">
                                    <div class="col-md-2">
                                        <label>First Name</label>
                                    </div>
                                    <div class="col-md-3">
                                        <label style="font-weight: bold"><?php echo $uRow["user_fname"]; ?></label>
                                    </div>
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2">
                                        <label>Last Name</label>
                                    </div>
                                    <div class="col-md-3">
                                        <label style="font-weight: bold"><?php echo $uRow["user_lname"]; ?></label>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 10px;"><div class="col-12">&nbsp;</div></div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-md-3">
                                        <label style="font-weight: bold"><?php echo $uRow["user_email"]; ?></label>
                                    </div>
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2">
                                        <label>Contact Number</label>
                                    </div>
                                    <div class="col-md-3">
                                        <label style="font-weight: bold"><?php echo $uRow["user_cno"]; ?></label>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 10px;"><div class="col-12">&nbsp;</div></div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <label>Date Of Birth</label>
                                    </div>
                                    <div class="col-md-3">
                                        <label style="font-weight: bold"><?php echo $uRow["user_dob"]; ?></label>
                                    </div>
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2">
                                        <label>User NIC</label>
                                    </div>
                                    <div class="col-md-3">
                                        <label style="font-weight: bold"><?php echo $uRow["user_nic"]; ?></label>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 10px;"><div class="col-12">&nbsp;</div></div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <label>User Role</label>
                                    </div>
                                    <div class="col-md-3">
                                        <label style="font-weight: bold"><?php echo $uRow["role_name"]; ?></label>
                                    </div>
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2">
                                           <label>gender</label>
                                    </div>
                                    <div class="col-md-3">
                                        <label style="font-weight: bold">
                                            <?php 
                                        if($uRow["user_gender"]==1){
                                            echo 'Male';
                                        }
                                        else{
                                            echo 'Female';
                                        }
                                        ?>
                                        </label>
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
                                        <img width="100px" height="100px" src="../../images/user_image/<?php echo $uRow['user_image']; ?>">
                                    </div>
                                </div>
                                 <div class="row" style="margin-top: 10px;"><div class="col-12">&nbsp;</div></div>
                                <div class="row">
                                    <div class="col-md-12" style="text-align: end">
                                        <a href="update-user.php?userId=<?php  echo $userId;?>" class="btn btn-warning">Update</a>
                                    </div>
                                </div>
                         <?php } ?>
                          
                </div>
              </div>
         
                
            </div>
         
        </div>   
        <script type="text/javascript" src="../../js/user-validation.js"></script>
        <script src="../../js/jsStyle.js"></script>
        
    </body>
</html>

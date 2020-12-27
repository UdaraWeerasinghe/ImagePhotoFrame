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
                <h3 style="text-align: center; margin-top: 10px;">User Management</h3>
                <div style="padding: 10px;">
                    <div class="row">
                        <div class="col-12"style="background-color: #f5f6f8;padding: 5px;">
                            <a href="dashboard.php">Dashboard</a>/<a href="user.php">User</a>/<a href="add-user.php">Add User</a>
                        </div>
                    </div>
                </div>
                <ul class="nav nav-tabs">
                  <li class="nav-item">
                      <a class="nav-link" href="user.php">All Users</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link"  href="#active-users">Active Users</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#deactive-users">Deactive Users</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="#add-user">Add User</a>
                  </li>
                </ul>

                    <div id="add-user" class="container "><br>
                       <?php
                        if(isset($_GET["msg"])){
                            ?>
                        <div class="row">
                            <div style="text-align: center" class="col-12">
                                <div class="alert alert-danger">
                                    <?php
                        
                                        $msg=$_REQUEST["msg"];
                                        $msg=  base64_decode($msg);
                                        echo $msg;
                                        ?>
                                </div>
                            </div> 
                        </div>
                        <?php
                        }
                        ?>
                        <div class="row">
                            <div style="text-align: center" class="col-12"> 
                            </div> 
                        </div>
                      <div class="row">
                            <div style="text-align: center" class="col-12" id="vAlert"> 
                            </div> 
                        </div>
                        <form id="addUser" enctype="multipart/form-data" method="post" action="../controller/user-controller.php?status=addUser">

                                <div class="row" style="margin-top: 10px;">
                                    <div class="col-md-2">
                                        <label>First Name</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" id="fName" name="fName" class="form-control">
                                    </div>
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2">
                                        <label>Last Name</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" id="lName" name="lName" class="form-control">
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 10px;"><div class="col-12">&nbsp;</div></div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="email" id="email" name="email" class="form-control">
                                    </div>
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2">
                                        <label>Contact Number</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" id="cn" name="cn" class="form-control">
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 10px;"><div class="col-12">&nbsp;</div></div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <label>Date Of Birth</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="date" id="dob" name="dob" class="form-control">
                                    </div>
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2">
                                        <label>User NIC</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" id="nic" name="nic" class="form-control">
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 10px;"><div class="col-12">&nbsp;</div></div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <label>User Role</label>
                                    </div>
                                    <div class="col-md-3">
                                        <select id="uRole" name="uRole" class="form-control">
                                            <option value="">---</option>
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
                                        <input type="radio" id="gender" name="gender" value="1"/>&nbsp;
                                        <label class="control-label">Male</label>
                                        &nbsp;
                                        <input type="radio" id="gender" name="gender" value="0" />&nbsp;
                                        <label class="control-label">Female</label>
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
                                        <input type="file" id="user_img" name="user_img" onchange="readURL(this)" class="form-control">
                                         <img id="img_prev">
                                    </div>
                                </div>
                                 <div class="row" style="margin-top: 10px;"><div class="col-12">&nbsp;</div></div>
                                <div class="row">
                                    <div class="col-md-12" style="text-align: end">
                                        <button type="reset" class="btn btn-danger">Reset</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </form>
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
            .height(70)
            .width(80);
        };

        reader.readAsDataURL(input.files[0]);
    }
}   
        </script>
        
    </body>
</html>

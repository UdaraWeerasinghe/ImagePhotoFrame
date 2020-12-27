<?php include '../../commons/session.php'; ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script type="text/javascript" src="../../js/jquery-3.5.1.js"></script>
        <link type="text/css" rel="stylesheet" href="../../bootstrap/css/bootstrap.css">
        <script type="text/javascript" src="../../bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../../DataTables-1.10.22/css/jquery.dataTables.min.css"/>
        <script type="text/javascript" src="../../DataTables-1.10.22/js/jquery.dataTables.min.js"></script>
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
        
        <div class="container-fluid m-0 p-0" style="width: 100%;">
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
                <div style="padding: 10px;">
                    <div class="row">
                        <div class="col-12"style="background-color: #f5f6f8;padding: 5px;">
                            <a href="dashboard.php">Dashboard</a>/<a href="user.php">User</a>
                        </div>
                    </div>
                </div>
                <ul class="nav nav-tabs">
                  <li class="nav-item">
                    <a class="nav-link active" href="#all-users">All Users</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#active-users">Active Users</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#deactive-users">Deactive Users</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="add-user.php">Add User</a>
                  </li>
                </ul>

                <div class="tab-content"> 

                  <div id="all-users" class="container"><br>
                      <?php
                      if(isset($_GET["msg"])){
                          $msg=$_REQUEST["msg"];
                          $msg= base64_decode($msg);
                          $class=$_REQUEST["class"];
                          $class= base64_decode($class);
                          ?>
                      <div class="row">
                          <div class="col-md-12">
                              <div style="text-align: center" class="<?php echo $class; ?>">
                                  <?php echo $msg; ?>
                              </div>
                          </div>
                      </div>
                              <?php
                      }
                      ?>
                       <div style="padding: 5px;margin-top: 5px;">
                           <table class="table table-hover" id="user_tbl">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <?php
                                         while ($row=$userResult->fetch_assoc()){
                                             $userId=$row["user_id"];
                                                          ?>
                                        <tr>
                                            <td><?php echo $row["user_fname"]." ".$row["user_lname"]; ?></td>
                                            <td><?php echo $row["user_email"]; ?></td>
                                            <td><?php echo $row["role_name"]; ?></td>
                                            <td><?php
                                                if ($row["user_status"]=="1"){
                                                  echo 'Active';
                                                  }
                                                else {echo 'Deactive';}
                                            ?>
                                          </td>
                                          <td>
                                              <a href="../view/view-user.php?userId=<?php  echo $userId;   ?>" class="btn btn-info" >View</a>
                                          <?php
                                            if ($row["user_status"]=="1"){
                                                ?>
                                              <a href="../controller/user-controller.php?status=activateUser&userId=<?php  echo $userId;   ?>" class="btn btn-danger">Deactivate</a>
                                                <?php
                                            }
                                             else {
                                                 ?>
                                            <a href="../controller/user-controller.php?status=deactivateUser&userId=<?php  echo $userId;   ?>" class="btn btn-success">Activate</a>
                                                <?php
                                             }
                                          ?>

                                      </td>

                                        </tr>
                                         <?php } ?>
                                    </table>
                                </div>
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
            .height(70)
            .width(80);
        };

        reader.readAsDataURL(input.files[0]);
    }
}   

$(function(){
    $("#user_tbl").dataTable();
  });

        </script>
        
    </body>
</html>

<?php include '../../commons/session.php';
$logUser=$_SESSION['user']['user_id'];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        
        <link type="text/css" rel="stylesheet" href="../../bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="../../fontawesome-pro-5.13.0-web/css/all.css">
        <link type="text/css" rel="stylesheet" href="../../css/style.css">
        <link rel="stylesheet" type="text/css" href="../../DataTables-1.10.22/css/dataTables.bootstrap4.css"/>
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
                    <div class="module">
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
<!--                <div style="padding: 10px;">
                    <div class="row">
                        <div class="col-12"style="background-color: #f5f6f8;padding: 5px;">
                            <a href="dashboard.php">Dashboard </a>/<a> User</a>
                        </div>
                    </div>
                </div>-->
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
                                              <a href="../view/view-user.php?userId=<?php  echo base64_encode($userId);   ?>" class="btn-sm btn btn-info" >View</a>
                                          <?php
                                            if ($row["user_status"]=="1"){
                                                if($logUser==$userId){
                                                    ?>
                                              <button class="btn btn-sm btn-danger" onclick="deactivate(<?php echo $userId;?>)" disabled>Deactivate</button>
                                              <?php
                                                } else {
                                                  ?>
                                              <button class="btn btn-sm btn-danger" onclick="deactivate(<?php echo $userId;?>)">Deactivate</button>
                                                <?php  
                                                }
                                                
                                            }
                                             else {
                                                 if($logUser==$userId){
                                                    ?>
                                              <button class="btn btn-sm btn-success" onclick="activate(<?php echo $userId;?>)" disabled>Activate</button>                                          
                                              <?php
                                              }else{
                                                 ?>
                                              <button class="btn btn-sm btn-success" onclick="activate(<?php echo $userId;?>)">Activate</button>
                                                <?php 
                                              }
                                                 
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
        <script type="text/javascript" src="../../js/jquery-3.5.1.js"></script>
        <script type="text/javascript" src="../../bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../../DataTables-1.10.22/js/jquery.dataTables.js"></script>
        <script type="text/javascript" src="../../DataTables-1.10.22/js/dataTables.bootstrap4.js"></script>
        <script type="text/javascript" src="../../js/sweetalert2.js"></script>
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
 
function deactivate(userId){
    Swal.fire({
  title: 'Are you sure?',
  text: "You want to deactivate this user!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, deactivate it!'
}).then((result) => {
  if (result.isConfirmed) {
    window.location = '../controller/user-controller.php?status=activateUser&userId=' + userId;
  }
});
}

function activate(userId){
    Swal.fire({
  title: 'Are you sure?',
  text: "You want to activate this user!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, activate it!'
}).then((result) => {
  if (result.isConfirmed) {
    window.location = '../controller/user-controller.php?status=deactivateUser&userId=' + userId;
  }
});
}

        </script>
        
    </body>
</html>

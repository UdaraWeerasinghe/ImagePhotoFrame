<?php include '../../commons/session.php'; //incude session
$userRole=$_SESSION["user"]["role_id"];
$userId=$_SESSION["user"]["user_id"];

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
                        <form id="updateProfile" enctype="multipart/form-data" method="post"
                              action="../../app/controller/user-controller.php?status=updateProfile">
                            <input type="hidden" id="userId" name="userId" value="<?php echo $userId; ?>">
                        <div class="row ">
                            <div class="col-md-3">
                                <span class="btn" style="position: relative;overflow: hidden; height:200px; 
                                      width:200px; border-radius: 50%;">
                                    <img id="img_prev" height="200px" width="200px" style="border-radius: 50%;"
                                     src="../../images/user_image/<?php echo $uRow["user_image"] ?>">
                                    <span style="width: 184px; height: 50px; background-color: #4b778d; opacity: 75%;
                                          position: absolute; bottom: 0px; right:9px;">
                                        <i class="fas fa-camera-retro fa-2x" style="color: white; margin-top: 8px"></i>
                                    </span>
                                    <input type="file" id="name" name="img" onchange="readURL(this)"
                                           style="position: absolute;top: 6px;
                                           right: 12px;
                                           width: 200px; height: 200px;opacity: 0;
                                           border-radius: 50%;cursor: inherit;">
                                </span>
                            </div>
                            <div class="col-md-9" style="padding: 50px 0px 0px 0px;">
                                <div class="row" style="padding: 0px 15px 0px 0px">
                                    <div class="col-sm-6">
                                        <label style="color: white; font-size: 18px">
                                            <b>First Name : </b>
                                        </label>
                                        <input type="text" style="font-size: 32px; font-weight: 500;" name="fname" id="fname" 
                                                class="form-control" 
                                           value="<?php echo $uRow["user_fname"]?>">
                                        <div id="fnameTooltip" style="position: absolute;width: 92%; left: 16px" class="invalid-tooltip"></div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label style="color: white; font-size: 18px">
                                            <b>Last Name : </b>
                                        </label>
                                        <input type="text" style="font-size: 32px; font-weight: 500;" name="lname" id="lname" class="form-control" 
                                           value="<?php echo $uRow["user_lname"] ?>">
                                        <div id="lnameTooltip" style="position: absolute;width: 92%; left: 16px" class="invalid-tooltip"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4" style="padding: 0px 0px 0px 80px;">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-5">
                                <label style="color: white; font-size: 18px">
                                    <b>Email : </b>
                                </label>
                                <input type="hidden" id="emailcheck" name="emailcheck" value="valid">
                                <input class="form-control" id="email" name="email" id="email" value="<?php echo $uRow["user_email"]?>">
                                <div id="emailTooltip" style="position: absolute;width: 92%; left: 16px" class="invalid-tooltip"></div>
                            </div>
                            
                            <div class="col-sm-5">
                                <label style="color: white; font-size: 18px">
                                    <b>Contact No : </b>
                                </label>
                                <input type="hidden" id="cnocheck" name="cnocheck" value="valid">
                                <input class="form-control" name="cno" id="cno" value="<?php echo $uRow["user_cno"]?>">
                                <div id="cnoTooltip" style="position: absolute;width: 92%; left: 16px" class="invalid-tooltip"></div>
                            </div>
                        </div>
                        <div class="row mb-4" style="padding: 0px 0px 0px 80px;">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-5">
                                <label style="color: white; font-size: 18px">
                                    <b>Date of birth : </b>
                                </label>
                                <input class="form-control" name="dob" id="dob" value="<?php echo $uRow["user_dob"]?>">
                                <div id="dobTooltip" style="position: absolute;width: 92%; left: 16px" class="invalid-tooltip"></div>
                            </div>
                            <div class="col-sm-5">
                                <label style="color: white; font-size: 18px">
                                    <b>NIC : </b>
                                </label>
                                <input type="hidden" id="niccheck" name="niccheck" value="valid">
                                <input class="form-control" name="nic" id="nic" value="<?php echo $uRow["user_nic"]?>">
                                <div id="nicTooltip" style="position: absolute;width: 92%; left: 16px" class="invalid-tooltip"></div>
                            </div>
                        </div>
                        <div class="row" style="padding: 0px 0px 0px 80px;">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-5">
                                <label style="color: white; font-size: 18px">
                                    <b>Address : </b>
                                </label>
                                <textarea class="form-control" name="address" id="address"><?php echo $uRow["user_address"]?></textarea>
                                <div id="addressTooltip" style="position: absolute;width: 92%; left: 16px" class="invalid-tooltip"></div>
                            </div>
                            <div class="col-sm-5"> 
                                 <label style="color: white; font-size: 18px">
                                    <b>Gender : </b>
                                 </label><br>
                                 <div style="padding-left: 90px;">
                                    <lable style="color: white; font-size: 18px">
                                        <input type="radio" value="1" name="gender" 
                                      <?php if($uRow["user_gender"]=="1"){echo "checked";}?>>&nbsp;Male
                                    </lable><br>
                                    <lable style="color: white; font-size: 18px">
                                        <input type="radio" value="0" name="gender"
                                      <?php if($uRow["user_gender"]=="0"){echo "checked";}?>>&nbsp;Female
                                    </lable>
                                 </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12" style="text-align: end; padding: 15px 15px 0px 0px;">
                                <button type="submit" class="btn btn-warning"><i class="far fa-pencil-alt"></i>&nbsp;Update Profile</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>   
         <script type="text/javascript" src="../../js/jquery-3.5.1.js"></script>
        <script type="text/javascript" src="../../bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../../js/sweetalert2.js"></script>
        <script src="../../js/jsStyle.js"></script>
        <script type="text/javascript" src="../../js/user-profile-validation.js"></script>
        <script type="text/javascript" src="../../js/change-password-validation.js"></script>
        
    </body>
</html>


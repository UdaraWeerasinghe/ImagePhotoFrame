<div class="container-fluid" style="position: fixed; z-index: 2">
            <div class="row">
                <div class="col-12">
                    <div class="row" style="background-color: #173F5F; padding: 0px 10px 0px 0px">
                        <div class="col-9 d-inline-flex" style="padding: 5px 0px 5px 10px;">
                            <div  id="toggleLeft" class="btn" style="width: 50px; padding-top: 7px;"><i style="color: white; margin-left: -10px; font-size: 25px;" class="far fa-bars"></i></div>
                            <h4 style="color: white;font-family: Cooper Std Black; margin-top: 10px;">IMAGE PHOTO FRAMES</h4>
                        </div>  
                        <div class="col-3" style="text-align: right;">
                                <nav class="navbar navbar-expand navbar-light topbar">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item dropdown no-arrow" style="margin-right: -30px;">
                                        <a class="nav-link dropdown-toggle" style="color: white" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="mr-2 d-none d-lg-inline" style="color: white"><?php echo $_SESSION["user"]["user_fname"]." ".$_SESSION["user"]["user_lname"] ?></span>
                                            <img class="img-profile rounded-circle" width="30px" height="30px" src="../../images/user_image/<?php echo $_SESSION["user"]["user_image"] ?>">
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                            <a class="dropdown-item" href="profile.php">
                                              <i class="fas fa-user fa-sm fa-fw mr-2 "></i>
                                              Profile
                                            </a>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#changePassword">
                                              <i class="fas fa-cogs fa-sm fa-fw mr-2 "></i>
                                              Change Password
                                            </a>
                                            <a class="dropdown-item" href="#">
                                              <i class="fas fa-list fa-sm fa-fw mr-2 "></i>
                                              Activity Log
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="../controller/login-controller.php?status=logout">
                                              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 "></i>
                                              Logout
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<!--/////////////////////password change modal-->
<div class="modal" id="changePassword">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Change Password</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
          <form id="frmchangePass" enctype="multipart/form-data"  method="post"
                action="../controller/user-controller.php?status=changePassword">
              <div>
                <label><b>Old Password :</b></label>
                <input type="hidden" id="userId" name="userId" value="<?php echo $_SESSION["user"]["user_id"]; ?>">
                <input type="hidden" id="passcheck" name="passcheck" value="valid">
                <input type="password" name="oldPass" id="oldPass" class="form-control">
                <div id="oldPassTooltip" style="position: inherit" class="invalid-tooltip"></div><br>
              </div>
              <div>
                <label><b>New Password :</b></label>
                <input type="password" name="newPass" id="newPass" class="form-control">
                <div id="newPassTooltip" style="position: inherit" class="invalid-tooltip"></div><br>
              </div>
              <div>
                <label><b>Confirm Password :</b></label>
                <input type="password" name="confPass" id="confPass" class="form-control">
                <div id="confPassTooltip" style="position: inherit" class="invalid-tooltip"></div><br>
              </div>
              <div style="width: 100%; text-align: right">
                  <button type="submit"  class="btn btn-warning" >Change</button>
              </div>
          </form>
      </div>
    </div>
  </div>
</div>
<!--/////////////////////password change modal-->

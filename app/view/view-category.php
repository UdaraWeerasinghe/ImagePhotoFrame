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

        <?php 
        include_once '../../commons/dbConnection.php'; 
        
            include '../model/module-model.php';
            $moduleObj = new Module();
            $moduleResult=$moduleObj->getAllModules();  
            
            include '../model/product-model.php';
            $productObj=new Product();
            $subCatId=$_REQUEST["subCatId"];
            $subCategory=$productObj->viewCategory($subCatId);
            
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
                            if($row["module_id"]=='7'){
                                echo 'module-active';
                            }
                            ?>">
                        <i class="<?php echo $row["module_class"]; ?> ">&nbsp;&nbsp;</i>
                         <span class="module-name"> <?php echo $row["module_name"];?> </span>
                    </div>
                </a>

                 <?php }?>
            </div>
            <div class="dashbord-body" style="flex: 70%; height: 800px; padding: 10px;">
                
                <h3 style="text-align: center; margin: 20px;">Product Management</h3>
                
                <ul class="nav nav-tabs">
                  <li class="nav-item">
                      <a class="nav-link" href="product.php">Available Design</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="add-design.php">Add New Design</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link  active" href="category.php">Manage Category</a>
                  </li>
                </ul>
                <div class="container" style="padding-top: 20px;">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-md-6">
                                    <label style="font-weight: bold">Frame Type</label>
                                </div>
                                <div class="col-md-6">
                                    <label><?php echo 'ttt'; ?></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-md-6">
                                    <label style="font-weight: bold">Material types</label>
                                </div>
                                <div class="col-md-6">
                                    <label><?php echo 'ttt'; ?></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        <script src="../../js/jsStyle.js"></script>

    </body>
</html>



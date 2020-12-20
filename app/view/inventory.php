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
            <div class="dashbord-body" id="dashbord-body" style="padding: 10px;">
                
                
                <h3 style="text-align: center; margin-bottom: 20px;">Inventory Management</h3>
                
                <div class="row">
                    <div class="col-md-4">
                        <div class="shadow bg-info" style="height: 100px; background-color: white;border-radius: 15px;
                             padding: 10px; text-align: center;color: white">
                            <h4>Glass</h4><hr>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="shadow bg-info" style="height: 100px; background-color: white;border-radius: 15px;
                             padding: 10px; text-align: center;color: white">
                            <h4>Hardboards</h4><hr>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="shadow bg-info" style="height: 100px; background-color: white;border-radius: 15px; 
                             padding: 10px; text-align: center;color: white">
                            <h4>Frame Strips</h4><hr>
                        </div>
                    </div>
                </div>
               
            </div>
         
        </div> 
        

        <script type="text/javascript" src="../../js/product-validation.js"></script>
        <script src="../../js/jsStyle.js"></script>
        <script>
        </script>
 
    </body>
</html>



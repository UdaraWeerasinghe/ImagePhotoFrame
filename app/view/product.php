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
            
        include '../model/product-model.php'; 
            $productObj=new Product();
            $productResult=$productObj->getAllProduct(1,"");
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
                
                
                <h3 style="text-align: center; margin-bottom: 20px;">Product Management</h3>
                <div class="row" style="margin: 0px;">
                    <div class="col-md-7">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="product.php">All Design</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="add-design.php">Add New Design</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="category.php">Manage Category</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group mb-3">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="far fa-search"></i></span>
                            </div>
                            <input type="search" class="form-control"id="seachtext">
                          </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-primary" id="searchbtn" onclick="navigatopage(1)">search</button>
                    </div>
                </div>
                <div class="container" id="empcont">
                    <table class="table table-hover">
                        <thead>
                            <tr>

                                <th>Product Name</th>
                                <th>Color</th>
                                <th>Availability</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($prow=$productResult->fetch_assoc()) {
                                ?>
                            <tr>
                                <td><img width="30px" height="30px" src="../../images/design_image/<?php echo $prow['product_img_1']; ?>">&nbsp;&nbsp;<?php echo $prow['product_name']; ?></td>
                                <td><?php echo $prow['product_color']; ?></td>
                                <td>
                                    <?php
                                    if($prow['product_status']==1){
                                        echo 'Available';
                                    } else {
                                        echo 'Not Available';
                                    }
                                    ?>
                                </td>
                                <th>
                                    <a class="btn btn-info"><i class="far fa-print-search" style="margin: 4px"></i></a>
                                    <?php
                                    if($prow['product_status']==1){
                                        ?>
                                        <a class="btn btn-success">Activate</a>
                                    <?php
                                    } else {
                                        ?>
                                        <a class="btn btn-danger">Deactivate</a>
                                        <?php
                                    }
                                    ?>
                                </th>
                            </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>

                    <div class="row" style="margin: 0px;">
                        <div class="col-12">
                            <ul class="pagination">
                                <?php
                                $ecount=$productObj->getProductCount();
                                $numOfPage=$ecount/5;
                                $ceilpages= ceil($numOfPage);
                                for($x=1; $x<=$ceilpages; $x++){
                                    ?>
                                <li class="page-item <?php if($x==1){echo 'active';} ?>">
                                    <a class="page-link" href="#" onclick="navigatopage(<?php echo $x; ?>)"><?php echo $x; ?></a>
                                </li>
                                <?php
                                }
                                ?>

                            </ul>
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



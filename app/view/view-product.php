<?php include '../../commons/session.php'; ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link type="text/css" rel="stylesheet" href="../../bootstrap/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../../DataTables-1.10.22/css/dataTables.bootstrap4.css"/>
        <link rel="stylesheet" href="../../fontawesome-pro-5.13.0-web/css/all.css">
        <link type="text/css" rel="stylesheet" href="../../css/style.css">

        <?php include_once '../../commons/dbConnection.php'; 
        
        include '../model/module-model.php';
            $moduleObj = new Module();
            $moduleResult=$moduleObj->getAllModules();  
            
        include '../model/product-model.php'; 
            $productObj=new Product();
            $pId=$_REQUEST["pId"];
            
            $productResult=$productObj->geProductById($pId);
            $pRow=$productResult->fetch_assoc();
              
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
                <div class="container-fluid">
                
                    <h3 style="text-align: center; margin-bottom: 20px;">View Product</h3>
                    <hr>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card" style=" padding: 20px;">
                                <img width="100%" src="../../images/design_image/<?php echo $pRow['product_img_1']; ?>">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-sm-3">
                                    <label style="font-weight: bold">Name </label>
                                </div>
                                <div class="col-sm-9 mb-4">
                                    <label><?php echo $pRow['product_name']; ?></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <label style="font-weight: bold">Type </label>
                                </div>
                                <div class="col-sm-9 mb-4">
                                    <?php
                                    $sub_cat_id=$pRow['sub_cat_id'];
                                    $subCategoryResult=$productObj->getSubCategoryById($sub_cat_id);
                                    $scRow=$subCategoryResult->fetch_assoc();
                                    ?>
                                    <label><?php echo $scRow['sub_cat_name']; ?></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <label style="font-weight: bold">Material </label>
                                </div>
                                <div class="col-sm-9 mb-4">
                                    <?php
                                    $cat_id=$pRow['cat_id'];
                                    $categoryResult=$productObj->getCategoryById($cat_id);
                                    $cRow=$categoryResult->fetch_assoc();
                                    ?>
                                    <label><?php echo $cRow['cat_name']; ?></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <label style="font-weight: bold">Strip Name </label>
                                </div>
                                <div class="col-sm-9 mb-4">
                                    <?php
                                    $cat_id=$pRow['cat_id'];
                                    $categoryResult=$productObj->getCategoryById($cat_id);
                                    $cRow=$categoryResult->fetch_assoc();
                                    ?>
                                    <label><?php echo $cRow['cat_name']; ?></label>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                    
                    <div class="row" style="padding: 20px 20px 0px 20px;">
                        <label style="font-weight: bold">Price </label> 
                        <div class="col-sm-12">
                            <?php
                            $sub_cat_id=$pRow['sub_cat_id'];
                            $sizeResult=$productObj->getSizeBySubCatId($sub_cat_id);

                            $count=0;
                            ?>
                            <div class="row">
                                <?php
                            while ($sRow=$sizeResult->fetch_assoc()){
                            $count++;
                            $size_id=$sRow['size_id'];
                            $priceResult=$productObj->getPrice($pId,$size_id);
                            $price=$priceResult->fetch_assoc();
                            $sResult=$productObj->getSizeById($size_id);
                            $size=$sResult->fetch_assoc();
                            ?>
                                <div class="col-sm-3 mb-3">
                                    <?php echo $size["width"]."&Prime;"."&#215;".$size["height"]."&Prime;"." = "
                                    ."Rs.".number_format($price["product_price"],2); ?>
                                </div>

                            <?php
                            if($count % 4==0 ){
                                ?>
                                </div>
                                <div class="row">
                                <?php
                            }
                            }
                            ?>

                        </div>
                    </div>
                </div>
                
                    <div class="row">
                        <div class="col-12" style="text-align: end">
                            <a  href="update-product.php?pId=<?php echo $pId?>"class="btn btn-warning">Update</a>
                        </div>
                    </div>
             
            </div>
         
        </div> 
        
        <script type="text/javascript" src="../../js/jquery-3.5.1.js"></script>
        <script type="text/javascript" src="../../bootstrap/js/bootstrap.js"></script>
        <script type="text/javascript" src="../../DataTables-1.10.22/js/jquery.dataTables.js"></script>
        <script type="text/javascript" src="../../DataTables-1.10.22/js/dataTables.bootstrap4.js"></script>
        <script type="text/javascript" src="../../js/popper1.16.0.js"></script>
        <script type="text/javascript" src="../../js/product-validation.js"></script>
        <script src="../../js/jsStyle.js"></script>
 
    </body>
</html>



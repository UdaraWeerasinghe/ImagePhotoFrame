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
            $category=$productObj->getAllCategory();//all matirials
            $sub_category=$productObj->getAllSubCategory();//all type
            
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
                    <a class="nav-link" href="#all-users">Available Design</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link  active" href="#active-users">Add New Design</a>
                  </li>
                </ul>
                <div class="container">
                <form style="padding-top: 10px;">
                    <div class="row">
                        <div class="col-md-2">
                            <label>Design name</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-2">
                            <label>Design code</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    
                    <div class="row"><div class="col-md-12">&nbsp;</div></div>
                    
                    <div class="row">
                        <div class="col-md-2">
                            <label>Frame Material</label>
                        </div>
                        <div class="col-md-3">
                            <select class="form-control">
                                <option>---</option>
                                <?php
                                while ($prow=$category->fetch_assoc()){
                                    ?>
                                <option><?php echo $prow['cat_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-2">
                            <label>Frame Type</label>
                        </div>
                        <div class="col-md-3">
                            <select class="form-control">
                                <option>---</option>
                                <?php
                                while ($prow=$sub_category->fetch_assoc()){
                                    ?>
                                <option><?php echo $prow['sub_cat_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row"><div class="col-md-12">&nbsp;</div></div>
                    
                    <div class="row">
                        <div class="col-md-2">
                            <label>Color</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-2">
                            <label>Image</label>
                        </div>
                        <div class="col-md-3">
                            <input type="file" onchange="readURL1(this)" class="form-control">
                            <br>
                            <input type="file" onchange="readURL2(this)" class="form-control">
                            <img id="img_prev1"><img id="img_prev2">
                        </div>
                    </div>
                </form>
                </div>
                
                
            </div>
         
        </div> 
        

        <script type="text/javascript" src="../../js/user-validation.js"></script>
        <script src="../../js/jsStyle.js"></script>
        <script type="text/javascript">
      
        function readURL1(input) {
        if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#img_prev1')
            .attr('src', e.target.result)
            .height(70)
            .width(80);
        };

        reader.readAsDataURL(input.files[0]);
    }
}   
function readURL2(input) {
        if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#img_prev2')
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



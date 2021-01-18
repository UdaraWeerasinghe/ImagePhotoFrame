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
            <div class="dashbord-body" id="dashbord-body" style="flex: 70%; height: 800px; padding: 10px;">
                <div class="row container-fluid">
                    <div class="col-sm-2">
                        <button class="btn" onclick="history.go(-1);"><i style="color: #173F5F;" class="fad fa-arrow-alt-circle-left fa-2x"></i></button>
                    </div>
                    <div class="col-sm-8">
                         <h3 style="text-align: center; margin-bottom: 20px;">Product Management</h3>
                    </div>
                    <div class="col-sm-2"></div>
                </div>
                <div class="row" style="margin: 0px;">
                    <div class="col-md-12">
                        <ul class="nav nav-tabs">
                          <li class="nav-item">
                              <a class="nav-link" href="product.php">Available Design</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link  active" href="add-design.php">Add New Design</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="category.php">Manage Category</a>
                          </li>
                        </ul>
                    </div>
                </div>
                <div class="container">
                    <form id="addDesign" class="needs-validation" enctype="multipart/form-data"  method="post" style="padding-top: 30px;" action="../controller/product-controller.php?status=addDesign" novalidate>
                        
                        <div class="row"><div style="text-align: center" class="col-md-12" id="vAlert"></div></div>
                        
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Design name</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" id="dNanme" name="dNanme" class="form-control">
                                    <div class="invalid-tooltip">
                                        Design name need to be enter
                                    </div>
                                </div>
                              
                                <div class="col-md-2">
                                    <label>Design code</label>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <input type="text" id="dCode" name="dCode" class="form-control">
                                    <div class="invalid-tooltip">
                                        Design code need to be enter
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-2">
                                    <label>Frame Material</label>
                                </div>
                                <div class="col-md-4">
                                    <select name="material" id="material" class="form-control">
                                        <option></option>
                                        <?php
                                        while ($prow=$category->fetch_assoc()){
                                            ?>
                                        <option value="<?php echo $prow['cat_id'] ?>"><?php echo $prow['cat_name'] ?></option>
                                        <?php } ?>
                                        <div class="invalid-feedback">
                                        Design name need to be enter
                                    </div>
                                    </select>
                                    <div class="invalid-tooltip">
                                        Design Material need to be select
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <label>Frame Strip</label>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <select name="fStrip" id="fStrip" class="form-control">
                                       
                                    </select>
                                    <div class="invalid-tooltip">
                                        Design type need to be select
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-2">
                                    <label>Frame Type</label>
                                </div>
                                <div class="col-md-4">
                                    <select name="frameType" id="frameType" class="form-control">
                                        <?php
                                        while ($prow=$sub_category->fetch_assoc()){
                                            ?>
                                        <option value="<?php echo $prow['sub_cat_id'] ?>"><?php echo $prow['sub_cat_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                    <div class="invalid-tooltip">
                                        Design type need to be select
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label>Color</label>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" name="color" id="color" class="form-control">
                                            <div class="invalid-tooltip">
                                                Design color need to be enter
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Image 1</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="file" id="img1" name="img1" onchange="readURL1(this)" class="form-control">
                                    <div class="invalid-tooltip">
                                        Design image need to be upload
                                    </div>
                                    <img id="img_prev1" style="margin-top: 10px">
                                </div>
                               
                                    <div class="col-md-2">
                                        <label>Image 2</label>
                                    </div>
                                    <div class="col-md-4">                                
                                        <input type="file" id="img2" name="img2" onchange="readURL2(this)" class="form-control">
                                        <div class="invalid-tooltip">
                                            Design image need to be upload
                                        </div>
                                        <img id="img_prev2" style="margin-top: 10px;">                                       
                                </div>
                            </div>
                            
                            <div class="row"><div class="col-md-12">&nbsp;</div></div>
                            <div id="frameTypeLoad"></div>
                            
                            
                            
                            <div class="row">
                                <div class="col-md-12" style="text-align: right">
                                    <button type="reset" class="btn btn-danger"><i class="fad fa-sync-alt"></i>&nbsp;Reset</button>
                                    <button type="submit" class="btn btn-success"><i class="fal fa-save"></i>&nbsp;Save</button>
                                </div>
                            </div>
                </form>
                </div>
                
                
            </div>
         
        </div> 
        

        <script src="../../js/jsStyle.js"></script>
        <script src="../../js/product-validation.js"></script>
        <script type="text/javascript">
      
      function isNumberKey(event){
          let charCode = (event.which)?event.which:event.keyCode;
          if(charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
              return false;
        return true;
          
      }
      
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
//frameStrip
$("#material").change(function () {
        var url = "../controller/inventory-controller.php?status=getStrip";
        var sType = $("#material").val();
        $.post(url, {sType:sType}, function (data){
            $("#fStrip").html(data).show();
        });
    });
//frameStrip
//framesize
$("#frameType").change(function () {
        var url = "../controller/product-controller.php?status=getType";
        var x = $("#frameType").val();
        $.post(url, {sub_cat_id:x}, function (data){
            $("#frameTypeLoad").html(data).show();
        });
    });
//framesize


        </script>
 
    </body>
</html>



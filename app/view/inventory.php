<?php include '../../commons/session.php'; 
$userRole=$_SESSION["user"]["role_id"];?>
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
            $moduleResult=$moduleObj->getAllModules($userRole);  
            include '../model/inventory-model.php';
            $inventoryObj = new Inventory();
            $inventoryResult=$inventoryObj->getAllMaterial();
            
            if(isset($_GET["alert"])){
                ?>
    <input type="hidden" id="alert" value="<?php echo $_REQUEST["alert"]; ?>">
        <?php
            }
        ?>
    </head>
    <body>
        
        <?php include 'dashboard-header.php';?>
        
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
                            if($row["module_id"]=='6'){
                                echo 'module-active';
                            }
                            ?>">
                        <i class="<?php echo $row["module_class"]; ?> ">&nbsp;&nbsp;</i>
                         <span class="module-name"> <?php echo $row["module_name"];?> </span>
                    </div>
                </a>

                 <?php }?>
            </div>
            <div class="dashbord-body" id="dashbord-body" style="padding: 20px 10px 0px 10px;">
                
                
                <h3 style="text-align: center; margin-bottom: 20px;">Inventory Management</h3>
                
                <div class="container-fluid" style="margin: 0px;">
                    
                </div>
                <div style="padding: 15px">
                    <!--<div id="piechart" style="width: 900px; height: 500px;"></div>-->
                    <!--<div id="columnchart_material" style="width: 100%; height: 500px;"></div>-->
                    <div style="width: 100%; text-align: end">
                        <a class="btn btn-primary" data-toggle="modal" data-target="#addMaterial">Add New Frame Strip</a>
                    </div><br>
                    
                    <table id="inventory_tbl" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>feets</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                                while ($iRow=$inventoryResult->fetch_assoc()){
                        ?>
                        <tr>
                            <td><?php echo $iRow["material_id"]; ?></td>
                            <td><?php echo $iRow["material_name"]; ?></td>
                            <td><?php echo number_format($iRow["qty"])." ft"; ?></td>
                            <td>
                                <a class="btn btn-sm btn-success" data-toggle="modal" data-target="#addQty" onclick="load_data('<?php echo $iRow["material_id"]; ?>')">Add</a>
                               
                            </td>
                        </tr>
                        <?php
                                                }
                        ?>
                    </tbody>
                </table>
                </div>
            </div>
         
        </div> 
        <!--///////////////add Material modal start/////////////////--> 
            <div class="modal fade" id="addMaterial">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                      <form enctype="multipart/form-data" method="post" style="padding-top: 10px;" action="../controller/inventory-controller.php?status=addMaterial">
                        <!-- Modal Header -->
                        <div class="modal-header">
                          <h4 class="modal-title">Add Strip</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-3 mb-4">
                                    Name
                                </div>
                                <div class="col-sm-9">
                                    <input name="mName" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">Type</div>
                                <div class="col-sm-9">
                                    <select name="mType" class="form-control">
                                        <option value="CAT00001">Metal Strip</option>
                                        <option value="CAT00002">Wood Strip</option>
<!--                                        <option value="3">Glass</option>
                                        <option value="4">Hardboard</option>-->
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-plus" style="margin: 4px"></i>&nbsp;Add</button>
                        </div>
                    </form> 
                  </div>
                </div>
            </div>
            <!--///////////////add material modal end/////////////////-->
            <!--///////////////add Material qty modal start/////////////////--> 
            <div class="modal fade" id="addQty">
                <div class="modal-dialog">
                  <div class="modal-content">
                      <form enctype="multipart/form-data" method="post" style="padding-top: 10px;" action="../controller/inventory-controller.php?status=addQty">
                        <!-- Modal Header -->
                        <div class="modal-header">
                          <h4 class="modal-title">Add Material Qty</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body" id="modalBody">
                            
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-plus" style="margin: 4px"></i>&nbsp;Add</button>
                        </div>
                    </form> 
                  </div>
                </div>
            </div>
            <!--///////////////add material qty modal end/////////////////-->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript" src="../../js/jquery-3.5.1.js"></script>
        <script type="text/javascript" src="../../bootstrap/js/bootstrap.js"></script>
        <script type="text/javascript" src="../../DataTables-1.10.22/js/jquery.dataTables.js"></script>
        <script type="text/javascript" src="../../DataTables-1.10.22/js/dataTables.bootstrap4.js"></script>
        <script type="text/javascript" src="../../js/product-validation.js"></script>
        <script type="text/javascript" src="../../js/sweetalert2.js"></script>
        <script type="text/javascript" src="../../js/change-password-validation.js"></script>
        <script src="../../js/jsStyle.js"></script>
        <script>
            //     load  add feet
    function load_data(mId) {
        var url="../controller/inventory-controller.php?status=loadQty";
        $.post(url, {material_id:mId}, function(data){
            $("#modalBody").html(data).show();
        });
    }
    // load add feet  end
            
         $(function(){
    $("#inventory_tbl").dataTable();
  });
  
  
  
 
//       google.charts.load('current', {'packages':['bar']});
//      google.charts.setOnLoadCallback(drawChart);
//
//      function drawChart() {
//        var data = google.visualization.arrayToDataTable([
//          ['Year', 'Feets'],
//          ['2014', 100],
//          ['2015', 1170],
//          ['2016', 660],
//          ['2014', 1000],
//          ['2015', 1170],
//          ['2016', 660],
//          ['2014', 1000],
//          ['2015', 1170],
//          ['2016', 660],
//          ['2017', 1030]
//        ]);
//
//        var options = {
//          chart: {
//            title: 'Company Performance',
//            subtitle: 'Sales, Expenses, and Profit: 2014-2017'
//          }
//        };
//
//        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
//
//        chart.draw(data, google.charts.Bar.convertOptions(options));
//      }

      $( document ).ready(function() {
        var x = $("#alert").val();

        if (x=="materialAdded"){
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Frame Strip Successfully Added',
        showConfirmButton: false,
        timer: 1500
      });
        }
    });
        </script>
 
    </body>
</html>



<?php include '../../commons/session.php'; 
$userRole=$_SESSION["user"]["role_id"];
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
        include '../model/order-model.php';
        include '../model/inventory-model.php';
            $moduleObj = new Module();
            $moduleResult=$moduleObj->getAllModules($userRole); //modules for the side bar
            
            $orderObj= new Order();
            $orderResult=$orderObj->getOrderCountByStatus();  //count in dashbord top row
            $countRow=$orderResult->fetch_assoc();
            
            $inventoryObj=new Inventory();
            $lowStock=$inventoryObj->getLowOfStock(); ///get low sock
            $low=$lowStock->fetch_assoc();
        ?>
    </head>
    <body>
        
        <?php include 'dashboard-header.php'; ?>
        
        <div style="flex-wrap: wrap; display: flex;">
            <div id="sidemenu" class="sidemenu">
                <a href="dashboard.php" style="text-decoration: none;">
                    <div class="module module-active">
                        <i class="fas fa-tachometer-alt-fast">&nbsp;&nbsp;</i>
                         <span class="module-name">Dashboard</span>
                    </div>
                </a>
                <?php
                 while ($row=$moduleResult->fetch_assoc()){
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
                <div class="container-fluid">
                    <div id="orderCount">
                        <div class="row">
                        <div class="col-md-3">
                            <div style="padding: 10px">
                                <a href="#" id="newOrderNoti" style="text-decoration: none;">
                                    <div class="row " style="border: #173F5F solid 2px; border-radius: 10px; padding: 20px 5px;">
                                        <div class="col-4">
                                            <div style="text">
                                                <i class="fad fa-cart-arrow-down fa-4x" style="color: #173F5F"></i>
                                            </div>
                                        </div>
                                        <div class="col-8" style="padding-left: 30px;color: black">
                                            <div>
                                                New Orders
                                            </div>
                                            <div id="oldOrderCount">
                                                <?php echo $countRow["newOrder"]; ?>
                                            </div>
                                            <?php
                                            if($countRow["notiCount"]>'0'){
                                                ?>
                                            <span class="badge badge-danger" style="position: absolute; border-radius: 10px; 
                                                  top: -8px; right: 5px; font-size: 15px;">
                                                      <?php echo $countRow["notiCount"]; ?>
                                            </span>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div style="padding: 10px">
                                <a href="on-process.php" style="text-decoration: none;">
                                    <div class="row " style="border: #173F5F solid 2px; border-radius: 10px; padding: 20px 5px;">
                                        <div class="col-4">
                                            <div style="text">
                                                <i class="fal fa-tools fa-4x" style="color: #173F5F"></i>
                                            </div>
                                        </div>
                                        <div class="col-8" style="padding-left: 30px;color: black">
                                            <div>
                                                On Process
                                            </div>
                                            <div  id="onProcess">
                                                <?php 
                                                echo $countRow["onProcess"]; ?>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div style="padding: 10px">
                                <a href="on-process.php" style="text-decoration: none;">
                                    <div class="row " style="border: #173F5F solid 2px; border-radius: 10px; padding: 20px 5px;">
                                        <div class="col-4">
                                            <div style="text">
                                                <i class="fas fa-money-check-edit-alt fa-4x" style="color: #173F5F"></i>
                                            </div>
                                        </div>
                                        <div class="col-8" style="padding-left: 30px;color: black">
                                            <div>
                                                Due Payment
                                            </div>
                                            <div>
                                                <?php echo $countRow["duePayment"]; ?>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div style="padding: 10px">
                                <div class="row " style="border: #173F5F solid 2px; border-radius: 10px; padding: 20px 5px;">
                                    <div class="col-4">
                                        <div style="text">
                                            <i class="fas fa-inventory fa-4x" style="color: #173F5F"></i>
                                        </div>
                                    </div>
                                    <div class="col-8" style="padding-left: 30px; color: orangered">
                                        <div>
                                            Out of Stock
                                        </div>
                                        <div>
                                            <?php echo $low["lowStock"]; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div id="columnchart_material" style="width: 100%; height: 400px;"></div>
                        </div>
                        <div class="col-md-6">
                            <div id="piechart" style="width: 100%; height: 400px;"></div>
                        </div>
                    </div>
                
            </div>
                
         
        </div>   
         <script type="text/javascript" src="../../js/jquery-3.5.1.js"></script>
        <script type="text/javascript" src="../../bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script src="../../js/jsStyle.js"></script>
        <script type="text/javascript" src="../../js/change-password-validation.js"></script>
        <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Desgin', 'Feets'],
          ['718GUN', 100],
          ['718BLK', 520],
          ['720BLK', 660],
          ['720GUN', 80],
          ['718GFB', 400],
          ['CFS3', 660],
          ['CFS9', 300]
        ]);
        var data2 = google.visualization.arrayToDataTable([
          ['Status', 'Precentage'],
          ['New Orders', 100],
          ['On Process', 520],
          ['Due Payment', 660],
          ['On Delivery', 80]
        ]);

        var options = {
          chart: {
            title: 'Company Performance',
            subtitle: 'Orders in Last Month'
          }
        };
        var options2 = {
          title: 'Order Status of Today'
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
        
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data2, options2);
      }
      
//      google.charts.load('current', {'packages':['corechart']});
//      google.charts.setOnLoadCallback(drawChart);
//      
//      function drawChart() {
//
//        var data2 = google.visualization.arrayToDataTable([
//          ['Status', 'Precentage'],
//          ['New Orders', 100],
//          ['On Process', 520],
//          ['Due Payment', 660],
//          ['On Delivery', 80]
//        ]);
//
//        var options2 = {
//          title: 'Order Status of Today'
//        };
//
//        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
//
//        chart.draw(data2, options2);
//      }
$(document).ready(function(){
    var url="../controller/dashbordCount-refresh.php?status=refreshOrder";
    setInterval(function (){
        $('#orderCount').load(url);
    },1000);
});
$("#newOrderNoti").click(function () {
    console.log("click");
            var url = "../controller/dashbordCount-refresh.php?status=newOrderNotiRead";
            $.post(url,{}, function (data){ 
                console.log(data);
                window.location.href ="../view/order.php";
            });
   });
      
        </script>
        
    </body>
</html>

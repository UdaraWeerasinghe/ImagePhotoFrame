<?php
$startingDate=$_POST["starting_date"]." 00:00:00";
$endindDate=$_POST["end_date"]." 00:00:00";

$minAmount=$_POST["minAmount"];  
$maxAmount=$_POST["maxAmount"];
$ordStatus=$_POST["ordStatus"];


date_default_timezone_set('Asia/Colombo');
$date=date("Y/m/d");
$time=date("h:i:sa");
// Include autoloader 
require_once '../../dompdf/autoload.inc.php'; 
include '../model/report-model.php';
$reportObj= new Report();
if($ordStatus>0){
    $customOrderResult=$reportObj->getOrdrByTimeAndAmountAndStatus($startingDate, $endindDate, $minAmount, $maxAmount, $ordStatus);
}else{
    $customOrderResult=$reportObj->getOrdrByTimeAndAmount($startingDate, $endindDate, $minAmount, $maxAmount);  
}


// Reference the Dompdf namespace 
use Dompdf\Dompdf; 
 
// Instantiate and use the dompdf class 
$dompdf = new Dompdf();



$html='<h1 style="text-align:center">Image photo frame</h1>';
$html.='<h3 style="text-align:center">Order Report From '
        .date('Y-m-d', strtotime($startingDate)).' To '.date('Y-m-d', strtotime($endindDate)).'</h3><hr>';
$html.='<table style="width:100%">
  <tr>
    <th style="text-align:left">Date</th>
    <th style="text-align:left">Order ID</th>
    <th style="text-align:left">Customer Name</th> 
    <th style="text-align:right">Total</th>
  </tr>';

while ($coRow=$customOrderResult->fetch_assoc()) {


    $html.='<tr>
        <td>'.date('Y-m-d', strtotime($coRow['order_timestamp'])).'</td>
        <td>'.$coRow['order_id'].'</td>';
    $customerResult=$reportObj->getCustomerById($coRow['customer_id']);
    while ($cRow=$customerResult->fetch_assoc()){        
    $html.='<td>'.$cRow['customer_fName']." ".$cRow['customer_lName'].'</td>';
        }
    $html.='<td style="text-align:right">'."Rs.".number_format($coRow['order_sub_total'],2).'</td>
      </tr>'; 
}
$html.='</table>';

$html.='<div style="position:fixed; bottom:90px;">
        <hr style="margin:0px;">
        <center>
        <p style="font-size:14px;">NO.183/1, Mahayaya Road, Ambala, Beliattha.</p>
        <p style="font-size:14px;">Tel : 07182208169 | Email : imagephotoframesbeliatta@gmail.com</p>
        </center>
        </div>';

$html.='<span style="position:fixed; bottom:18px; left:0px;">Print by : Udara(Admin)</span>
        <span style="position:fixed; bottom:18px; left:450px;">Print Date : '.$date.' / '.$time.'</span>';


$dompdf->loadHtml($html); 
 
// (Optional) Setup the paper size and orientation 
$dompdf->set_paper("A4", "portrait");
 
// Render the HTML as PDF 
$dompdf->render(); 
 
// Output the generated PDF (1 = download and 0 = preview) 
$dompdf->stream("order", array("Attachment" => 1));
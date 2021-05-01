<?php
include '../model/report-model.php';
$reportObj=new Report();

$startingDate=$_POST["starting_date"]." 00:00:00";
$endindDate=$_POST["end_date"]." 00:00:00";

$minAmount=$_POST["minAmount"];  
$maxAmount=$_POST["maxAmount"];
$paymentType=$_POST["paymentType"];

if($paymentType=="3"){
    $paymentResult=$reportObj->getPaymentByDate($startingDate, $endindDate,$minAmount,$maxAmount);
}else{
    $paymentResult=$reportObj->getPaymentByDateAndType($startingDate, $endindDate,$minAmount,$maxAmount,$paymentType);
}

date_default_timezone_set('Asia/Colombo');
$date=date("Y/m/d");
$time=date("h:i:sa");
// Include autoloader 
require_once '../../dompdf/autoload.inc.php'; 

// Reference the Dompdf namespace 
use Dompdf\Dompdf; 
 
// Instantiate and use the dompdf class 
$dompdf = new Dompdf();



$html='<h1 style="text-align:center">Image photo frame</h1>';
$html.='<h3 style="text-align:center">Payment Report From '
        .date('Y-m-d', strtotime($startingDate)).' To '.date('Y-m-d', strtotime($endindDate)).'</h3><hr>';
$html.='<table style="width:100%">
  <tr>
    <th style="text-align:left">Date</th>
    <th style="text-align:left">Patment Id</th>
    <th style="text-align:left">Order Id</th>
    <th style="text-align:left">Customer Name</th> 
    <th style="text-align:right">Amount</th>
  </tr>';

while ($pRow=$paymentResult->fetch_assoc()) {
    $html.='<tr>
        <td>'.date('Y-m-d', strtotime($pRow['payment_timestamp'])).'</td>
        <td>'.$pRow['payment_id'].'</td>
        <td>'.$pRow['order_id'].'</td>
        <td>'.$pRow['fName']." ".$pRow['lName'].'</td>
        <td style="text-align:right">'."Rs.".number_format($pRow['payment_amount'],2).'</td>
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
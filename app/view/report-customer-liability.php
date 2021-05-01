<?php
date_default_timezone_set('Asia/Colombo');
$date=date("Y/m/d");
$time=date("h:i:sa");

// Include autoloader 
require_once '../../dompdf/autoload.inc.php'; 
include '../model/report-model.php';
$reportObj= new Report();


$customerResult=$reportObj->getAllLiabilities();



 //Reference the Dompdf namespace 
use Dompdf\Dompdf; 
 
// Instantiate and use the dompdf class 
$dompdf = new Dompdf();


$html='<h1 style="text-align:center">Image photo frame</h1>';
$html.='<h3 style="text-align:center">Liability Report</h3><hr>';
$html.='<table style="width:100%">
  <tr>
    <th style="text-align:left">Customer Id</th>
    <th style="text-align:left">Customer Name</th>
    <th style="text-align:left">Contact Number</th>
    <th style="text-align:right">Due Payment</th>
  </tr>';

while ($cRow=$customerResult->fetch_assoc()) {

    $html.='<tr>
        <td>'.$cRow['customer_id'].'</td>
        <td>'.$cRow['customer_fName']." ".$cRow['customer_lName'].'</td>';
          
    $html.='<td>'.$cRow['customer_tel'].'</td>';
        
    $html.='<td style="text-align:right">Rs.'.number_format($cRow['subTotal']-$cRow['paidAmount'],2).'</td>
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
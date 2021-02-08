<?php
// Include autoloader 
require_once '../../dompdf/autoload.inc.php'; 
include '../model/report-model.php'; 
            $reportObj=new Report();
            $orderResult=$reportObj->getAllOrder();
// Reference the Dompdf namespace 
use Dompdf\Dompdf; 
 
// Instantiate and use the dompdf class 
$dompdf = new Dompdf();

$header = '../../images/system/reportHeader.jpg';
$headerData = base64_encode(file_get_contents($header));
$srcHeader = 'data:'.mime_content_type($header).';base64,'.$headerData;

date_default_timezone_set('Asia/Colombo');
$date=date("Y/m/d");
$time=date("h:i:sa");

$html = '<img src='.$srcHeader.'>';

$html.='<hr><center><h3>Order Report from 25-12-2020 to 24-01-2021</h3></center>';

$html.='<table style="width:100%">
  <tr style="background-color: #e1e3e1;">
    <th style="text-align:left;">#</th>
    <th style="text-align:left;">Order Id</th>
    <th style="text-align:left;">Date</th>
    <th style="text-align:left;">Customer</th>
    <th style="text-align:left;">Status</th>
    <th style="text-align:left;">Unit Price</th>
  </tr>';
    $no=0;
while ($orow=$orderResult->fetch_assoc()) {
    $no=$no+1;
    
//// A few settings
//$image = '../../images/user_image/'.$urow['user_image'];
//// Read image path, convert to base64 encoding
//$imageData = base64_encode(file_get_contents($image));
//// Format the image SRC:  data:{mime};base64,{data};
//$src = 'data:'.mime_content_type($image).';base64,'.$imageData;

    $html.='<tr>
        <td>'.$no.'</td>
        <td>'.$orow['order_id'].'</td>
        <td>'.$orow['order_timestamp'].'</td>
        <td>'.$orow['customer_fName']." ".$orow['customer_lName'].'</td>
        <td style="text-align:right;">Completed</td>
            
        <td style="text-align:right;">'.number_format($orow['order_sub_total'],2).'</td>
      </tr>'; 
}
$html.='</table>';

$html.='<span style="position:fixed; bottom:18px; left:0px; font-size: 14px;">Print by : Udara Weerasinghe (Admin)</span>
        <span style="position:fixed; bottom:18px; left:450px; font-size: 14px;">Print Date : '.$date.' / '.$time.'</span>';

$dompdf->loadHtml($html); 
 
// (Optional) Setup the paper size and orientation 
$dompdf->set_paper("A4", "portrait");
 
// Render the HTML as PDF 
$dompdf->render(); 
 
// Output the generated PDF (1 = download and 0 = preview) 
$dompdf->stream("All Designs", array("Attachment" => 0));


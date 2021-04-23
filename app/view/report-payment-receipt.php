<?php
include '../../commons/session.php';
$lUserName=$_SESSION['user']['user_fname']." ".$_SESSION['user']['user_lname']; ///get the user name from sesstion
$lUserRoleId=$_SESSION['user']['role_id']; ///get the user id from sesstion

$pId= base64_decode($_REQUEST["pId"]);//get product id from url
include '../model/report-model.php';    //include report model
$reportObj=new Report();
$customerResult=$reportObj->getCustomerByPId($pId);   //caling the funtion for get customer details
$cusRow=$customerResult->fetch_assoc();
$lUserRole=$reportObj->getRoleByroleId($lUserRoleId);

// Include autoloader 
require_once '../../dompdf/autoload.inc.php';    
            
// Reference the Dompdf namespace .'
use Dompdf\Dompdf; 
 
// Instantiate and use the dompdf class 
$dompdf = new Dompdf();

$header = '../../images/system/reportHeader.jpg';
$headerData = base64_encode(file_get_contents($header));
$srcHeader = 'data:'.mime_content_type($header).';base64,'.$headerData;

date_default_timezone_set('Asia/Colombo');
$date=date("Y/m/d");
$time=date("h:i:sa");

$html ='<img src="'.$srcHeader.'">';

$html .='<center><h1>Payment Receipt</h1></center>'
        . '<p style="background-color: #111E6C; color: white; width:200px;">Bill To</p>'
        . '<p>'.$cusRow["customer_fName"]." ".$cusRow["customer_lName"].',<br>'
        . $cusRow["customer_address"].'<br>'
        . 'ZIP Code : '.$cusRow["customer_zip_code"].'<br>'
        . 'Tel : '.$cusRow["customer_tel"].'</p>'
        . '<span style="position:fixed; left:500px; top:180px; text-align: right;">'
        . '<p><b>Date : </b>'.$date.'<br>'
        . '<b>Payment Id : </b>'.$pId.'<br>'
        . '<b>Order No : </b>'.$cusRow["order_id"].'</p>'
        . '</span>';

$html .= '<table style="width:100%;">'
        . '<tr style="background-color: #e1e3e1;">'
        . '<th style="text-align:left;">Product</th>'
        . '<th style="text-align:right;">Quantity</th>'
        . '<th style="text-align:right;">Unit Price</th>'
        . '<th style="text-align:right;">Price</th>'
        . '</tr>';
$productResult=$reportObj->getproductByorderId($cusRow["order_id"]); //get product details usig order id
        $total=0;
while ($pRow=$productResult->fetch_assoc()){
        $total=$total+($pRow["quantity"]*$pRow["unit_price"]);

$html .= '<tr>'
        . '<td>'.$pRow["product_name"].'</td>'
        . '<td style="text-align:right;">'.$pRow["quantity"].'</td>'
        . '<td style="text-align:right;">'.number_format($pRow["unit_price"],2).'</td>'
        . '<td style="text-align:right;">'.number_format($pRow["quantity"]*$pRow["unit_price"],2).'</td>'
        . '</tr>';
}
$html .=  '<tr>'
        . '<td></td>'
        . '<td></td>'
        . '<td></td>'
        . '<td><hr style="margin:0px;"></td>'
        . '</tr>'
        
        . '<tr>'
        . '<td  colspan="2" style="text-align:center"><b>Sub Total</b></td>'
        . '<td></td>'
        . '<td style="text-align:right;">'.number_format($total,2).'</td>'
        . '</tr>'
        . '<tr><td colspan="4">&nbsp;</td>/tr>';

$html .= '</table>';

$html .='<table style="width:100%;">'
        . '<tr>'
        . '<th style="text-align:left;">Payment Id</th>'
        . '<th style="text-align:left;">Date</th>'
        . '<th style="text-align:left;">Time</th>'
        . '<th style="text-align:right;"></th>'
        . '</tr>';
        $totalPaid=0;
        $paymentHistory=$reportObj->getPaymentByOrderId($cusRow["order_id"]);
        while($phRow=$paymentHistory->fetch_assoc()){
            $totalPaid=$totalPaid+$phRow["payment_amount"];
       
$html .='<tr>'
        . '<td>'.$phRow["payment_id"].'</td>'
        . '<td>'.date("Y-m-d",strtotime($phRow["payment_timestamp"])).'</td>'
        . '<td>'.date("h:m:s a",strtotime($phRow["payment_timestamp"])).'</td>'
        . '<td style="text-align:right;">'.number_format($phRow["payment_amount"],2).'</td>'
        . '</tr>';
        }
$html .='</tr>'
        . '<tr>'
        . '<td></td>'
        . '<td></td>'
        . '<td></td>'
        . '<td><hr></td>'
        
        . '</tr>'
        . '<tr>'
        . '<td  colspan="3" style="text-align:center"><b>Total paid amount</b></td>'
        . '<td style="text-align:right;">'.number_format($totalPaid,2).'</td>'
        . '</tr>'
        . '<tr><td colspan="4">&nbsp;</td>/tr>';
if($total>$totalPaid){
$html .='<tr>'
        . '<td  colspan="3" style="text-align:center"><b>Outstanding Payment</b></td>'
        . '<td style="text-align:right;">'.number_format(($total-$totalPaid),2).'</td>'
        . '</tr>';
}


$html .='</table>';

$html .='<span style="position:fixed; bottom:18px; left:0px; font-size: 14px;">Print by : '.$lUserName.' ('.$lUserRole.')</span>
        <span style="position:fixed; bottom:18px; left:450px; font-size: 14px; text-align: right;">Print Date : '.$date.' | '.$time.'</span>';

$dompdf->loadHtml($html); 
 
// (Optional) Setup the paper size and orientation 
$dompdf->set_paper("A4", "portrait");
 
// Render the HTML as PDF 
$dompdf->render(); 
 
// Output the generated PDF (1 = download and 0 = preview) 
$dompdf->stream("All Designs", array("Attachment" => 0));



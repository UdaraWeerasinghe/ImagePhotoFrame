<?php
// Include autoloader 
require_once '../../dompdf/autoload.inc.php'; 
include '../model/report-model.php'; 
            $reportObj=new Report();
            $invoiceResult=$reportObj->getInvoice();
            $iRow=$invoiceResult->fetch_assoc();
            $productResult=$reportObj->getProductsByOrder($iRow["order_id"]);
            
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

$html .='<center><h1>INVOICE</h1></center>'
        . '<p style="background-color: #111E6C; color: white; width:200px;">Bill To</p>'
        . '<p>'.$iRow["customer_fName"]." ".$iRow["customer_lName"].',<br>'
        . $iRow["customer_address"].'<br>'
        . 'ZIP Code : '.$iRow["customer_zip_code"].'<br>'
        . 'Tel : '.$iRow["customer_tel"].'</p>'
        . '<span style="position:fixed; left:500px; top:180px; text-align: right;">'
        . '<p><b>Date : </b>'.$date.'<br>'
        . '<b>Invoice No : </b>IN00003<br>'
        . '<b>Order No : </b>OR00008</p>'
        . '</span>';

$html .= '<table style="width:100%;">'
        . '<tr style="background-color: #e1e3e1;">'
        . '<th style="text-align:left;">Product</th>'
        . '<th style="text-align:right;">Quantity</th>'
        . '<th style="text-align:right;">Unit Price</th>'
        . '<th style="text-align:right;">Price</th>'
        . '</tr>';
        $total=0;
while ($pRow=$productResult->fetch_assoc()){
        $prdResult=$reportObj->getSizeNPriceById($pRow["product_id"], $pRow["size_id"]);
        
        while ($prdRow=$prdResult->fetch_assoc()){
        $total=$total+($pRow["quantity"]*$prdRow["product_price"]);

$html .= '<tr>'
        . '<td>'.$prdRow["product_name"].'</td>'
        . '<td style="text-align:right;">'.$pRow["quantity"].'</td>'
        . '<td style="text-align:right;">'.number_format($prdRow["product_price"],2).'</td>'
        . '<td style="text-align:right;">'.number_format($pRow["quantity"]*$prdRow["product_price"],2).'</td>'
        . '</tr>';
   }
}
$html .=  '<tr>'
        . '<td></td>'
        . '<td></td>'
        . '<td></td>'
        . '<td><hr></td>'
        . '</tr>'
        . '<tr>'
        . '<td>Total Amount</td>'
        . '<td></td>'
        . '<td></td>'
        . '<td style="text-align:right;">'.number_format($total,2).'<hr><hr></td>'
        . '</tr>';
     
$html .= '</table>';

$html .='<span style="position:fixed; bottom:18px; left:0px; font-size: 14px;">Print by : Udara Weerasinghe (Admin)</span>
        <span style="position:fixed; bottom:18px; left:450px; font-size: 14px; text-align: right;">Print Date : '.$date.' / '.$time.'</span>';

$dompdf->loadHtml($html); 
 
// (Optional) Setup the paper size and orientation 
$dompdf->set_paper("A4", "portrait");
 
// Render the HTML as PDF 
$dompdf->render(); 
 
// Output the generated PDF (1 = download and 0 = preview) 
$dompdf->stream("All Designs", array("Attachment" => 0));


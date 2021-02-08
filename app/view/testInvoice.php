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

$html.='<hr><center><h1>INVOICE</h1></center>'
        . '<p style="background-color: #111E6C; color: white; width:200px;">Bill To</p>'
        . '<p>Lakshitha Sandharuwan,<br>'
        . 'No.56/2,<br>'
        . 'Malkaduwawa road, Beliaththa.<br>'
        . 'ZIP Code : 31222<br>'
        . 'Tel : 07165320006</p>'
        . '<span style="position:fixed; left:500px; top:190px;">'
        . '<p><b>Date : </b>02-01-2021</p>'
        . '<p><b>Invoice No : </b>IN00003</p>'
        . '<p><b>Order No : </b>OR00008</p>'
        . '</span>';

$html .= '<table style="width:100%;">'
        . '<tr style="background-color: #e1e3e1;">'
        . '<th style="text-align:left;">Product</th>'
        . '<th style="text-align:right;">Quantity</th>'
        . '<th style="text-align:right;">Unit Price</th>'
        . '<th style="text-align:right;">Price</th>'
        . '</tr>'
        . '<tr>'
        . '<td>Deep Black Metal Canvas Floater Frame</td>'
        . '<td style="text-align:right;">10</td>'
        . '<td style="text-align:right;">450.00</td>'
        . '<td style="text-align:right;">4,500.00</td>'
        . '</tr>'
        . '<tr>'
        . '<td>Deep Black with Gold Metal Canvas Floater Picture</td>'
        . '<td style="text-align:right;">26</td>'
        . '<td style="text-align:right;">530.00</td>'
        . '<td style="text-align:right;">13,780.00</td>'
        . '</tr>'
        . '<tr>'
        . '<td>Modern Gold Leaf Canvas Floater Frame</td>'
        . '<td style="text-align:right;">15</td>'
        . '<td style="text-align:right;">320.00</td>'
        . '<td style="text-align:right;">4,800.00</td>'
        . '</tr>'
        . '<tr>'
        . '<td></td>'
        . '<td></td>'
        . '<td></td>'
        . '<td><hr></td>'
        . '</tr>'
        . '<tr>'
        . '<td>Sub Total</td>'
        . '<td></td>'
        . '<td></td>'
        . '<td style="text-align:right;">23,080.00</td>'
        . '</tr>'
        . '</table>';

$html.='<span style="position:fixed; bottom:18px; left:0px; font-size: 14px;">Print by : Udara Weerasinghe (Admin)</span>
        <span style="position:fixed; bottom:18px; left:450px; font-size: 14px;">Print Date : '.$date.' / '.$time.'</span>';

$dompdf->loadHtml($html); 
 
// (Optional) Setup the paper size and orientation 
$dompdf->set_paper("A4", "portrait");
 
// Render the HTML as PDF 
$dompdf->render(); 
 
// Output the generated PDF (1 = download and 0 = preview) 
$dompdf->stream("All Designs", array("Attachment" => 0));


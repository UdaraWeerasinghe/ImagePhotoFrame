<?php
// Include autoloader 
require_once '../../dompdf/autoload.inc.php'; 
include '../model/product-model.php';
$productObj=new Product();
$productResult=$productObj->getAllProduct();
// Reference the Dompdf namespace 
use Dompdf\Dompdf; 
 
// Instantiate and use the dompdf class 
$dompdf = new Dompdf();



$html='<h1 style="text-align:center">Image photo frame</h1><hr>';

$html.='<table style="width:100%">
  <tr>
    <th>Firstname</th>
    <th>Lastname</th> 
    <th>Age</th>
  </tr>';

while ($prow=$productResult->fetch_assoc()) {
// A few settings
$image = '../../images/design_image/'.$prow['product_img_1'];

// Read image path, convert to base64 encoding
$imageData = base64_encode(file_get_contents($image));

// Format the image SRC:  data:{mime};base64,{data};
$src = 'data:'.mime_content_type($image).';base64,'.$imageData;

    $html.='<tr>
        <td>'.$prow['product_name'].'</td>
        <td><img src="'.$src.'"  width="30px" height="30px"></td>
        <td><h4>ef</h4></td>
      </tr>'; 
}
$html.='</table>';


$dompdf->loadHtml($html); 
 
// (Optional) Setup the paper size and orientation 
$dompdf->set_paper("A4", "portrait");
 
// Render the HTML as PDF 
$dompdf->render(); 
 
// Output the generated PDF (1 = download and 0 = preview) 
$dompdf->stream("codexworld", array("Attachment" => 0));
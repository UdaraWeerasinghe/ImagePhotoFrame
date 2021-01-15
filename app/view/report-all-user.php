<?php
// Include autoloader 
require_once '../../dompdf/autoload.inc.php'; 
include '../model/report-model.php'; 
            $reportObj=new Report();
            $userResult=$reportObj->getAllUser();
// Reference the Dompdf namespace 
use Dompdf\Dompdf; 
 
// Instantiate and use the dompdf class 
$dompdf = new Dompdf();

$icon = '../../images/system/icon.jpg';
$iconData = base64_encode(file_get_contents($icon));
$srcIcon = 'data:'.mime_content_type($icon).';base64,'.$iconData;

date_default_timezone_set('Asia/Colombo');
$date=date("Y/m/d");
$time=date("h:i:sa");

$html='<center><img src='.$srcIcon.' width="150px" height="75px"><h1>Image Photo Frames (PVT) LTD</h1><h2>All Users at '.$date.'</h2></center>';

$html.='<table style="width:100%">
  <tr style="background-color: #e1e3e1;">
    <th style="text-align:left;">#</th>
    <th style="text-align:left;">Id</th> 
    <th></th>
    <th style="text-align:left;">User Name</th>
    <th style="text-align:left;">Role</th>
    <th style="text-align:left;">NIC</th>
    <th style="text-align:left;">Contact No</th>
    <th style="text-align:left;">Status</th>
  </tr>';
    $no=0;
while ($urow=$userResult->fetch_assoc()) {
    $no=$no+1;
    
    if($urow['user_status']==1){
        $status='<td style="color:#5cb85c;">Active</td>';
        
    }
    else{
         $status='<td style="color:#d9534f;">Deactive</td>';
    }
    
// A few settings
$image = '../../images/user_image/'.$urow['user_image'];
// Read image path, convert to base64 encoding
$imageData = base64_encode(file_get_contents($image));
// Format the image SRC:  data:{mime};base64,{data};
$src = 'data:'.mime_content_type($image).';base64,'.$imageData;

    $html.='<tr>
        <td>'.$no.'</td>
        <td>'.$urow['user_id'].'</td>
        <td><img src="'.$src.'"  width="30px" height="30px"></td>
        <td>'.$urow['user_fname'].' '.$urow['user_lname'].'</td>
        <td>'.$urow['role_name'].'</td>
        <td>'.$urow['user_nic'].'</td>
        <td>'.$urow['user_cno'].'</td>
        $html.='.$status.';
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
$dompdf->stream("All Designs", array("Attachment" => 0));


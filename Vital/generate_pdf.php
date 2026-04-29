<?php
namespace Dompdf;
require_once 'dompdf/autoload.inc.php';
require_once 'connect.php';

extract($_GET);

$sql  = "select * from birthcertificat_app_form where notification_no = '$edit_notification_search' ";

$response = mysqli_query($connection, $sql);


$colms  = mysqli_fetch_array($response);


$dompdf = new Dompdf(); 
$dompdf->loadHtml('<h3 style=text-align:center;color:#EF5350;>REPUBLIC OF KENYA</h3>
  <hr style=text-align:center;width:20%;border-color:#EF5350;>
  <span style=text-align:center;color:#EF5350;font-size:25px;><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CERTIFICATE OF BIRTH</b> &nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; <span style=color:black;>'.$colms[0].'</span></span>

<hr style=text-align:center;width:100%;border-color:#EF5350;margin-top:0px;>  
<span style=color:#EF5350;word-spacing:10px;>Birth in the <span style=color:black;margin-left:3px;margin-right:3px;> __ __ __ ____ __  '.$colms[8].'__ __ ____ __  </span>   District in the <span style=color:black;margin-left:10px;margin-right:3px;>__ __ __ ____ __ __ __'.$colms[7].'_ _ __ __ __</span> Province</span> <br><br>


<table border=1 align=center width=100% style=border-left:0px;border-right:0px;border-bottom:0px;border-color:#EF5350;>
  <tr style=padding:10px;> 
       <td style=padding:7px;border-top:0px;border-left:0px;border-color:#EF5350;> <span style=padding:4%;color:#EF5350;>Entry No.</span></td>

       <td style=padding:7px;border-top:0px;border-left:0px;border-color:#EF5350;> 45959595959</td>

       <td style=padding:7px;border-top:0px;border-left:0px;border-color:#EF5350;> <span style=color:#EF5350;>Where Born </span> </td>

       <td style=padding:7px;border-top:0px;border-left:0px;border-color:#EF5350;width:200px;> '.$colms[15].'   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style=color:#EF5350;margin-left=30px;>Name</span></td>

       <td style=padding:7px;border-right:0px;border-left:0px;border-top:0px;border-color:#EF5350;> '.$colms[3].' '.$colms[1].'  '.$colms[2].'</td>
  </tr>


   <tr style=padding:10px;> 
       <td style=padding:7px;border-top:1px;border-left:1px;border-color:#EF5350;> <span style=padding:4%;color:#EF5350;>Date of Birth</span></td>
       <td style=padding:7px;border-top:1px;border-left:0px;border-color:#EF5350;> '.$colms[4].'</td>
       <td style=padding:7px;border-top:1px;border-left:0px;border-color:#EF5350;> <span style=color:#EF5350;>Sex </span> </td>
       <td style=padding:7px;border-top:1px;border-left:1px;border-color:#EF5350;> '.$colms[5].'   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=color:#EF5350;margin-left=30px;><span>Name of Father</span></td>
       <td style=padding:7px;border-top:1px;border-right:0px;border-left:0px;border-color:#EF5350;> '.$colms[11].'</td>
  </tr>

   <tr style=padding:5px;> 
       <td style=padding:10px;border-top:1px;border-left:1px;border-color:#EF5350;> <span style=padding:4%;color:#EF5350;>Name and Maiden Name of Mother</span></td>
       <td colspan =4  style=padding:10px;border-top:0px;border-left:0px;border-right:0px;border-color:#EF5350;> '.$colms[12].'</td>
     
  </tr>

    <tr style=padding:10px;> 
       <td colspan =2 style=padding:10px;border-top:1px;border-left:1px;border-color:#EF5350;> <span style=padding:4%;color:#EF5350;>Name and Description of Informant</span></td>
       <td colspan =3 style=padding:10px;border-top:0px;border-left:0px;border-right:0px;border-color:#EF5350;> '.$colms[14].'</td>
     
  </tr>


  <tr style=padding:10px;> 
       <td colspan =1 style=padding:8px;border-top:1px;border-left:1px;border-color:#EF5350;> <span style=padding:4%;color:#EF5350;>Name of Registering Officer</span></td>
       <td colspan =2 style=padding:8px;border-top:0px;border-left:0px;border-right:0px;border-color:#EF5350;> '.$colms[25].'</td>

       <td colspan =1 style=padding:10px;border-top:1px;border-color:#EF5350;> <span style=padding:4%;color:#EF5350;>Date of Registration</span></td>

       <td colspan =1 style=padding:10px;border-top:0px;border-left:0px;border-right:0px;border-color:#EF5350;> A.O 30/6/2020</td>

  </tr>
</table>

<p style=color:#EF5350;>I  __ __ __ __ __ __ __ __ __ __  __ __  __ __ __ __ _ <span style=color:black;>'.$colms[16].'  __ __ </span>    __ __  __ __ _ __ __ __ __ __ __ __ __ __ __ __ __ __ _ District/Assistant</p>

<span style=color:#EF5350;>  Registrar for   __ __  <span style=color:#000000>'.$colms[15].' __ __ </span> District, Hereby certify that this certificate is compiled from an entry/return in the registrar of births in the District</span>
<br>
<table border=0 width=100%>
   <tr>
       <td style=width:700px;>CRD/CA  of 30/07/2020   </td>
      
       <td> <img src=signature.svg width=100>  <br><span style=color:#EF5350;>District/Assistant Registrar</span>  </td>

   </tr>
</table>


<p style=color:#EF5350;>Given under the seal of the Director of Civil Registration on the _ _ <span style=color:#000000> '.$colms[19].' </span></p> 
<hr style=text-align:center;width:100%;border-color:#EF5350;margin-top:0px;>

<p style=color:#EF5350;>This certificate is issued in pursuance of the Births and Deaths Registration Act(CAP 149) which provides that a certified copy of any entry in any register returnpurporting to be sealed or stamped with the seal of the Registrar-General shall be received as evidence of the dates and facts therein contained without any
other proof of such entry. </span>


');


$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
ob_end_clean();
$f;
$l;
if(headers_sent($f,$l))
{
    echo $f,'<br/>',$l,'<br/>';
    die('now detect line');
}
$dompdf->stream("",array("Attachment" => false));
 file_put_contents($edit_notification_search.'.pdf', $dompdf->output());
exit(0);

?>
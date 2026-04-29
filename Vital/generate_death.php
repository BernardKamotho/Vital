<?php
namespace Dompdf;
require_once 'dompdf/autoload.inc.php';

include 'connect.php';

extract($_POST);

$sql  = "select * from deathcertificate_form where deceased_idno = '$edit_notification_search'";

$response = mysqli_query($connection, $sql);

// if(mysqli_num_rows($response) == 0){
//     echo "Record Not Found";
//     exit();
// }


$colms  = mysqli_fetch_array($response);

// if($colms[19] == 0){
//      echo "4"; //Not Approved
//      exit();
// }

// if($colms[17] == 1){
//      print "5"; //Approved
// }

$dompdf = new Dompdf(); 
$dompdf->loadHtml('<h3 style=text-align:center;color:#000000;>REPUBLIC OF KENYA</h3>
	<hr style=text-align:center;width:20%;border-color:#000000;>
	<span style=text-align:center;color:#000000;font-size:25px;><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CERTIFICATE OF DEATH</b> &nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; <span style=color:black;>'.$colms[0].'</span></span>

<hr style=text-align:center;width:100%;border-color:#000000;margin-top:0px;>	
<span style=color:#000000;word-spacing:10px;>Birth in the <span style=color:black;margin-left:3px;margin-right:3px;> __ __ __ ____  '.$colms[9].'__ __ ____   </span>   District in the <span style=color:black;margin-left:10px;margin-right:3px;>__ __ __ ____ __'.$colms[10].'_ _ __ __ </span> Province</span> <br><br>


<table border=1 align=center width=100% style=border-left:0px;border-right:0px;border-bottom:0px;border-color:#000000;>


  <tr style=padding:10px;> 
       <td style=padding:7px;border-top:0px;border-left:0px;border-color:#000000;> <span style=padding:4%;color:#000000;>Entry No.</span></td>

       <td colspan=2 style=padding:7px;border-top:0px;border-left:0px;border-color:#000000; width:300px;> 45959595959</td>

       <td style=padding:7px;border-top:0px;border-left:0px;border-color:#000000;width:300px;> <span style=color:#000000;>Name and Surname of Deceased </span> </td>

       <td  colspan=2 style=padding:7px;border-right:0px;border-left:0px;border-top:0px;border-color:#000000;width:300px;> '.$colms[4].' '.$colms[2].'  '.$colms[3].'</td>
  </tr>


   <tr style=padding:10px;> 
       <td style=padding:7px;border-top:1px;border-left:1px;border-color:#000000;> <span style=padding:4%;color:#000000;>Sex</span></td>
       <td style=padding:7px;border-top:1px;border-left:0px;border-color:#000000;> '.$colms[6].'</td>
       <td style=padding:7px;border-top:1px;border-left:0px;border-color:#000000;> <span style=color:#000000;>Age </span> </td>
       <td style=padding:7px;border-top:1px;border-left:1px;border-color:#000000;> '.$colms[7].'</td>
       <td style=padding:7px;border-top:1px;border-right:0px;border-left:0px;border-color:#000000;> Occupation</td>
       <td style=padding:7px;border-top:1px;border-right:0px;border-left:0px;border-color:#000000;> '.$colms[8].'</td>
  </tr>

   <tr style=padding:5px;> 
       <td style=padding:10px;border-top:1px;border-left:1px;border-color:#000000;> <span style=padding:4%;color:#000000;>Date of Death</span></td>
       <td  style=padding:10px;border-top:0px;border-left:0px;border-right:0px;border-color:#000000;> '.$colms[5].'</td>
       <td style=padding:10px;border-top:1px;border-left:1px;border-color:#000000;> <span style=padding:4%;color:#000000;>Place of Death</span></td>
       <td   style=padding:10px;border-top:0px;border-left:0px;border-right:0px;border-color:#000000;> '.$colms[11].'</td>
       
       <td style=padding:10px;border-top:1px;border-left:1px;border-color:#000000;> <span style=padding:4%;color:#000000;>Residence</span></td>
       <td  style=padding:10px;border-top:0px;border-left:0px;border-right:0px;border-color:#000000;> '.$colms[9].'</td>
     
  </tr>

    <tr style=padding:10px;> 
       <td colspan =2 style=padding:10px;border-top:1px;border-left:1px;border-color:#000000;> <span style=padding:4%;color:#000000;>Cause of Death</span></td>
       <td colspan =3 style=padding:10px;border-top:0px;border-left:0px;border-right:0px;border-color:#000000;> '.$colms[12].'</td>
     
  </tr>


  <tr style=padding:10px;> 
       <td style=padding:8px;border-top:1px;border-left:1px;border-color:#000000;> <span style=padding:4%;color:#000000;>Name of Registering Officer</span></td>
       <td colspan =2 style=padding:8px;border-top:0px;border-left:0px;border-right:0px;border-color:#000000;> B.A.Omondi</td>

       <td colspan =2 style=padding:10px;border-top:1px;border-color:#000000;> <span style=padding:4%;color:#000000;>Date of Registration</span></td>

       <td  style=padding:10px;border-left:0px;border-right:0px;border-color:#000000;> 30/6/2020</td>

  </tr>
</table>

<p style=color:#000000;>I  __ __ __ __ __ __ __ __ __ __  __ __  __ __ __ __ _ <span style=color:black;>D. Abwao  __ __ </span>    __ __  __ __ _ __ __ __ __ __ __ __ __ __ __ __ __ __ _ District/Assistant</p>

<span style=color:#000000;>  Registrar for   __ __  <span style=color:#000000>KANDUYI __ __ </span> District, Hereby certify that this certificate is compiled from an entry/return in the registrar of births in the District</span>
<br>
<table border=0 width=100%>
   <tr>
       <td style=width:700px;>DRD/CA  of 1/07/2020   </td>
      
       <td> <img src=signature.svg width=100>  <br><span style=color:#000000;>District/Assistant Registrar</span>  </td>

   </tr>
</table>


<p style=color:#000000;>Given under the seal of the Director of Civil Registration on the _ _ <b style=color:#000000>30th</b> _ __ __ _ day of _ __ _ <b style=color:#000000>July</b> _ __ _ , 2020</p> 
<hr style=text-align:center;width:100%;border-color:#000000;margin-top:0px;>

<p style=color:#000000;>This certificate is issued in pursuance of the Births and Deaths Registration Act(CAP 149) which provides that a certified copy of any entry in any register returnpurporting to be sealed or stamped with the seal of the Registrar-General shall be received as evidence of the dates and facts therein contained without any
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
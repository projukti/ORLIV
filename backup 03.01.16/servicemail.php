<?php
$name=$_REQUEST['name'];
$email=$_REQUEST['email'];
$con=$_REQUEST['con'];
$add=$_REQUEST['add'];
$job_type=$_REQUEST['job_type'];
$comp=$_REQUEST['comp'];
							
$to = "info@orliv.net";
$subject = "Service Relating Query";
$message = '<table width="650" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #CCC;">
  <tr>
    <td height="40" colspan="3" align="center" bgcolor="#fff1ab"><h2>SERVICE RELATING JOB</h2></td>
  </tr>
  <tr>
    <td height="20" colspan="3" align="center" class="job_txt">&nbsp;</td>
  </tr>
  <tr>
    <td width="255" height="40" align="left" class="job_txt">Name</td>
    <td width="69" align="center">:</td>
    <td width="320" height="40" align="left" class="error">'.$name.'</td>
  </tr>
  <tr>
    <td height="40" align="left" class="job_txt">Email</td>
    <td align="center">:</td>
    <td height="40" align="left" class="error">'.$email.'</td>
  </tr>
  <tr>
    <td height="40" align="left" class="job_txt">Contact</td>
    <td align="center">:</td>
    <td height="40" align="left" class="error">'.$con.'</td>
  </tr>
  <tr>
    <td height="40" align="left" class="job_txt">Address</td>
    <td align="center">:</td>
    <td height="40" align="left" class="error">'.$add.'</td>
  </tr>
  <tr>
    <td height="40" align="left" class="job_txt">Job Type</td>
    <td align="center">:</td>
    <td height="40" align="left" class="error">'.$job_type.'</td>
  </tr>
  <tr>
    <td height="40" align="left" class="job_txt">Complain</td>
    <td align="center">:</td>
    <td height="40" align="left" class="error">'.$comp.'</td>
  </tr>
 
</table>';

    $headers = "From: info@orliv.net\r\nReply-To: info@orliv.net";
	$headers .= "\r\nMIME-Version: 1.0\r\nContent-Type: text/html; charset=iso-8859-1";
				
mail($to, $subject, $message, $headers);		

echo "<script> window.location= 'contact_orliv.php'; </script>";


ob_flush();
?>
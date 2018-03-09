<?php
	if(!$_SERVER['HTTP_X_REQUESTED_WITH'])
	{
	   header("HTTP/1.0 403 Forbidden");
	   exit;
	}
	
	$name 			= $_REQUEST['name'];
	$email 			= $_REQUEST['email'];
	$jobtitle 		= $_REQUEST['jobtitle'];
	$organization 	= $_REQUEST['organization'];
	$phone 			= $_REQUEST['phone'];
	$title = 'US | Case Studies: West Los Angeles College - Download';
	$toArr = array("Ashwin" => 'ashwin@quscient.com', "Babu" =>'babu@quscient.com', "Marketing" => 'marketing-ops@engage2serve.com', "Mary Allen" => 'mary.allen@engage2serve.com');
	//$toArr = array("Kathick" =>'karthick.thulukkanam@quscient.com', "Karthikeyan" => 'karthikeyan.p@quscient.com');
	$arr = array('Name' => $name, 'Email' => $email, 'Job Title' => $jobtitle, 'Organization' => $organization, 'Contact No.' => $phone);
	
	/*sendMail( $title, $arr, $toArr );*/
	if( sendMail( $title, $arr, $toArr ) ) {
		echo true;
	}
	else {
		echo false;
	}

	function sendMail( $title, $arr, $toArr ) {

		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
		$headers .= 'From: <info@engage2serve.com>' . "\r\n";
		$mailsubject =  $title;
			
		$out = '<table>';
		foreach( $arr as $key => $value ) {
			$out.= '<tr>';
			$out.= '<td>'.$key.'</td>';
			$out.= '<td>&nbsp;</td>';
			$out.= '<td>:</td>';
			$out.= '<td>&nbsp;</td>';
			$out.= '<td>'.$value.'</td>';
			$out.= '</tr>';
		}
		$out.= '</table>';
		$to = implode(',',$toArr);
		if(mail ($to, $mailsubject, $out, $headers)) {
			return true;
		}
		else {
			return false;
			 echo "email error";
		}
			
	}
	
	$headers1 = "MIME-Version: 1.0" . "\r\n";
	$headers1 .= "Content-type:text/html;charset=utf-8" . "\r\n";
	$headers1 .= 'From: info@engage2serve.com' . "\r\n";
	$headers1 .= 'X-Mailer: PHP/' . phpversion();
	$mailsubject1 =  'Thank you for downloading our case study';
	$message1 = '<html>';
	$message1 .= '<body>';
	$message1 .= '<table border="0" cellspacing="0" cellpadding="0" width="600" align="center" style="border:1px solid #ccc;">';
	$message1 .= '<tr>';
	$message1 .= '<td bgcolor="#1b4164">';
	$message1 .= '<table border="0" cellspacing="0" cellpadding="0" bgcolor="#1b4164"><tr><td colspan="3" height="15"></td></tr><tr><td width="35"></td><td width="530"><img src="http://simg.minglebox.com:80/logo1498220215988.518f8974png"/></td><td width="35"></td></tr><tr><td colspan="3" height="15"></td></tr></table>';
	$message1 .= '</td>';
	$message1 .= '</tr>';
	$message1 .= '<tr><td height="2" bgcolor="#3cc2b4"></td></tr>';
	$message1 .= '<tr>';
	$message1 .= '<td>';
	$message1 .=  '<table border="0" cellspacing="0" cellpadding="0" style="font-family:arial; font-size:14px; line-height:19px;">';
	$message1 .=  '<tr><td colspan="3" height="25"></td></tr>';
	$message1 .=  '<tr>';
	$message1 .=  '<td width="35"></td>';
	$message1 .=  "<td width='530'> Hi ". $name .",<br/><br/>";
	$message1 .=  "Thank you for downloading our case study. I hope you found it a useful read.
<br/><br/>
e2s provides student lifecycle solutions for personalized mobile engagements and cohesive communication among campus constituents. 
<br/><br/>
Publish content, manage events and appointments, create a knowledge base, and build a central hub of communication in mobile platform through e2s. 
<br/><br/>
Subscribe to our <a href='http://www.engage2serve.com/blog/' target='_blank'>blog</a> to get regular updates on our product and its features. 
<br/><br/>
If our product interests you, <a href='http://www.engage2serve.com/contact-us.html' target='_blank'>schedule</a> a product demo at your convenient time and our team will be happy to guide you.
<br/><br/>
      <span style='color:#1b4164; font-weight:bold;'> Best Wishes,<br/>
      The engage2serve Team<br/> 
	  +1 (512) 861-4141</span></td>";
	$message1 .=  '<td width="35"></td>';
	$message1 .=  '</tr>';
	$message1 .=  '<tr><td colspan="3" height="25"></td></tr>';
	$message1 .=  '</table>';
	$message1 .= '</td>';
	$message1 .= '</tr>';
	$message1 .= '<tr><td height="3" bgcolor="#2d2d2d"></td></tr>';
	$message1 .= '</table>';
	$message1 .= '</body>';
	$message1 .= '</html>';
	 
	$to1 = $email;
	mail ($to1, $mailsubject1, $message1, $headers1);
?>
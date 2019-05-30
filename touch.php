<?php 
if (isset($_POST['submit'])) {
		   $email = "geeksocietyfet@gmail.com"
		   $query = "SELECT * FROM users WHERE email='$email'";
			$results = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($results);
  if (mysqli_num_rows($results) == 1) {
	  $otp=rand(100000,999999);
	   $query6 = "UPDATE users SET otp='$otp' where email='$email' ";
		mysqli_query($conn, $query6);
  $id=$row['id'];
	$cmail="info@geeksociety.ga";
    $to=$email;

    $from="From: Geek Society<$cmail>";
    $subject="Email sent from Geek ";

    $headers = "From:Geek Society <$cmail> \r\n"; ;
    $headers = 'Mobile: ' . $email."\r\n" ;
    $headers .='Reply-To: '. $to . "\r\n" ;
    $headers .='X-Mailer: PHP/' . phpversion();
    $headers .= "MIME-Version: 1.0\r\n"; 
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

    $message = '<html><body><div style="padding:10px;background-color:white;"></div>';
          $message .='<div align="center"><img src="logo3.jpg" width="170px" height="60px">    <span style="color:orange;font-size: 35px;">
</span></div><br><br><br><div align="center" style="color:black;font-family:Sans-Serif;font-weight: bold;font-size:18px;">Thank you for appointment</div> <br><br>';
          $message .= '<div  style="color:black;">Dear ,<br><br>Greetings for the day!<br><br><br><br>An appointment has been made on  <b></b> between.
 <br><br>It would be great if a family member or a friend could attend this appointment with you. It would also be helpful if you could have with you a list of all of your current medication  <b></b><br><br>This is an auto generated response to let you know that we have received your request. Meanwhile you can also contact us at:<a href="verify.php?t=1&id='.urlencode($id).'&otp='.urlencode($otp).'"> Next </a>

<br><br>
• Call us at: +91-1334-224625, +91-9837178358<br><br>
• Mail at:  info@singhaldiabeticclinic.com<br><br>
• Visit <a href="www.singhaldiabeticclinic.com">www.singhaldiabeticclinic.com</a><br><br><br><br>

<h2>Regards</h2><br>
<b>SINGHAL DIABETIC CLINIC</b>
,<br><br> Vivek Vihar, Old Ranipur More<br> Haridwar (Uttarakhand) India - 249 401</div>';
          $message .= '</div></body></html>';
		  
    if(mail($to,$subject,$message,$headers,"-finfo@theclosetdetox.com")) {
    echo('<script>
    alert("Email Sent Sucessfully, We will contact you soon!");
    window.location.href = "http://theclosetdetox.com/index.php";
</script>');
}
else
{
    echo("<p>Email Message delivery failed...</p>");
}
  }
  else{
	 echo "<script type='text/javascript'>
			alert('Email Not Registerd');
			</script>"; 
  }
	   }
   

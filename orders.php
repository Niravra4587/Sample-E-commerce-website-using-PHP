<?php
$url="https://api.razorpay.com/v1/orders";
$key="rzp_test_nbCRQQCIAP7e3j";
$token="3B1VNJVhzPRFGJV0sSNnb7SC";
$rec="KTT_".date('Y'.'m'.'d'.'H'.'i'.'s');
$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_POST,true);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_USERPWD,$key.":".$token);
curl_setopt($ch,CURLOPT_HTTPHEADER,array('content-type: application/json'));
$data= <<< JSON
{
   "amount":1000,
   "currency":"INR",
   "receipt":"$rec",
   "notes":{
    "name":"abc",
    "email":"abc@123.com",
   }
   
}
JSON;
curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
$response=curl_exec($ch);
$decode=json_decode($response);
$order_id=$decode->id;
echo $response;
?>

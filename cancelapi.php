<?php
include('constants.php');
include('commonModules.php');

$cancel_Type = $_POST['Cancel_Type'];
$transactionId = $_POST['TransactionId'];
$transAmount = $_POST['TransAmount'];

$headr = array();
$headr[] = 'Accept: application/json';
$headr[] = 'Content-Type: application/json';
$json_token_array = array('partnerAPIId' => PARTNER_API_ID
	                     ,'partnerAPIKey' => PARTNER_API_KEY);

$http_status = 0;
$ret = Curl(CREATE_TOKEN_URL, json_encode($json_token_array), $http_status, $headr);
$res_array = json_decode($ret);
if(isset($res_array->error)){
	print_r("<script>alert('" . $res_array->error->detail . "'); self.close();</script>");
	return;
}

$teken = $res_array->data;
$headr = array();
$headr[] = 'Accept: application/json';
$headr[] = 'Content-Type: application/json';
$headr[] = 'Authorization: ' . $teken;
$json_array = array('cancelType' => $cancel_Type
	               ,'transactionId' => $transactionId
	               ,'transAmount' => $transAmount);

$ret = Curl(CANCEL_PAYMENT_URL, json_encode($json_array), $http_status, $headr);
$res_array = json_decode($ret);
if(isset($res_array->error)){
	print_r("<script>alert('" . $res_array->error->detail . "'); self.close();</script>");
	return;
}

$data = $res_array->data;
$res_data = $data->resultCode .'/';
if($data->resultCode != 'SUCCESS'){
	$res_data .= $data->resultMessage .'/';
	$res_data .= $data->resultNMessage .'/';
}
$res_data .= $data->transactionId .'/';
$res_data .= $data->cancelDataTime;

print_r($res_data);
?>
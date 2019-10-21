<?php
include('constants.php');
include('commonModules.php');

$payment_Type = $_POST['Payment_Type'];
$pgCode = $_POST['PGCode'];
$orderNo = $_POST['OrderNo'];
$transAmount = $_POST['TransAmount'];
$notiUrl = $_POST['NotiUrl'];
$returnUrl = $_POST['ReturnUrl'];
$cancelUrl = $_POST['CancelUrl'];
$orderInfo = $_POST['OrderInfo'];
$email = $_POST['Email'];
$additionalInfo = $_POST['AdditionalInfo'];

$json_array = array('partnerAPIId' => PARTNER_API_ID
	               ,'partnerAPIKey' => PARTNER_API_KEY
	               ,'paymentType' => $payment_Type
	               ,'pgCode' => $pgCode
	               ,'orderNo' => $orderNo
	               ,'transAmount' => $transAmount
	               ,'notiUrl' => $notiUrl
	               ,'returnUrl' => $returnUrl
	               ,'cancelUrl' => $cancelUrl
	               ,'orderInfo' => $orderInfo
	               ,'email' => $email
	               ,'additionalInfo' => $additionalInfo);

$http_status = 0;
$headr = array();
$headr[] = 'Accept: application/json';
$headr[] = 'Content-Type: application/json';
$ret = Curl(PAYMENT_ENCRYPT_URL, json_encode($json_array), $http_status, $headr);
$res_array = json_decode($ret);
if(isset($res_array->error)){
	print_r("<script>alert('" . $res_array->error->detail . "'); self.close();</script>");
	return;
}

$enc_data = $res_array->data;
$req_url = REQUEST_PAYMENT_URL . $pgCode;
$req_html = "<form id='payboxsubmit' name='payboxsubmit' action='" . $req_url . "' method='GET'>";
$req_html .= "<input type='hidden' name='param' value='" . $enc_data . "'/>";
$req_html .= "<script>document.forms['payboxsubmit'].submit();</script>";

print_r($req_html);
?>
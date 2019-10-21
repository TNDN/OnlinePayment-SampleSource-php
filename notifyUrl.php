<?php
include('constants.php');
include('commonModules.php');

$post_data = file_get_contents("php://input");

if ($post_data == "")
{
    //FAIL로 응답 시 최대 10회까지 재 전송 처리
    print_r("<xml><returnCode><![CDATA[FAIL]]></returnCode></xml>");
    return;
}

$res_data = json_decode($post_data);

//print_r("TransactionId=" . $res_data->transactionId . "<br/>");
//print_r("TransactionDateTime=" . $res_data->transactionDateTime . "<br/>");
//print_r("TransactionCurrency=" . $res_data->transactionCurrency . "<br/>");
//print_r("TransactionPGCode=" . $res_data->transactionPGCode . "<br/>");
//print_r("OrderNo=" . $res_data->orderNo . "<br/>");

//print_r("OrderInfo=" . $res_data->orderInfo . "<br/>");
//print_r("TransAmount=" . $res_data->transAmount . "<br/>");
//print_r("Email=" . $res_data->email . "<br/>");
//print_r("AdditionalInfo=" . $res_data->additionalInfo . "<br/>");

//print_r("ExchangeCurrecy=" . $res_data->exchangeCurrecy . "<br/>");
//print_r("ExchangeAmount=" . $res_data->exchangeRate . "<br/>");
//print_r("ExchangeRate=" . $res_data->exchangeAmount . "<br/>");
print_r("<xml><returnCode><![CDATA[SUCCESS]]></returnCode></xml>");
?>
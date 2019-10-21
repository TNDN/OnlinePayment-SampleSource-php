<?php
include('constants.php');
include('commonModules.php');

$resultCode = $_GET['resultCode'];
$resultMessage = $_GET['resultMessage'];
$resultNMessage = $_GET['resultNMessage'];
$paymentType = $_GET['paymentType'];
$orderNo = $_GET['orderNo'];

$orderInfo = $_GET['orderInfo'];
$transAmount = $_GET['transAmount'];
$email = $_GET['email'];
$additionalInfo = $_GET['additionalInfo'];


if ("SUCCESS" == $resultCode)
{
    //결제 성공
    print_r("resultCode=" . $resultCode . "<br/>");
    print_r("resultMessage=" . $resultMessage . "<br/>");
    print_r("paymentType=" . $paymentType. "<br/>");
    print_r("orderNo=" . $orderNo. "<br/>");
    print_r("orderInfo=" . $orderInfo. "<br/>");
    print_r("transAmount=" . $transAmount. "<br/>");
    print_r("email=" . $email. "<br/>");
    print_r("additionalInfo=" . $additionalInfo);
}
else
{
    //결제 실패

    print_r("resultCode=" . $resultCode . "<br/>");
    print_r("resultMessage=" . $resultMessage . "<br/>");
    print_r("resultNMessage=" . $resultNMessage);
}
?>
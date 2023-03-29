<?php
header("Content-Type: application/json");

$stkCallbackResponse = file_get_contents('php://input');
$logFile = "stkTinypesaResponse.json";
$log = fopen($logFile, "a");
fwrite($log, $stkCallbackResponse);
fclose($log);

$callbackContent = json_decode($stkCallbackResponse);
$ResultCode = $callbackContent->Body->stkCallback->ResultCode;
$CheckoutRequestID = $callbackContent->Body->stkCallback->CheckoutRequestID;
$Amount = $callbackContent->Body->stkCallback->CallbackMetadata->Item[0]->Value;
$MpesaReceiptNumber = $callbackContent->Body->stkCallback->CallbackMetadata->Item[1]->Value;
$PhoneNumber = $callbackContent->Body->stkCallback->CallbackMetadata->Item[4]->Value;
$Reference = $callbackContent->Body->stkCallback->ExternalReference;

if ($ResultCode == 0) {
    $localhost = "localhost";
    $username = "root";
    $password = "";
    $database = "tinybills";
    
    $conn = mysqli_connect($localhost, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("<h1>Connection failed:</h1> " . $conn->connect_error);
    } else {
        $insert = $conn->query("INSERT INTO tinypesa(CheckoutRequestID,ResultCode,amount,MpesaReceiptNumber,PhoneNumber,Reference) VALUES ('$CheckoutRequestID','$ResultCode','$Amount','$MpesaReceiptNumber','$PhoneNumber','$Reference')");
        if ($insert == TRUE) {
            echo "New record created";
        } else {
            echo "Error: " . $conn->error;
        }
        $conn = null;
    }
}
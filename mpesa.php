<?php
if (isset($_POST['email']) && isset($_POST['phone'])) {
    // Get the form data
    $account_no = $_POST['email'];
    $phone = $_POST['phone'];
    $amount = '1';

    // Validate the form data
    if (empty($phone)) {
        // Send a 400 Bad Request response if the phone number is missing
        http_response_code(400);
        echo json_encode(array('error' => 'Missing phone number'));
        exit;
    }

    // Send an STK push request to M-Pesa
    $url = 'https://tinypesa.com/api/v1/express/initialize';
    $data = array(
        'amount' => $amount,
        'msisdn' => $phone,
        'account_no' => $account_no
    );
    $headers = array(
        'Content-Type: application/x-www-form-urlencoded',
        'ApiKey: UX0bRhL3c20' // Replace with your API key
    );
    $info = http_build_query($data);
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $info);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    $resp = curl_exec($curl);
    $msg_resp = json_decode($resp);

    // Send the appropriate response based on the STK push response
    if ($msg_resp->success == 'true') {
        // Redirect back to the HTML page with the response data in the URL
        $redirect_url = "index.php?status=success&message=STK PUSH Initiated. Enter your Pin to Complete 🔥&account=$account_no";        header('Location: ' . $redirect_url);
        exit;
    } else {
        // Redirect back to the HTML page with the response data in the URL
        $redirect_url = "index.php?status=error&message=STK push request failed&account=$account_no";
        header('Location: ' . $redirect_url);
        exit;
    }
} else {
    // Redirect back to the HTML page with the response data in the URL
    $redirect_url = 'index.php?status=error&message=Missing form data';
    header('Location: ' . $redirect_url);
    exit;
}
?>
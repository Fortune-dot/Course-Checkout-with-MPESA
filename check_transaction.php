<?php
if(isset($_GET['account']) && $_GET['status'] == "success"){
  $account_no = $_GET['account'];
  // Establish a database connection
   include_once('./conn.php');
  // Prepare the SQL query
  $sql = "SELECT * FROM tinypesa WHERE Reference = '$account_no'";

  // Execute the query
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    // Return a success message
    echo json_encode(array('status' => 'success', 'message' => 'Transaction successful!'));
  } else {
    // Return an error message
    echo json_encode(array('status' => 'error', 'message' => 'Transaction failed!'));
  }

} else {
  echo "Account number not provided";
}
?>
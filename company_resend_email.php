<?php
session_start();
  $email=$_SESSION['company_email'];
  $_SESSION['company_email']=$email;
  $_SESSION['company_message']="E-mail was sent again !";

require_once('db/dbconn.php');

$sql = "SELECT company_profile_verify FROM company_profile WHERE company_profile_email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $email_verification=$row["company_profile_verify"];
    }
}
$conn->close();
$_SESSION['company_email_verification']=$email_verification;


header('Location: company_mail.php');
 ?>

<?php
session_start();

include("../config/dbconf.php");

function encryptsha($user,$pass) {
  $user = strtoupper($user);
  $pass = strtoupper($pass);
  return sha1($user.':'.$pass);
}

$userlogin = $_POST['loginuser'];
$passlogin = encryptsha($userlogin, $_POST['loginpass']);


$stmt = $conn->prepare("SELECT username FROM account WHERE username = ? AND sha_pass_hash = ?");
$stmt->bind_param("ss", $userlogin, $passlogin);
$stmt->execute();
$stmt->store_result();
if($stmt->num_rows > 0) {
  echo "success";
  $_SESSION['username'] = $userlogin;
  // if ($_SESSION['username'] != NULL) {
  //     //header("location: ../pages/info.php"); 
  //     header("location: /?p=info"); 
  //     exit;           
  // }
  //echo "<div class='alert alert-success'><strong>Success!</strong> You will be logged in on next page refresh</div>";
}else{
  echo "failed";
}
?>

<?php
session_start();

include("../config/dbconf.php");

function encryptsha($user,$pass) {
  $user = strtoupper($user);
  $pass = strtoupper($pass);
  return sha1($user.':'.$pass);
}

$username = $_POST['loginuser'];
$password = encryptsha($username, $_POST['loginpass']);

$stmt = $conn->prepare("SELECT username FROM account WHERE username = ? AND sha_pass_hash = ?");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$stmt->store_result();
if($stmt->num_rows > 0) {
  $_SESSION['username'] = $username;
  if ($_SESSION['username'] != NULL) {
      //header("location: ../pages/info.php"); 
      header("location: /?p=info"); 
      exit;           
  }
   //echo "<div class='alert alert-success'><strong>Success!</strong> You will be logged in on next page refresh</div>";
}else{
  $login_error = "Username or Password is not correct !";
  header("location: /?p=info");
}
?>

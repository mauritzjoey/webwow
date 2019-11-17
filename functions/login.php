<?php
// Start Session
session_start();

// Including dbconf.php so that we can connect to the database
include("../config/dbconf.php");

// Function to encrypt password from username:password to sha1 encryption
function encryptsha($user,$pass) {
  $user = strtoupper($user);
  $pass = strtoupper($pass);
  return sha1($user.':'.$pass);
}

// Setting up variables with a POST method from html form.
$username = $_POST['user'];
$password = encryptsha($username, $_POST['pass']);


// Preparing the query
$stmt = $conn->prepare("SELECT username FROM account WHERE username = ? AND sha_pass_hash = ?");

// Binding the Parameters
$stmt->bind_param("ss", $username, $password);

// Execute Query
$stmt->execute();

// Store Result
$stmt->store_result();

// Check if row exist
if($stmt->num_rows > 0) {
  $_SESSION['username'] = $username;

  if ($_SESSION['username'] != NULL) {
        // code...
  }
  echo "<div class='alert alert-success'><strong>Success!</strong> You will be logged in on next page refresh</div>";
}else{
  echo "<div class='alert alert-danger'><strong>Failed to Login!</strong>Username or Password is not correct !</div>";
}
?>

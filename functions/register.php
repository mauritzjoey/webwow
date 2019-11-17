<?php
if(isset($_POST['g-recaptcha-response']) && $_POST['g-recaptcha-response']) {
 include('../config/webconf.php');
 $ip = $_SERVER['REMOTE_ADDR'];
 $captcha = $_POST['g-recaptcha-response'];
 $rsp = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remoteip=$ip");
 $arr = json_decode($rsp,TRUE);
 if($arr['success']) {
    include('../config/dbconf.php');

    function encrypt($user, $pass) {
      $user = strtoupper($user);
      $pass = strtoupper($pass);
      return sha1($user.':'.$pass);
    }
	
	function checkmail($email) {
		$domains = array(
			'.com',
			'.co.id',
			'.id',
			'.org',
			'.net'
		);
		foreach($domains AS $domain) {
			if (strpos($email, $domain) !== false) {
				return true;
			}
		}
	}

    $username = $_POST['user'];
    $password = encrypt($username, $_POST['pass']);
    $email = $_POST['email'];
    $exp = $_POST['exp'];

    $count = 0;
	
    $stmt = $conn->prepare("SELECT * FROM account WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    if($stmt->num_rows > 0) {
      $count = 1;
    }
	
	if($count == 0) {
		$stats = checkmail($email);
		if($stats == false){
			$count = 50;
		} else {
			$stmt = $conn->prepare("SELECT * FROM account WHERE email=?");
			$stmt->bind_param("s", $email);
			$stmt->execute();
			$stmt->store_result();
			if($stmt->num_rows > 0) {
			  $count = 51;
			}
		}
	}

    if($count == 0) {
      $sql = "INSERT INTO account (username,sha_pass_hash,email,expansion) VALUES(?, ?, ?, ?)";
      $stmt = $conn->prepare($sql);	
      $stmt->bind_param("sssi",$username, $password, $email, $exp);
      if($stmt->execute()) {
        echo "registered";
      }else{
        echo "Failed to register<br>" . $stmt->error;
      }

    }else{
      echo $count;
    }
  }else{
    echo "Captcha Failed !";
  }
}else{
  echo "Please verify that you are not a robot !";
}
?>

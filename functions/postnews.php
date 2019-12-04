<?php
include('../config/dbconf.php');

$date       = new DateTime();
$title      = "test";
$content    = $_POST["data"];
$author     = "saya";
$post_date  = $date->gettimestamp();

    $sql = "INSERT INTO news (title,content,author,post_date) VALUES(?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);	
    $stmt->bind_param("ssss",$title, $content, $author, $post_date);
    if($stmt->execute()) {
        echo "Posted";
    }else{
        echo "Failed to register<br>" . $stmt->error;
    }

?>

<?php
//session_start();
if($_SESSION['username'] != 'q'){
  header("location: /?p=notfound");
}

$submit_error = "";
$empty_error = "";

include('config/dbconf.php');
if(isset($_POST['submit'])){
    if(isset($_POST['editor']) && !empty($_POST['editor'])){
        $content = $_POST['editor'];
        $title = $_POST['title'];
        $author = $_POST['author'];
    }else{
        $empty_error = '<b class="text-danger text-center>Please fill text area</b>';
    }
}

if(isset($content) && !empty($content)){
    $sql = "INSERT INTO news (title,content,author) VALUES ('$title','$content','$author')";
    if(mysqli_query($newsconn,$sql)){
        $submit_error = '<b class="text-success text-center">Sukses bro</b>';
    }else{
        $submit_error = '<b class="text-danger text-center">gagal</b>';
    }
}
?>

<div class="signin-form">
  <div class="container">
    <div class="row">
      <div class="col-sm col-xs">
        <div class="panel panel-default">
          <div class="panel-heading">Text Editor</div>
          <div class="panel-body">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" id="title" class="form-control" name="title" required>
                </div>
                <div class="form-group">
                    <label for="author">Author:</label>
                    <input type="text" id="author" class="form-control" name="author" required>
                </div>
                <textarea class="ckeditor" id="editor" name="editor"></textarea>
                <button type="submit" class="btn btn-primary" name="submit" id="btn-postnews" value="SUBMIT">Post</button>
            </form>
            <?php echo "<div id='success'>$submit_error $empty_error</div>";?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
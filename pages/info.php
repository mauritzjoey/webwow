<?php
  $username = "";
  if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
  }
?>

<div class="signin-form">
  <div class="container">
    <div class="row">
      <div class="col-sm-3 col-xs-12">
        <div class="panel panel-default">
          <div class="panel-heading">Login</div>
          <div class="panel-body">
          <?php
            //session_start();
            if($username == ""){
              echo "<form action='functions/login.php' method='POST' class='myForm' autocomplete='off'>";
              echo "<div class='form-group'>";
              echo "<label for='loginuser'>Username:</label>";
              echo "<input type='text' class='form-control' id='loginuser' name='loginuser'>";
              echo "</div>";
              echo "<div class='form-group'>";
              echo "<label for='loginpass'>Password:</label>";
              echo "<input type='password' class='form-control' id='loginpass' name='loginpass' autocomplete='new-password'>";
              echo "</div>";
              echo "<button type='submit' class='btn btn-primary'>Login</button>";
            }
            else{
              echo "Welcome, $username";
            }
          ?>
          </div>
        </div>

        <div class="panel panel-default">
          <div class="panel-heading">Server Status</div>
          <div class="panel-body">
            <center>
              <?php
              include('config/dbconf.php');
              function getplayercount() {
                include('config/dbconf.php');
              
                $online = 1;
              
                mysqli_select_db($conn, $chardb);
                $stmt = $conn->prepare("SELECT * FROM characters WHERE online = ?");
                $stmt->bind_param("i", $online);
                $stmt->execute();
                $stmt->store_result();
                if($stmt->num_rows > 0) {
                  echo $stmt->num_rows;
                }else{
                  echo 0;
                }
              }
              function onlinestatus($realm, $portnr) {

                error_reporting(0);
                $fp = (fsockopen($realm, $portnr, $errno, $errstr,3));
                  if($fp) {
                  return "Server <font color='00ff00'>Online</font>";
                  }else{
                  return "Server <font color='ff0000'>Offline</font>";
                  }
              }
              // exec('Tasklist | findstr "worldserver.exe"', $output);
              // if(empty($output)) {
                // echo "Server <font color='ff0000'>Offline</font>";
              // }else{
                // echo "Server <font color='00ff00'>Online</font>";
              // }
              $status = onlinestatus($realm, $portnr);
              echo $status;
              ?>
            </center>
            <div class="progress">
              <div class="progresstext"><?php echo getplayercount(); ?>/100 Players Online</div>
              <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="<?php echo getplayercount(); ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo getplayercount(); ?>%">
              </div>
            </div>
              <center>
              <?php
                include('config/dbconf.php');
                echo "set realmlist <font color = '00ff00'><b>$realm</b></font>";
              ?>
              </center>
          </div>
        </div>
      </div>    
      <div class="col-sm-9 col-xs-12">
        <div class="panel panel-default">
          <div class="panel-heading">Server News</div>
          <div class="panel-body">
            <?php
              include('config/dbconf.php');

              mysqli_select_db($conn, $webdb);
              $stmt = $conn->prepare("SELECT title, content, author, post_date FROM news order by post_date desc limit 10");
              $stmt->execute();
              $stmt->bind_result($title, $content, $author, $postdate);
              $stmt->store_result();
              if($stmt->num_rows > 0) {
                while($stmt->fetch()) {
                  echo "<div class='panel panel-default'>";
                  echo "<div class='panel-heading'>".$title."<small style='text-align:right;float:right;'><i>".$author." On ".date("F j, Y H:i:s", strtotime($postdate))."</i></small></div>";
                  echo "<div class='panel-body'>";
                  echo "<p>$content</p>";
                  echo "</div>";
                  echo "</div>";  
                }
              }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


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
          <div class="panel-heading">
          <?php
            if($username == ""){
              echo "Login";
            }else{
              echo "User Information";
            }
          ?>
          </div>
          <div id="error"></div>
          <div class="panel-body">
          <?php
            //session_start();
            include('config/dbconf.php');
            if($username == ""){
              echo "<form action='functions/login.php' method='POST' id='login-form' autocomplete='off'>";
              echo "<div class='form-group'>";
              echo "<label for='loginuser'>Username:</label>";
              echo "<input type='text' class='form-control' id='loginuser' name='loginuser'>";
              echo "</div>";
              echo "<div class='form-group'>";
              echo "<label for='loginpass'>Password:</label>";
              echo "<input type='password' class='form-control' id='loginpass' name='loginpass' autocomplete='new-password'>";
              echo "</div>";
              echo "<button type='submit' class='btn btn-primary' value='login' id='btn-login'>Login</button>";
              echo "</form>";
            }
            else{
              echo "<p>Welcome, <b>".$username."</b> (<a href='/?p=logout'>Logout</a>)</p>";
              mysqli_select_db($conn, $accdb);
              $stmt = $conn->prepare("SELECT username, email, joindate, last_ip, dt, ac.gmlevel
                                      FROM account a
                                      LEFT JOIN account_access ac on a.id = ac.id
                                      WHERE username = ?");
              $stmt->bind_param('s',$username);
              $stmt->execute();
              $stmt->bind_result($accname, $accemail, $accjoindate, $acclastip, $accdt, $accrank);
              $stmt->store_result();
              if($stmt->num_rows > 0) {
                while($stmt->fetch()){
                  switch($accrank){
                    case NULL:
                      $accgmlevel = "Player";
                    break;

                    case"3":
                      $accgmlevel = "GameMaster Head";
                    break;

                    case"2":
                      $accgmlevel = "GameMaster Level 2";
                    break;

                    case"1":
                      $accgmlevel = "GameMaster Level 1";
                    break;
                  }

                  echo "Email&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&thinsp;: ".$accemail;
                  echo "<br>Join Date&emsp;&emsp;&emsp;: ".date("j F Y", strtotime($accjoindate));
                  echo "<br>Account Rank&emsp;: ".$accgmlevel;
                  echo "<br>Donation Token&nbsp;: ".$accdt;
                  echo "<br>Last Login IP&emsp;&thinsp;&thinsp;: ".$acclastip;
                }
              }
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
                  return "<p style='text-align:center'><img src='images/wotlk.png' title='wotlk'><b>Ratchet WoW PVP </b><img src='images/online.png' title='online'></p>";
                  }else{
                  return "<p style='text-align:center'><img src='images/wotlk.png' title='wotlk'><b>Ratchet WoW PVP </b><img src='images/offline.png' title='offline'></p>";
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
        <div class="panel panel-default">
          <div class="panel-heading">Latest Server News</div>
          <div class="panel-body">
          <?php
            include('config/dbconf.php');

            mysqli_select_db($conn, $webdb);
            $stmt = $conn->prepare("SELECT id,title, content, author, post_date FROM news order by post_date desc limit 5");
            $stmt->execute();
            $stmt->bind_result($newsid, $title, $content, $author, $postdate);
            $stmt->store_result();
            if($stmt->num_rows > 0) {
                while($stmt->fetch()) {
                  echo "<div class='news'>".$title." (<a href='/?p=newsbyid?id=".$newsid."' target='_blank'>view</a>)</div><small style='text-align:right;float:right;'><i>".date("j M y", strtotime($postdate))."</i></small>";
                  echo "<hr />";
                }
            }
          ?>
          <a href="/?p=news" target="_blank">See All News...</a>
          </div>
        </div>
      </div>

      <div class="col-sm-9 col-xs-12">
        <div class="panel panel-default">
          <div class="panel-heading"><center>Server Announcements</center></div>
            <?php
              echo "<center>announce!</center>"
            ?>
      </div>
    </div>

      <div class="col-sm-9 col-xs-12">
        <div class="panel panel-default">
          <!-- <div class="panel-heading">Server Information</div>
          <div class="panel-body"> -->
            <?php
              include('config/dbconf.php');

              mysqli_select_db($conn, $webdb);
              $stmt = $conn->prepare("SELECT title, content, post_date FROM info order by post_date asc limit 5");
              $stmt->execute();
              $stmt->bind_result($title, $content, $postdate);
              $stmt->store_result();
              if($stmt->num_rows > 0) {
                while($stmt->fetch()) {
                  // echo "<div class='panel panel-default'>";
                  // echo "<div class='panel-heading'>".$title."<small style='text-align:right;float:right;'><i>".$author." On ".date("F j, Y H:i:s", strtotime($postdate))."</i></small></div>";
                  echo "<div class='panel-heading'><center>".$title."</center></div>";
                  echo "<div class='panel-body'>";
                  echo "<p>$content</p>";
                  echo "</div>";
                  // echo "</div>";  
                }
              }
            ?>
          <!-- </div>
        </div> -->
      </div>
    </div>
  </div>
</div>


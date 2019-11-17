<div class="signin-form">
  <div class="container">
  <div class="row">
    <div class="col-sm-3 col-xs-12">
        <div class="panel panel-default">
          <div class="panel-heading">Login</div>
          <div class="panel-body">
            <form action='functions/login.php' method='POST' class='myForm' autocomplete='off'>
              <div class='form-group'>
                <label for='loginuser'>Username:</label>
                <input type='text' class='form-control' id='loginuser' name='user'>
              </div>
              <div class='form-group'>
                <label for='loginpass'>Password:</label>
                <input type='password' class='form-control' id='loginpass' name='pass' autocomplete='new-password'>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
    </div>
    <div class="col-sm-9 col-xs-12">
      <div class="panel panel-default">
        <div class="panel-heading">Server Information</div>
      </div>
    <!-- </div> -->
      <div class="col-sm-9 col-xs-12">
        <div class="panel panel-default">
          <?php
            include('config/dbconf.php');

            mysqli_select_db($conn, $webdb);
            $stmt = $conn->prepare("SELECT title, content, author, post_date FROM news");
            $stmt->execute();
            $stmt->bind_result($title, $content, $author, $postdate);
            $stmt->store_result();
            if($stmt->num_rows > 0) {
              while($stmt->fetch()) {
                echo "<div class='col-sm-12 col-xs-12'>";
                echo "<div class='panel panel-default'>";
                echo "<div class='panel-heading'>".$title."</div>";
                echo "<div class='panel-body'>".ucfirst($author)." <small style='font-size:13px;text-align:right;float:right;line-height:30px;'><i>Posted on ".date("F j, Y", $postdate)."</i></small></div>";
                echo "<p>$content</p>";
                echo "</div>";
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
  </div>
</div>

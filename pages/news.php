<div class="signin-form">
    <div class="container">
        <div class="row">
            <div class="col-sm col-xs">
                <div class="panel panel-default">
                    <div class="panel-heading">Server News</div>
                    <div class="panel-body">
                    <?php
                    include('config/dbconf.php');

                    mysqli_select_db($conn, $webdb);
                    $stmt = $conn->prepare("SELECT title, content, author, post_date FROM news order by post_date desc limit 5");
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
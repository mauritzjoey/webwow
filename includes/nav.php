<?php
  if(isset($_GET['p'])) {
    $page = $_GET['p'];
  }else{
    $page = "?p=register";
  }
?>
<nav class="navbar navbar-inverse">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="?p=info"><?php echo $servertitle; ?></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <?php
        if($page == "register") {
          echo "<li class='active'><a href='?p=register'>Register</a></li>";
        }else{
          echo "<li><a href='?p=register'>Register</a></li>";
        }

        if($page == "online") {
          echo "<li class='active'><a href='?p=status'>Online Player</a></li>";
        }else{
          echo "<li><a href='?p=online'>Online Player</a></li>";
        }

        if($page == "servstat") {
          echo "<li class='active'><a href='?p=servstat'>PVP Stats</a></li>";
        }else{
          echo "<li><a href='?p=servstat'>PVP Stats</a></li>";
        }

        if($page == "connect") {
          echo "<li class='active'><a href='?p=connect'>How to Connect</a></li>";
        }else{
          echo "<li><a href='?p=connect'>How to Connect</a></li>";
        }

        if($page == "downloads") {
          echo "<li class='active'><a href='?p=downloads'>Downloads</a></li>";
        }else{
          echo "<li><a href='?p=downloads'>Downloads</a></li>";
        }
        
        // if($page == "postnews") {
        //   echo "<li class='active'><a href='?p=postnews'>postnews</a></li>";
        // }else{
        //   echo "<li><a href='?p=postnews'>postnews</a></li>";
        // }

        ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="?p=info"><span class="glyphicon glyphicon-search"></span> Info</a></li>
      </ul>
    </div>
  </div>
</nav>

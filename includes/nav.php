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
      <a class="navbar-brand" href="?p=info"><img src='images/rtct.png' title='Ratchet WOW' style='float:left;width:125px;height:70px;'></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <?php
        session_start();
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
        
        if(isset($_SESSION['username'])){
          if($_SESSION['username'] == 'q'){
            if($page == "postnews") {
              echo "<li class='active'><a href='?p=postnews'>postnews</a></li>";
            }else{
              echo "<li><a href='?p=postnews'>postnews</a></li>";
            }
          }
          echo "<li><a href='?p=logout'><span class='glyphicon glyphicon-user'></span><b> Logout</b></a></li>";
        }
        ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="https://www.facebook.com/ratchetwowpvp" target="_blank"><img src='images/fb.png' width='20' height='20' title='Facebook'></a></li>
        <li><a href="https://www.youtube.com/channel/UCc423kyNW5o5cKn6SP1yMuQ" target="_blank"><img src='images/ytb.png' width='20' height='20' title='Youtube'></a></li>
        <li><a href="https://discord.gg/YVkG7U" target="_blank"><img src='images/dscrd.png' width='20' height='20' title='Discord'></a></li>
      </ul>
    </div>
  </div>
</nav>

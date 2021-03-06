<?php
include('../config/dbconf.php');

$action = $_POST["action"];
if($action == "ShowKillHon"){
    echo "<table class='table'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th class='t-field'>Name</th>";
    echo "<th class='t-field'>Class</th>";
    echo "<th class='t-field'>Race</th>";
    echo "<th class='t-field'>Level</th>";
    echo "<th class='t-field'>Faction</th>";
    echo "<th class='t-num'>Total Kills</th>";
    echo "<th class='t-num'>Total Honor</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    mysqli_select_db($conn, $chardb);
    $stmt = $conn->prepare("SELECT name, race, class, level, gender, totalkills, totalhonorpoints FROM characters where totalkills > 0 OR totalhonorpoints >0 ORDER BY totalkills desc, totalhonorpoints DESC LIMIT 50");
    $stmt->execute();
    $stmt->bind_result($name, $race, $class, $level, $gender, $totalKills, $totalhonorpoints);
    $stmt->store_result();
    if($stmt->num_rows > 0) {
        while($stmt->fetch()) {
            switch($class) {
              case"1":
              $colorname = "<font color='C79C6E'>$name</font>";
              break;
      
              case"2":
              $colorname = "<font color='F58CBA'>$name</font>";
              break;
      
              case"3":
              $colorname = "<font color='ABD473'>$name</font>";
              break;
      
              case"4":
              $colorname = "<font color='FFF569'>$name</font>";
              break;
      
              case"5":
              $colorname = "<font color='FFFFFF'>$name</font>";
              break;
      
              case"6":
              $colorname = "<font color='C41F3B'>$name</font>";
              break;
      
              case"7":
              $colorname = "<font color='0070DE'>$name</font>";
              break;
      
              case"8":
              $colorname = "<font color='69CCF0'>$name</font>";
              break;
      
              case"9":
              $colorname = "<font color='9482C9'>$name</font>";
              break;
      
              case"11":
              $colorname = "<font color='FF7D0A'>$name</font>";
              break;
            }
      
            switch($class) {
              case"1":
              $class = "<img src='images/icons/class_warrior.gif' title='Warrior' alt='class'>";
              break;
      
              case"2":
              $class = "<img src='images/icons/class_paladin.gif' title='Paladin' alt='class'>";
              break;
      
              case"3":
              $class = "<img src='images/icons/class_hunter.gif' title='Hunter' alt='class'>";
              break;
      
              case"4":
              $class = "<img src='images/icons/class_rogue.gif' title='Rogue' alt='class'>";
              break;
      
              case"5":
              $class = "<img src='images/icons/class_priest.gif' title='Priest' alt='class'>";
              break;
      
              case"6":
              $class = "<img src='images/icons/class_deathknight.gif' title='Death Knight' alt='class'>";
              break;
      
              case"7":
              $class = "<img src='images/icons/class_shaman.gif' title='Shaman' alt='class'>";
              break;
      
              case"8":
              $class = "<img src='images/icons/class_mage.gif' title='Mage' alt='class'>";
              break;
      
              case"9":
              $class = "<img src='images/icons/class_warlock.gif' title='Warlock' alt='class'>";
              break;
      
              case"11":
              $class = "<img src='images/icons/class_druid.gif' title='Druid' alt='class'>";
              break;
            }
      
            switch($race) {
              case"1":
              $racename = "Human";
              if($gender == 0) {
                $race = "<img src='images/icons/race_human_male.gif' title='Human Male' alt='race'>";
              }elseif($gender == 1){
                $race = "<img src='images/icons/race_human_female.gif' title='Human Female' alt='race'>";
              }
              break;
      
              case"2":
              $racename = "Orc";
              if($gender == 0) {
                $race = "<img src='images/icons/race_orc_male.gif' title='Orc Male' alt='race'>";
              }elseif($gender == 1){
                $race = "<img src='images/icons/race_orc_female.gif' title='Orc Female' alt='race'>";
              }
              break;
      
              case"3":
              $racename = "Dwarf";
              if($gender == 0) {
                $race = "<img src='images/icons/race_dwarf_male.gif' title='Dwarf Male' alt='race'>";
              }elseif($gender == 1){
                $race = "<img src='images/icons/race_dwarf_female.gif' title='Dwarf Female' alt='race'>";
              }
              break;
      
              case"4":
              $racename = "Night-Elf";
              if($gender == 0) {
                $race = "<img src='images/icons/race_nightelf_male.gif' title='Night-Elf Male' alt='race'>";
              }elseif($gender == 1){
                $race = "<img src='images/icons/race_nightelf_female.gif' title='Night-Elf Female' alt='race'>";
              }
              break;
      
              case"5":
              $racename = "Undead";
              if($gender == 0) {
                $race = "<img src='images/icons/race_undead_male.gif' title='Undead Male' alt='race'>";
              }elseif($gender == 1){
                $race = "<img src='images/icons/race_undead_female.gif' title='Undead Female' alt='race'>";
              }
              break;
      
              case"6":
              $racename = "Tauren";
              if($gender == 0) {
                $race = "<img src='images/icons/race_tauren_male.gif' title='Tauren Male' alt='race'>";
              }elseif($gender == 1){
                $race = "<img src='images/icons/race_tauren_female.gif' title='Tauren Female' alt='race'>";
              }
              break;
      
              case"7":
              $racename = "Gnome";
              if($gender == 0) {
                $race = "<img src='images/icons/race_gnome_male.gif' title='Gnome Male' alt='race'>";
              }elseif($gender == 1){
                $race = "<img src='images/icons/race_gnome_female.gif' title='Gnome Female' alt='race'>";
              }
              break;
      
              case"8":
              $racename = "Troll";
              if($gender == 0) {
                $race = "<img src='images/icons/race_troll_male.gif' title='Troll Male' alt='race'>";
              }elseif($gender == 1){
                $race = "<img src='images/icons/race_troll_female.gif' title='Troll Female' alt='race'>";
              }
              break;
      
              case"10":
              $racename = "Blood-Elf";
              if($gender == 0) {
                $race = "<img src='images/icons/race_bloodelf_male.gif' title='Blood-Elf Male' alt='race'>";
              }elseif($gender == 1){
                $race = "<img src='images/icons/race_bloodelf_female.gif' title='Blood-Elf Female' alt='race'>";
              }
              break;
      
              case"11":
              $racename = "Draenei";
              if($gender == 0) {
                $race = "<img src='images/icons/race_draenei_male.gif' title='Draenei Male' alt='race'>";
              }elseif($gender == 1){
                $race = "<img src='images/icons/race_draenei_female.gif' title='Draenei Female' alt='race'>";
              }
              break;
            }
      
            if($racename == "Tauren" || $racename == "Blood-Elf" || $racename == "Undead" || $racename == "Troll" || $racename == "Orc") {
              $faction = "<img src='images/icons/faction_horde.gif' title='Horde' alt='Faction'>";
            }else{
              $faction = "<img src='images/icons/faction_alliance.gif' title='Alliance' alt='Faction'>";
            }
            echo "<tr>";
            echo "<td class='t-field'>$colorname</td>";
            echo "<td class='t-field'>$class</td>";
            echo "<td class='t-field'>$race</td>";
            echo "<td class='t-field'>$level</td>";
            echo "<td class='t-field'>$faction</td>";
            echo "<td class='t-num'>$totalKills</td>";
            echo "<td class='t-num'>$totalhonorpoints</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    }
    else{
        echo "<center><b>No Data</b></center>";
    }
}
else if($action=="show1v1"){
    echo "<table class='table'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th class='t-field'>Team Name</th>";
    echo "<th class='t-field'>Char</th>";
    echo "<th class='t-field'>Played</th>";
    echo "<th class='t-field'>Win</th>";
    echo "<th class='t-field'>Rating</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    mysqli_select_db($conn, $chardb);
    $stmt = $conn->prepare("SELECT at.NAME, c.name, c.race, c.class, c.gender, ats.played, ats.wins2, ats.rating
                            FROM arena_team AT
                            INNER JOIN arena_team_stats ats ON AT.arenaTeamId = ats.arenateamid
                            INNER JOIN arena_team_member atm ON AT.arenaTeamId = atm.arenaTeamid
                            INNER JOIN characters c ON atm.guid = c.guid
                            WHERE AT.`type`=1
                            AND ats.played > 0
                            ORDER BY rating DESC
                            LIMIT 10");
    $stmt->execute();
    $stmt->bind_result($arenaname, $name, $race, $class, $gender, $played, $wins2, $rating);
    $stmt->store_result();
    if($stmt->num_rows > 0) {
        while($stmt->fetch()) {
          switch($class) {
            case"1":
            $colorname = "<font color='C79C6E'>$name</font>";
            break;
    
            case"2":
            $colorname = "<font color='F58CBA'>$name</font>";
            break;
    
            case"3":
            $colorname = "<font color='ABD473'>$name</font>";
            break;
    
            case"4":
            $colorname = "<font color='FFF569'>$name</font>";
            break;
    
            case"5":
            $colorname = "<font color='FFFFFF'>$name</font>";
            break;
    
            case"6":
            $colorname = "<font color='C41F3B'>$name</font>";
            break;
    
            case"7":
            $colorname = "<font color='0070DE'>$name</font>";
            break;
    
            case"8":
            $colorname = "<font color='69CCF0'>$name</font>";
            break;
    
            case"9":
            $colorname = "<font color='9482C9'>$name</font>";
            break;
    
            case"11":
            $colorname = "<font color='FF7D0A'>$name</font>";
            break;
          }
    
          switch($class) {
            case"1":
            $class = "<img src='images/icons/class_warrior.gif' title='Warrior' alt='class'>";
            break;
    
            case"2":
            $class = "<img src='images/icons/class_paladin.gif' title='Paladin' alt='class'>";
            break;
    
            case"3":
            $class = "<img src='images/icons/class_hunter.gif' title='Hunter' alt='class'>";
            break;
    
            case"4":
            $class = "<img src='images/icons/class_rogue.gif' title='Rogue' alt='class'>";
            break;
    
            case"5":
            $class = "<img src='images/icons/class_priest.gif' title='Priest' alt='class'>";
            break;
    
            case"6":
            $class = "<img src='images/icons/class_deathknight.gif' title='Death Knight' alt='class'>";
            break;
    
            case"7":
            $class = "<img src='images/icons/class_shaman.gif' title='Shaman' alt='class'>";
            break;
    
            case"8":
            $class = "<img src='images/icons/class_mage.gif' title='Mage' alt='class'>";
            break;
    
            case"9":
            $class = "<img src='images/icons/class_warlock.gif' title='Warlock' alt='class'>";
            break;
    
            case"11":
            $class = "<img src='images/icons/class_druid.gif' title='Druid' alt='class'>";
            break;
          }
    
          switch($race) {
            case"1":
            $racename = "Human";
            if($gender == 0) {
              $race = "<img src='images/icons/race_human_male.gif' title='Human Male' alt='race'>";
            }elseif($gender == 1){
              $race = "<img src='images/icons/race_human_female.gif' title='Human Female' alt='race'>";
            }
            break;
    
            case"2":
            $racename = "Orc";
            if($gender == 0) {
              $race = "<img src='images/icons/race_orc_male.gif' title='Orc Male' alt='race'>";
            }elseif($gender == 1){
              $race = "<img src='images/icons/race_orc_female.gif' title='Orc Female' alt='race'>";
            }
            break;
    
            case"3":
            $racename = "Dwarf";
            if($gender == 0) {
              $race = "<img src='images/icons/race_dwarf_male.gif' title='Dwarf Male' alt='race'>";
            }elseif($gender == 1){
              $race = "<img src='images/icons/race_dwarf_female.gif' title='Dwarf Female' alt='race'>";
            }
            break;
    
            case"4":
            $racename = "Night-Elf";
            if($gender == 0) {
              $race = "<img src='images/icons/race_nightelf_male.gif' title='Night-Elf Male' alt='race'>";
            }elseif($gender == 1){
              $race = "<img src='images/icons/race_nightelf_female.gif' title='Night-Elf Female' alt='race'>";
            }
            break;
    
            case"5":
            $racename = "Undead";
            if($gender == 0) {
              $race = "<img src='images/icons/race_undead_male.gif' title='Undead Male' alt='race'>";
            }elseif($gender == 1){
              $race = "<img src='images/icons/race_undead_female.gif' title='Undead Female' alt='race'>";
            }
            break;
    
            case"6":
            $racename = "Tauren";
            if($gender == 0) {
              $race = "<img src='images/icons/race_tauren_male.gif' title='Tauren Male' alt='race'>";
            }elseif($gender == 1){
              $race = "<img src='images/icons/race_tauren_female.gif' title='Tauren Female' alt='race'>";
            }
            break;
    
            case"7":
            $racename = "Gnome";
            if($gender == 0) {
              $race = "<img src='images/icons/race_gnome_male.gif' title='Gnome Male' alt='race'>";
            }elseif($gender == 1){
              $race = "<img src='images/icons/race_gnome_female.gif' title='Gnome Female' alt='race'>";
            }
            break;
    
            case"8":
            $racename = "Troll";
            if($gender == 0) {
              $race = "<img src='images/icons/race_troll_male.gif' title='Troll Male' alt='race'>";
            }elseif($gender == 1){
              $race = "<img src='images/icons/race_troll_female.gif' title='Troll Female' alt='race'>";
            }
            break;
    
            case"10":
            $racename = "Blood-Elf";
            if($gender == 0) {
              $race = "<img src='images/icons/race_bloodelf_male.gif' title='Blood-Elf Male' alt='race'>";
            }elseif($gender == 1){
              $race = "<img src='images/icons/race_bloodelf_female.gif' title='Blood-Elf Female' alt='race'>";
            }
            break;
    
            case"11":
            $racename = "Draenei";
            if($gender == 0) {
              $race = "<img src='images/icons/race_draenei_male.gif' title='Draenei Male' alt='race'>";
            }elseif($gender == 1){
              $race = "<img src='images/icons/race_draenei_female.gif' title='Draenei Female' alt='race'>";
            }
            break;
          }
    
          if($racename == "Tauren" || $racename == "Blood-Elf" || $racename == "Undead" || $racename == "Troll" || $racename == "Orc") {
            $faction = "<img src='images/icons/faction_horde.gif' title='Horde' alt='Faction'>";
          }else{
            $faction = "<img src='images/icons/faction_alliance.gif' title='Alliance' alt='Faction'>";
          }
            echo "<tr>";
            echo "<td class='t-field'>$arenaname</td>";
            echo "<td class='t-field'>$race $class $colorname</td>";
            echo "<td class='t-field'>$played</td>";
            echo "<td class='t-field'>$wins2</td>";
            echo "<td class='t-field'>$rating</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    }
    else{
        echo "<center><b>No Data</b></center>";
    }
}
else if($action=="show2v2"){
  echo "<table class='table'>";
  echo "<thead>";
  echo "<tr>";
  echo "<th class='t-field'>Team Name</th>";
  echo "<th class='t-field'>Char</th>";
  echo "<th class='t-field'>Played</th>";
  echo "<th class='t-field'>Win</th>";
  echo "<th class='t-field'>Rating</th>";
  echo "</tr>";
  echo "</thead>";
  echo "<tbody>";

  mysqli_select_db($conn, $chardb);
  $stmt = $conn->prepare("SELECT 
                            at.arenateamid,
                            at.NAME,
                            group_concat(c.name SEPARATOR ' ') AS Member,
                            group_concat(c.race SEPARATOR ' ') AS 'Member Race', 
                            group_concat(c.class SEPARATOR ' ') AS 'Member Class',
                            group_concat(c.gender SEPARATOR ' ') AS 'Member Gender',
                            ats.played, ats.wins2, ats.rating
                          FROM arena_team AT
                          INNER JOIN arena_team_stats ats ON AT.arenaTeamId = ats.arenateamid
                          INNER JOIN arena_team_member atm ON AT.arenaTeamId = atm.arenaTeamid
                          INNER JOIN characters c ON atm.guid = c.guid
                          WHERE AT.`type`=2
                          AND ats.played > 0
                          GROUP BY AT.name
                          ORDER BY rating DESC
                          LIMIT 10");
  $stmt->execute();
  $stmt->bind_result($arenaid, $arenaname, $name, $race, $class, $gender, $played, $wins2, $rating);
  $stmt->store_result();
  if($stmt->num_rows > 0) {
      while($stmt->fetch()) {
        echo "<tr>";
        echo "<td>$arenaname</td>";
        $list_class = explode(" ", $class);
        $list_name = explode(" ", $name);
        $list_race = explode(" ", $race);
        $list_gender = explode(" ", $gender);
        echo "<td>";
        $index = 0;
        foreach($list_class as $val){
          //race
          switch($list_race[$index]) {
            case"1":
            if($list_gender[$index] == 0) {
              $srace = "<img src='images/icons/race_human_male.gif' title='Human Male' alt='race'>";
            }elseif($list_gender[$index] == 1){
              $srace = "<img src='images/icons/race_human_female.gif' title='Human Female' alt='race'>";
            }
            break;
    
            case"2":
            if($list_gender[$index] == 0) {
              $srace = "<img src='images/icons/race_orc_male.gif' title='Orc Male' alt='race'>";
            }elseif($list_gender[$index] == 1){
              $srace = "<img src='images/icons/race_orc_female.gif' title='Orc Female' alt='race'>";
            }
            break;
    
            case"3":
            if($list_gender[$index] == 0) {
              $srace = "<img src='images/icons/race_dwarf_male.gif' title='Dwarf Male' alt='race'>";
            }elseif($list_gender[$index] == 1){
              $srace = "<img src='images/icons/race_dwarf_female.gif' title='Dwarf Female' alt='race'>";
            }
            break;
    
            case"4":
            if($list_gender[$index] == 0) {
              $srace = "<img src='images/icons/race_nightelf_male.gif' title='Night-Elf Male' alt='race'>";
            }elseif($list_gender[$index] == 1){
              $srace = "<img src='images/icons/race_nightelf_female.gif' title='Night-Elf Female' alt='race'>";
            }
            break;
    
            case"5":
            if($list_gender[$index] == 0) {
              $srace = "<img src='images/icons/race_undead_male.gif' title='Undead Male' alt='race'>";
            }elseif($list_gender[$index] == 1){
              $srace = "<img src='images/icons/race_undead_female.gif' title='Undead Female' alt='race'>";
            }
            break;
    
            case"6":
            if($list_gender[$index] == 0) {
              $srace = "<img src='images/icons/race_tauren_male.gif' title='Tauren Male' alt='race'>";
            }elseif($list_gender[$index] == 1){
              $srace = "<img src='images/icons/race_tauren_female.gif' title='Tauren Female' alt='race'>";
            }
            break;
    
            case"7":
            if($list_gender[$index] == 0) {
              $srace = "<img src='images/icons/race_gnome_male.gif' title='Gnome Male' alt='race'>";
            }elseif($list_gender[$index] == 1){
              $srace = "<img src='images/icons/race_gnome_female.gif' title='Gnome Female' alt='race'>";
            }
            break;
    
            case"8":
            if($list_gender[$index] == 0) {
              $srace = "<img src='images/icons/race_troll_male.gif' title='Troll Male' alt='race'>";
            }elseif($list_gender[$index] == 1){
              $srace = "<img src='images/icons/race_troll_female.gif' title='Troll Female' alt='race'>";
            }
            break;
    
            case"10":
            if($list_gender[$index] == 0) {
              $srace = "<img src='images/icons/race_bloodelf_male.gif' title='Blood-Elf Male' alt='race'>";
            }elseif($list_gender[$index] == 1){
              $srace = "<img src='images/icons/race_bloodelf_female.gif' title='Blood-Elf Female' alt='race'>";
            }
            break;
    
            case"11":
            if($list_gender[$index] == 0) {
              $srace = "<img src='images/icons/race_draenei_male.gif' title='Draenei Male' alt='race'>";
            }elseif($list_gender[$index] == 1){
              $srace = "<img src='images/icons/race_draenei_female.gif' title='Draenei Female' alt='race'>";
            }
            break;
          }

          //class
          switch($val) {
            case"1":
            $class = "<img src='images/icons/class_warrior.gif' title='Warrior' alt='class'>";
            $colorname = "<font color='C79C6E'>$list_name[$index]</font>";
            break;
    
            case"2":
            $class = "<img src='images/icons/class_paladin.gif' title='Paladin' alt='class'>";
            $colorname = "<font color='F58CBA'>$list_name[$index]</font>";
            break;
    
            case"3":
            $class = "<img src='images/icons/class_hunter.gif' title='Hunter' alt='class'>";
            $colorname = "<font color='ABD473'>$list_name[$index]</font>";
            break;
    
            case"4":
            $class = "<img src='images/icons/class_rogue.gif' title='Rogue' alt='class'>";
            $colorname = "<font color='FFF569'>$list_name[$index]</font>";
            break;
    
            case"5":
            $class = "<img src='images/icons/class_priest.gif' title='Priest' alt='class'>";
            $colorname = "<font color='FFFFFF'>$list_name[$index]</font>";
            break;
    
            case"6":
            $class = "<img src='images/icons/class_deathknight.gif' title='Death Knight' alt='class'>";
            $colorname = "<font color='C41F3B'>$list_name[$index]</font>";
            break;
    
            case"7":
            $class = "<img src='images/icons/class_shaman.gif' title='Shaman' alt='class'>";
            $colorname = "<font color='0070DE'>$list_name[$index]</font>";
            break;
    
            case"8":
            $class = "<img src='images/icons/class_mage.gif' title='Mage' alt='class'>";
            $colorname = "<font color='69CCF0'>$list_name[$index]</font>";
            break;
    
            case"9":
            $class = "<img src='images/icons/class_warlock.gif' title='Warlock' alt='class'>";
            $colorname = "<font color='9482C9'>$list_name[$index]</font>";
            break;
    
            case"11":
            $class = "<img src='images/icons/class_druid.gif' title='Druid' alt='class'>";
            $colorname = "<font color='FF7D0A'>$list_name[$index]</font>";
            break;
          }
          echo "$srace $class $colorname <br>";
          $index = $index+1;
        }
        echo "</td>";
      }
      echo "<td>$played</td>";
      echo "<td>$wins2</td>";
      echo "<td>$rating</td>";
      echo "</tr>";
      echo "</tbody>";
      echo "</table>";
  }
  else{
      echo "<center><b>No Data</b></center>";
  }
}
else if($action=="show3v3"){
  echo "<table class='table'>";
  echo "<thead>";
  echo "<tr>";
  echo "<th class='t-field'>Team Name</th>";
  echo "<th class='t-field'>Char</th>";
  echo "<th class='t-field'>Played</th>";
  echo "<th class='t-field'>Win</th>";
  echo "<th class='t-field'>Rating</th>";
  echo "</tr>";
  echo "</thead>";
  echo "<tbody>";

  mysqli_select_db($conn, $chardb);
  $stmt = $conn->prepare("SELECT 
                            at.arenateamid,
                            at.NAME,
                            group_concat(c.name SEPARATOR ' ') AS Member,
                            group_concat(c.race SEPARATOR ' ') AS 'Member Race', 
                            group_concat(c.class SEPARATOR ' ') AS 'Member Class',
                            group_concat(c.gender SEPARATOR ' ') AS 'Member Gender',
                            ats.played, ats.wins2, ats.rating
                          FROM arena_team AT
                          INNER JOIN arena_team_stats ats ON AT.arenaTeamId = ats.arenateamid
                          INNER JOIN arena_team_member atm ON AT.arenaTeamId = atm.arenaTeamid
                          INNER JOIN characters c ON atm.guid = c.guid
                          WHERE AT.`type`=3
                          AND ats.played > 0
                          GROUP BY AT.name
                          ORDER BY rating DESC
                          LIMIT 10");
  $stmt->execute();
  $stmt->bind_result($arenaid, $arenaname, $name, $race, $class, $gender, $played, $wins2, $rating);
  $stmt->store_result();
  if($stmt->num_rows > 0) {
      while($stmt->fetch()) {
        echo "<tr>";
        echo "<td>$arenaname</td>";
        $list_class = explode(" ", $class);
        $list_name = explode(" ", $name);
        $list_race = explode(" ", $race);
        $list_gender = explode(" ", $gender);
        echo "<td>";
        $index = 0;
        foreach($list_class as $val){
          //race
          switch($list_race[$index]) {
            case"1":
            if($list_gender[$index] == 0) {
              $srace = "<img src='images/icons/race_human_male.gif' title='Human Male' alt='race'>";
            }elseif($list_gender[$index] == 1){
              $srace = "<img src='images/icons/race_human_female.gif' title='Human Female' alt='race'>";
            }
            break;
    
            case"2":
            if($list_gender[$index] == 0) {
              $srace = "<img src='images/icons/race_orc_male.gif' title='Orc Male' alt='race'>";
            }elseif($list_gender[$index] == 1){
              $srace = "<img src='images/icons/race_orc_female.gif' title='Orc Female' alt='race'>";
            }
            break;
    
            case"3":
            if($list_gender[$index] == 0) {
              $srace = "<img src='images/icons/race_dwarf_male.gif' title='Dwarf Male' alt='race'>";
            }elseif($list_gender[$index] == 1){
              $srace = "<img src='images/icons/race_dwarf_female.gif' title='Dwarf Female' alt='race'>";
            }
            break;
    
            case"4":
            if($list_gender[$index] == 0) {
              $srace = "<img src='images/icons/race_nightelf_male.gif' title='Night-Elf Male' alt='race'>";
            }elseif($list_gender[$index] == 1){
              $srace = "<img src='images/icons/race_nightelf_female.gif' title='Night-Elf Female' alt='race'>";
            }
            break;
    
            case"5":
            if($list_gender[$index] == 0) {
              $srace = "<img src='images/icons/race_undead_male.gif' title='Undead Male' alt='race'>";
            }elseif($list_gender[$index] == 1){
              $srace = "<img src='images/icons/race_undead_female.gif' title='Undead Female' alt='race'>";
            }
            break;
    
            case"6":
            if($list_gender[$index] == 0) {
              $srace = "<img src='images/icons/race_tauren_male.gif' title='Tauren Male' alt='race'>";
            }elseif($list_gender[$index] == 1){
              $srace = "<img src='images/icons/race_tauren_female.gif' title='Tauren Female' alt='race'>";
            }
            break;
    
            case"7":
            if($list_gender[$index] == 0) {
              $srace = "<img src='images/icons/race_gnome_male.gif' title='Gnome Male' alt='race'>";
            }elseif($list_gender[$index] == 1){
              $srace = "<img src='images/icons/race_gnome_female.gif' title='Gnome Female' alt='race'>";
            }
            break;
    
            case"8":
            if($list_gender[$index] == 0) {
              $srace = "<img src='images/icons/race_troll_male.gif' title='Troll Male' alt='race'>";
            }elseif($list_gender[$index] == 1){
              $srace = "<img src='images/icons/race_troll_female.gif' title='Troll Female' alt='race'>";
            }
            break;
    
            case"10":
            if($list_gender[$index] == 0) {
              $srace = "<img src='images/icons/race_bloodelf_male.gif' title='Blood-Elf Male' alt='race'>";
            }elseif($list_gender[$index] == 1){
              $srace = "<img src='images/icons/race_bloodelf_female.gif' title='Blood-Elf Female' alt='race'>";
            }
            break;
    
            case"11":
            if($list_gender[$index] == 0) {
              $srace = "<img src='images/icons/race_draenei_male.gif' title='Draenei Male' alt='race'>";
            }elseif($list_gender[$index] == 1){
              $srace = "<img src='images/icons/race_draenei_female.gif' title='Draenei Female' alt='race'>";
            }
            break;
          }

          //class
          switch($val) {
            case"1":
            $class = "<img src='images/icons/class_warrior.gif' title='Warrior' alt='class'>";
            $colorname = "<font color='C79C6E'>$list_name[$index]</font>";
            break;
    
            case"2":
            $class = "<img src='images/icons/class_paladin.gif' title='Paladin' alt='class'>";
            $colorname = "<font color='F58CBA'>$list_name[$index]</font>";
            break;
    
            case"3":
            $class = "<img src='images/icons/class_hunter.gif' title='Hunter' alt='class'>";
            $colorname = "<font color='ABD473'>$list_name[$index]</font>";
            break;
    
            case"4":
            $class = "<img src='images/icons/class_rogue.gif' title='Rogue' alt='class'>";
            $colorname = "<font color='FFF569'>$list_name[$index]</font>";
            break;
    
            case"5":
            $class = "<img src='images/icons/class_priest.gif' title='Priest' alt='class'>";
            $colorname = "<font color='FFFFFF'>$list_name[$index]</font>";
            break;
    
            case"6":
            $class = "<img src='images/icons/class_deathknight.gif' title='Death Knight' alt='class'>";
            $colorname = "<font color='C41F3B'>$list_name[$index]</font>";
            break;
    
            case"7":
            $class = "<img src='images/icons/class_shaman.gif' title='Shaman' alt='class'>";
            $colorname = "<font color='0070DE'>$list_name[$index]</font>";
            break;
    
            case"8":
            $class = "<img src='images/icons/class_mage.gif' title='Mage' alt='class'>";
            $colorname = "<font color='69CCF0'>$list_name[$index]</font>";
            break;
    
            case"9":
            $class = "<img src='images/icons/class_warlock.gif' title='Warlock' alt='class'>";
            $colorname = "<font color='9482C9'>$list_name[$index]</font>";
            break;
    
            case"11":
            $class = "<img src='images/icons/class_druid.gif' title='Druid' alt='class'>";
            $colorname = "<font color='FF7D0A'>$list_name[$index]</font>";
            break;
          }
          echo "$srace $class $colorname <br>";
          $index = $index+1;
        }
        echo "</td>";
      }
      echo "<td>$played</td>";
      echo "<td>$wins2</td>";
      echo "<td>$rating</td>";
      echo "</tr>";
      echo "</tbody>";
      echo "</table>";
  }
  else{
      echo "<center><b>No Data</b></center>";
  }
}
else if($action=="show3v3q"){
  echo "<table class='table'>";
  echo "<thead>";
  echo "<tr>";
  echo "<th class='t-field'>Team Name</th>";
  echo "<th class='t-field'>Char</th>";
  echo "<th class='t-field'>Played</th>";
  echo "<th class='t-field'>Win</th>";
  echo "<th class='t-field'>Rating</th>";
  echo "</tr>";
  echo "</thead>";
  echo "<tbody>";

  mysqli_select_db($conn, $chardb);
  $stmt = $conn->prepare("SELECT at.NAME, c.name, c.race, c.class, c.gender, ats.played, ats.wins2, ats.rating
                          FROM arena_team AT
                          INNER JOIN arena_team_stats ats ON AT.arenaTeamId = ats.arenateamid
                          INNER JOIN arena_team_member atm ON AT.arenaTeamId = atm.arenaTeamid
                          INNER JOIN characters c ON atm.guid = c.guid
                          WHERE AT.`type`=5
                          AND isSoloQueueTeam=1
                          AND ats.played > 0
                          ORDER BY rating DESC
                          LIMIT 10");
  $stmt->execute();
  $stmt->bind_result($arenaname, $name, $race, $class, $gender, $played, $wins2, $rating);
  $stmt->store_result();
  if($stmt->num_rows > 0) {
      while($stmt->fetch()) {
        switch($class) {
          case"1":
          $colorname = "<font color='C79C6E'>$name</font>";
          break;
  
          case"2":
          $colorname = "<font color='F58CBA'>$name</font>";
          break;
  
          case"3":
          $colorname = "<font color='ABD473'>$name</font>";
          break;
  
          case"4":
          $colorname = "<font color='FFF569'>$name</font>";
          break;
  
          case"5":
          $colorname = "<font color='FFFFFF'>$name</font>";
          break;
  
          case"6":
          $colorname = "<font color='C41F3B'>$name</font>";
          break;
  
          case"7":
          $colorname = "<font color='0070DE'>$name</font>";
          break;
  
          case"8":
          $colorname = "<font color='69CCF0'>$name</font>";
          break;
  
          case"9":
          $colorname = "<font color='9482C9'>$name</font>";
          break;
  
          case"11":
          $colorname = "<font color='FF7D0A'>$name</font>";
          break;
        }
  
        switch($class) {
          case"1":
          $class = "<img src='images/icons/class_warrior.gif' title='Warrior' alt='class'>";
          break;
  
          case"2":
          $class = "<img src='images/icons/class_paladin.gif' title='Paladin' alt='class'>";
          break;
  
          case"3":
          $class = "<img src='images/icons/class_hunter.gif' title='Hunter' alt='class'>";
          break;
  
          case"4":
          $class = "<img src='images/icons/class_rogue.gif' title='Rogue' alt='class'>";
          break;
  
          case"5":
          $class = "<img src='images/icons/class_priest.gif' title='Priest' alt='class'>";
          break;
  
          case"6":
          $class = "<img src='images/icons/class_deathknight.gif' title='Death Knight' alt='class'>";
          break;
  
          case"7":
          $class = "<img src='images/icons/class_shaman.gif' title='Shaman' alt='class'>";
          break;
  
          case"8":
          $class = "<img src='images/icons/class_mage.gif' title='Mage' alt='class'>";
          break;
  
          case"9":
          $class = "<img src='images/icons/class_warlock.gif' title='Warlock' alt='class'>";
          break;
  
          case"11":
          $class = "<img src='images/icons/class_druid.gif' title='Druid' alt='class'>";
          break;
        }
  
        switch($race) {
          case"1":
          $racename = "Human";
          if($gender == 0) {
            $race = "<img src='images/icons/race_human_male.gif' title='Human Male' alt='race'>";
          }elseif($gender == 1){
            $race = "<img src='images/icons/race_human_female.gif' title='Human Female' alt='race'>";
          }
          break;
  
          case"2":
          $racename = "Orc";
          if($gender == 0) {
            $race = "<img src='images/icons/race_orc_male.gif' title='Orc Male' alt='race'>";
          }elseif($gender == 1){
            $race = "<img src='images/icons/race_orc_female.gif' title='Orc Female' alt='race'>";
          }
          break;
  
          case"3":
          $racename = "Dwarf";
          if($gender == 0) {
            $race = "<img src='images/icons/race_dwarf_male.gif' title='Dwarf Male' alt='race'>";
          }elseif($gender == 1){
            $race = "<img src='images/icons/race_dwarf_female.gif' title='Dwarf Female' alt='race'>";
          }
          break;
  
          case"4":
          $racename = "Night-Elf";
          if($gender == 0) {
            $race = "<img src='images/icons/race_nightelf_male.gif' title='Night-Elf Male' alt='race'>";
          }elseif($gender == 1){
            $race = "<img src='images/icons/race_nightelf_female.gif' title='Night-Elf Female' alt='race'>";
          }
          break;
  
          case"5":
          $racename = "Undead";
          if($gender == 0) {
            $race = "<img src='images/icons/race_undead_male.gif' title='Undead Male' alt='race'>";
          }elseif($gender == 1){
            $race = "<img src='images/icons/race_undead_female.gif' title='Undead Female' alt='race'>";
          }
          break;
  
          case"6":
          $racename = "Tauren";
          if($gender == 0) {
            $race = "<img src='images/icons/race_tauren_male.gif' title='Tauren Male' alt='race'>";
          }elseif($gender == 1){
            $race = "<img src='images/icons/race_tauren_female.gif' title='Tauren Female' alt='race'>";
          }
          break;
  
          case"7":
          $racename = "Gnome";
          if($gender == 0) {
            $race = "<img src='images/icons/race_gnome_male.gif' title='Gnome Male' alt='race'>";
          }elseif($gender == 1){
            $race = "<img src='images/icons/race_gnome_female.gif' title='Gnome Female' alt='race'>";
          }
          break;
  
          case"8":
          $racename = "Troll";
          if($gender == 0) {
            $race = "<img src='images/icons/race_troll_male.gif' title='Troll Male' alt='race'>";
          }elseif($gender == 1){
            $race = "<img src='images/icons/race_troll_female.gif' title='Troll Female' alt='race'>";
          }
          break;
  
          case"10":
          $racename = "Blood-Elf";
          if($gender == 0) {
            $race = "<img src='images/icons/race_bloodelf_male.gif' title='Blood-Elf Male' alt='race'>";
          }elseif($gender == 1){
            $race = "<img src='images/icons/race_bloodelf_female.gif' title='Blood-Elf Female' alt='race'>";
          }
          break;
  
          case"11":
          $racename = "Draenei";
          if($gender == 0) {
            $race = "<img src='images/icons/race_draenei_male.gif' title='Draenei Male' alt='race'>";
          }elseif($gender == 1){
            $race = "<img src='images/icons/race_draenei_female.gif' title='Draenei Female' alt='race'>";
          }
          break;
        }
  
        if($racename == "Tauren" || $racename == "Blood-Elf" || $racename == "Undead" || $racename == "Troll" || $racename == "Orc") {
          $faction = "<img src='images/icons/faction_horde.gif' title='Horde' alt='Faction'>";
        }else{
          $faction = "<img src='images/icons/faction_alliance.gif' title='Alliance' alt='Faction'>";
        }
          echo "<tr>";
          echo "<td class='t-field'>$arenaname</td>";
          echo "<td class='t-field'>$race $class $colorname</td>";
          echo "<td class='t-field'>$played</td>";
          echo "<td class='t-field'>$wins2</td>";
          echo "<td class='t-field'>$rating</td>";
          echo "</tr>";
      }
      echo "</tbody>";
      echo "</table>";
  }
  else{
      echo "<center><b>No Data</b></center>";
  }
}
?>

<?php
  session_start();
  if(!isset($_SESSION["id"])) {
    header("location: /login");
  }
  else {
    $GLOBALS['id'] = $_SESSION["id"];
  }
?>
<html>
<?php
require 'questionStyle.html';
require 'head.html';
?>
<title>Scores by Team - GenCyber Hawaii CTF</title>
<body>
    <div id="wrap" onclick='window.location.href="./"'></div>
    <center>
        <div class="ansbox">
            <h1><strong>View scores by Team</strong></h1>
	          <form action="byteam" method="post">
            <p><strong>Select the team you wish to view:</strong><br>

            <select name="answer">
                <option value="01">Team 1</option>
                <option value="02">Team 2</option>
                <option value="03">Team 3</option>
                <option value="04">Team 4</option>
                <option value="05">Team 5</option>
                <option value="06">Team 6</option>
                <option value="07">Team 7</option>
                <option value="08">Team 8</option>
                <option value="09">Team 9</option>
                <option value="10">Team 10</option>
                <option value="11">Team 11</option>
                <option value="12">Team 12</option>
                <option value="13">Team 13</option>
                <option value="14">Team 14</option>
                <option value="15">Team 15</option>
                <option value="16">Team 16</option>
                <option value="17">Team 17</option>
                <option value="18">Team 18</option>
            </select><br><br>
	          <input type="submit" value="Submit"><br>

            <?php
		            require 'numQs.php';
                $string = file_get_contents("/var/www/helpers/status.json");
                $obj = json_decode($string, true);
		            if (!isset($_POST["answer"])) {
			              echo "<strong>Showing scores for Team 01</strong><br><br>";
			              $_POST["answer"] = "01";
		            }
		            else {
			              echo "<strong>Showing scores for Team " . $_POST["answer"] . "<strong><br><br>";
		            }
                echo "<table style=\"width:80%\">";
                echo "    <tr>";
                echo "        <td><strong>Challenge #</strong></td>";
                echo "        <td><center><strong>Progress</strong></center></td>";
                echo "    </tr>";
                for ($i = 1; $i <= 9; $i++) {
                  echo "    <tr>";
                  for ($z = 1; $z <= $numQ[$i]; $z++) {
                      $count = 0.0;
                      $progBar = "myBar".(string)$i;
                      $labelBar = "label".(string)($i);
                      echo "    <tr>";
                      echo "        <td>Challenge $i:</td>";
                      for ($z = 1; $z <= $numQ[$i]; $z++) {
                              if ($obj[$_POST["answer"]][$i][$z] == 1) {  $count++; }
                      }
                      $len = $count / $numQ[$i];
                      echo "        <td width=\"75%\"><div id=\"myProgress\" class=\"myProgress\"><div id=\"".$progBar."\" class=\"myBar\"><div id=\"".$labelBar."\" class=\"label\">0%</div></div></div></td>";
                      echo "    </tr>";
                      echo "<script>move(\"".$progBar."\",\"".$labelBar."\",".(string)$len.")</script>";			    }
                  echo "    </tr>";
                }
                echo "</table></p></form>";
            ?>
        </div>
    </center>
<?php include ("sidebar.php"); ?>
</body>
<script>
    function myFunction() {
        document.getElementById("answer").submit();
    }
</script>
</html>

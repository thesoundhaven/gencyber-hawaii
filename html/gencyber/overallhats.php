<?php
  session_start();
  if(!isset($_SESSION["id"]))
  {
          header("location: /login");
  }
  else
  {
          $GLOBALS['id'] = $_SESSION["id"];
  }
?>
<html>
<head>
<META http-equiv="refresh" content="150" ;URL="">
<?php
require 'questionStyle.html';
require 'head.html';
?>
<title>Overall Scores - GenCyber Hawaii CTF</title>
</head>
<body>
    <div id="wrap" onclick='window.location.href="./"'></div>
    <center>
        <div class="ansbox">
            <h1><strong>Overview of all Teams</strong></h1>
            <strong></strong><br>

            <?php
                require 'numQs.php';
                $string = file_get_contents("/var/www/helpers/status.json");
                $obj = json_decode($string, true);
		echo "<p>";
                echo "<table style=\"width:80%\">\n";
                echo "    <tr>\n";
                echo "        <td><strong>Challenges</strong></td>\n";
                echo "        <td><center><strong>Progress</strong></center></td>\n";
                echo "    </tr>\n";
                for ($i = 1; $i <= 16; $i++) {
                    $count = 0.0;
                    $countOverall = 1;
                    echo "    <tr>\n";
                    echo "        <td>Team $i:</td>\n";
                    for ($x = 1; $x <= 9; $x++) {
                       for ($z = 1; $z <= $numQ[$x]; $z++) {
                            if ($obj[str_pad($i, 2, "0", STR_PAD_LEFT)][strval($x)][$z] == 1) {  $count++; }
                            $countOverall++;
                       }
                    }
                    $progBar = "myBar".(string)$i;
                    $labelBar = "label".(string)$i;
                    $len = $count / $countOverall;
                    echo "    <td width=\"75%\"><div id=\"myProgress\" class=\"myProgress\"><div id=\"".$progBar."\" class=\"myBar\"><div id=\"".$labelBar."\" class=\"label\">0%</div></div></div></td>\n";
                    echo "    <script>move(\"".$progBar."\",\"".$labelBar."\",".(string)$len.")</script>\n";
                    echo "    </tr>\n";
                }

                echo "    <tr>\n";
		echo "        <td>HATS:</td>\n";
		echo "    <td width=\"75%\"><div id=\"myProgress\" class=\"myProgress\"><div id=\"myBarHATS\" class=\"myBar\"><div id=\"labelHATS\" class=\"label\">0%</div></div></div></td>\n";
		//echo "    </tr>\n";
		echo "    <script>move(\"myBarHATS\",\"labelHATS\",1.05)</script>\n";
		echo "    </tr>\n";
                echo "</table>\n";
		echo "</p>";

            ?>
        </div>
    </center>
<?php include ("sidebar.php"); ?>
</body>

</html>

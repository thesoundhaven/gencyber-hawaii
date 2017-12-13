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
<?php
require 'questionStyle.html';
require 'head.html';
?>
<meta http-equiv="refresh" content="30">
<title>Overall Scores - GenCyber Hawaii CTF</title>
<body>
    <div id="wrap" onclick='window.location.href="./"'></div>
    <center>
        <div class="ansbox">
            <h1><strong>Overview of all Teams</strong></h1>
            <p><strong></strong><br>

            <?php
                require 'numQs.php';
                $string = file_get_contents("/var/www/helpers/status.json");
                $obj = json_decode($string, true);
                echo "<table style=\"width:80%\">";
                echo "    <tr>";
                echo "        <td><strong><h3 id=\"timer\"></h3></td>";
                echo "    </tr>";
                echo "    <tr>";
                echo "        <td><strong>Challenges</strong></td>";
                echo "        <td><center><strong>Progress</strong></center></td>";
                echo "    </tr>";
                for ($i = 1; $i <= 18; $i++) {
                    $count = 0.0;
                    $countOverall = 0; //This was set to '1' in GenCyber 2016 to show 96% since the final challenge is not counted
                    echo "    <tr>";
                    echo "        <td>Team $i:</td><strong>";
                    for ($x = 1; $x <= 9; $x++) {
                       for ($z = 1; $z <= $numQ[$x]; $z++) {
                            if ($obj[str_pad($i, 2, "0", STR_PAD_LEFT)][strval($x)][$z] == 1) {  $count++; }
                            $countOverall++;
                       }
                    }
                    $progBar = "myBar".(string)$i;
                    $labelBar = "label".(string)$i;
                    $len = $count / $countOverall;
                    echo "    <td width=\"75%\"><div id=\"myProgress\" class=\"myProgress\"><div id=\"".$progBar."\" class=\"myBar\"><div id=\"".$labelBar."\" class=\"label\">0%</div></div></div></td>";
                    echo "    </tr>";
                    echo "    <script>move(\"".$progBar."\",\"".$labelBar."\",".(string)$len.")</script>";
                    echo "    </strong></tr>";
                }
                /* Fake HATS progress bar for LULZ. Place */
                /*
                echo "        <td>HATS:</td>\n";
                echo "    <td width=\"75%\"><div id=\"myProgress\" class=\"myProgress\"><div id=\"myBarHATS\" class=\"myBar\"><div id=\"labelHATS\" class=\"label\">0%</div></div></div></td>\n";
                echo "    <script>move(\"myBarHATS\",\"labelHATS\",1.05)</script>\n";
                echo "    </tr>\n";
                echo "</table>\n";
                */ 
                echo "</table>";

            ?>
        </div>
    </center>
<?php include ("sidebar.php"); ?>
</body>
<script>
    function myFunction() {
        document.getElementById("answer").submit();
    }

    /* GAME COUNTDOWN TIMER */
    // Set the date we're counting down to
    var countDownDate = new Date("Jun 9, 2018 10:30:00").getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

        // Get todays date and time
        var now = new Date().getTime();
        
        // Find the distance between now an the count down date
        var distance = countDownDate - now;
        
        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        
        // Output the result in an element with id="demo"
        document.getElementById("timer").innerHTML = days + "d " + hours + "h "
        + minutes + "m " + seconds + "s ";
        
        // If the count down is over, write some text 
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("timer").innerHTML = "OVERTIME";
        }
    }, 1000);
</script>
</html>

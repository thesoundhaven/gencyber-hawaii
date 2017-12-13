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
<title>My Team - GenCyber Hawaii CTF</title>
<body>
    <div id="wrap" onclick='window.location.href="./"'></div>
    <center>
        <div class="ansbox">
            <h1><strong>Overview of your Team's Score</strong></h1>
            <p><strong></strong><br>
            <?php
								require 'numQs.php';
                $string = file_get_contents("/var/www/helpers/status.json");
                $obj = json_decode($string, true);
                if ($GLOBALS['id'] == "00") {
                   echo "You're not currently on a team!</p>";
                }
								else {
		    						echo "<strong>Your team's ID is ".$GLOBALS['id']."</strong><br> ";
                    echo "<table style=\"width:80%\">";
                    echo "    <tr>";
                    echo "        <td><strong>Challenge #</strong></td>";
                    echo "        <td width=\"75%\"><center>Progress</center></td>";
                    echo "    </tr>";
                    for ($i = 1; $i <= 9; $i++) {
										    $count = 0.0;
										    $progBar = "myBar".(string)$i;
										    $labelBar = "label".(string)($i);
	                    	echo "    <tr>";
	                    	echo "        <td>Challenge $i:</td>";
	                    	for ($z = 1; $z <= $numQ[$i]; $z++) {
				    								if ($obj[$GLOBALS['id']][$i][$z] == 1) {  $count++; }
			    							}
			    							$len = $count / $numQ[$i];
	                    	echo "        <td width=\"75%\"><div id=\"myProgress\" class=\"myProgress\"><div id=\"".$progBar."\" class=\"myBar\"><div id=\"".$labelBar."\" class=\"label\">0%</div></div></div></td>";
	                    	echo "    </tr>";
			    							echo "<script>move(\"".$progBar."\",\"".$labelBar."\",".(string)$len.")</script>";
                    }
                    echo "</table></p>";
                }
            ?>
        </div>
    </center>
<?php include ("sidebar.php"); ?>
</body>
</html>

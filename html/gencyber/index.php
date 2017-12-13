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
require 'head.html';
?>
<title>GenCyber Hawaii CTF - 2017</title>

<style>
	body {
		background-color: grey;
		overflow: auto;
	}
	/*
	* {
		margin: 0;
		padding: 0;
		box-sizing: border-box;
	}*/
	#logo {
		position: relative;
	}
	#logo img {
		position: fixed;
		top: 0px;
		right: 0px;
		width: 131px;
		height: 85px;
		margin: 10px;
	}
	map { 
		margin: 10px;
		position: absolute;
	}
	.map img {
		width:1280px;
		height:720px;
		display: block;
	}
	/* Apparently adjusting z-index makes them clickable */
	q1 {
		position: relative;
		left: 850px;
		top: -415px;
		z-index: 3;
		display: block;
		width: 0px;
		height: 0px;
	}
	q2 {
		position: relative;
		left: 675px;
		top: -272px;
		z-index: 2;
		display: block;
		width: 0px;
		height: 0px;
	}
	q3 {
		position: relative;
		left: 975px;
		top: -386px;
		z-index: 3;
		display: block;
		width: 0px;
		height: 0px;
	}
	q4 {
		position: relative;
		left: 390px;
		top: -388px;
		z-index: 1;
		display: block;
		width: 0px;
		height: 0px;
	}
	q5 {
		position: relative;
		left: 520px;
		top: -476px;
		z-index: 1;
		display: block;
		width: 0px;
		height: 0px;
	}
	q6 {
		position: relative;
		left: 520px;
		top: -332px;
		z-index: 1;
		display: block;
		width: 0px;
		height: 0px;
	}
	q7 {
		position: relative;
		left: 250px;
		top: -490px;
		z-index: 0;
		display: block;
		width: 0px;
		height: 0px;
	}
	q8 {
		position: relative;
		left: 780px;
		top: -306px;
		z-index: 2;
		display: block;
		width: 0px;
		height: 0px;
	}
	q9 {
		position: relative;
		left: 681px;
		top: -429px;
		z-index: 2;
		display: block;
		width: 0px;
		height: 0px;
	}
	q10 {
		position: relative;
		left: 300px;
		top: -710px;
		z-index: 1000;
		display: block;
		/* Match .q10 */
		width: 700px;
		height: 700px;
	}
	q11 {
		position: relative;
		left: 300px;
		top: -710px;
		z-index: 1000;
		display: block;
		/* Match .q11 */
		width: 700px;
		height: 700px;
	}
	.circle1 {
		display:block;
		width:150px;
		height:150px;
		border-radius:150px;
		font-size:20px;
		color:#fff;
		line-height:150px;
		text-align:center;
		text-decoration:none;
		background-color:#ff9000;
		opacity:0.7
	}
	.circle2 {
		display:block;
		width:150px;
		height:150px;
		border-radius:150px;
		font-size:20px;
		color:#fff;
		line-height:150px;
		text-align:center;
		text-decoration:none;
		background-color:#ff9000;
		opacity:0.7
	}
	.circle3 {
		display:block;
		width:250px;
		height:250px;
		border-radius:250px;
		font-size:20px;
		color:#fff;
		line-height:250px;
		text-align:center;
		text-decoration:none;
		background-color:#ff9000;
		opacity:0.7
	}
	.circle4 {
		display:block;
		width:180px;
		height:180px;
		border-radius:180px;
		font-size:20px;
		color:#fff;
		line-height:180px;
		text-align:center;
		text-decoration:none;
		background-color:#ff9000;
		opacity:0.7
	}
	.circle5 {
		display:block;
		width:190px;
		height:190px;
		border-radius:190px;
		font-size:20px;
		color:#fff;
		line-height:190px;
		text-align:center;
		text-decoration:none;
		background-color:#ff9000;
		opacity:0.7
	}
	.circle6 {
		display:block;
		width:190px;
		height:190px;
		border-radius:190px;
		font-size:20px;
		color:#fff;
		line-height:190px;
		text-align:center;
		text-decoration:none;
		background-color:#ff9000;
		opacity:0.7
	}
	.circle7 {
		display:block;
		width:220px;
		height:220px;
		border-radius:220px;
		font-size:20px;
		color:#fff;
		line-height:220px;
		text-align:center;
		text-decoration:none;
		background-color:#ff9000;
		opacity:0.7
	}
	.circle8 {
		display:block;
		width:150px;
		height:150px;
		border-radius:150px;
		font-size:20px;
		color:#fff;
		line-height:150px;
		text-align:center;
		text-decoration:none;
		background-color:#ff9000;
		opacity:0.7
	}
	.circle9 {
		display:block;
		width:180px;
		height:180px;
		border-radius:180px;
		font-size:20px;
		color:#fff;
		line-height:180px;
		text-align:center;
		text-decoration:none;
		background-color:#ff9000;
		opacity:0.7
	}
	.circle10 {
		display:block;
		width: 700px;
		height:700px;
		border-radius:700px;
		font-size:20px;
		color:#fff;
		line-height:20px;
		text-align:center;
		display:table-cell;
		vertical-align:middle;
		text-decoration:none;
		background-color:#ff0000;
		opacity:0.9
	}
	.circle11 {
		display:block;
		width:700px;
		height:700px;
		border-radius:700px;
		font-size:20px;
		color:#fff;
		line-height:20px;
		text-align:center;
		display:table-cell;
		vertical-align:middle;
		text-decoration:none;
		background-color:#13288e;
		opacity:0.9
	}

	.circle1:hover {color:#ccc;text-decoration:none;background:#333}
	.circle2:hover {color:#ccc;text-decoration:none;background:#333}
	.circle3:hover {color:#ccc;text-decoration:none;background:#333}
	.circle4:hover {color:#ccc;text-decoration:none;background:#333}
	.circle5:hover {color:#ccc;text-decoration:none;background:#333}
	.circle6:hover {color:#ccc;text-decoration:none;background:#333}
	.circle7:hover {color:#ccc;text-decoration:none;background:#333}
	.circle8:hover {color:#ccc;text-decoration:none;background:#333}
	.circle9:hover {color:#ccc;text-decoration:none;background:#333}
	.circle10:hover {color:#ccc;text-decoration:none;background:#333}
	.circle11:hover {color:#ccc;text-decoration:none;background:#333}
</style>
<body onclick='window.location.href="#"'>
	<div id="logo">
		<img src="/gencyber/images/gencyber-logo.png" alt="gencyber-logo">
	</div>
	<div class="map">
		<img src="/gencyber/images/banner.jpg" alt="campus_map"/>
		<?php
		require 'numQs.php';

		$string = file_get_contents("/var/www/helpers/status.json");
		$obj = json_decode($string, true);
		if ($obj[$GLOBALS['id']]['1'][$numQ[1]] == 0) { echo "<q1><a href=\"1\" class=\"circle1\">1</a></q1>"; }
		if ($obj[$GLOBALS['id']]['2'][$numQ[2]] == 0) { echo "<q2><a href=\"2\" class=\"circle2\">2</a></q2>"; }
		if ($obj[$GLOBALS['id']]['3'][$numQ[3]] == 0) { echo "<q3><a href=\"3\" class=\"circle3\">3</a></q3>"; }
		if ($obj[$GLOBALS['id']]['4'][$numQ[4]] == 0) { echo "<q4><a href=\"4\" class=\"circle4\">4</a></q4>"; }
		if ($obj[$GLOBALS['id']]['5'][$numQ[5]] == 0) { echo "<q5><a href=\"5\" class=\"circle5\">5</a></q5>"; }
		if ($obj[$GLOBALS['id']]['6'][$numQ[6]] == 0) { echo "<q6><a href=\"6\" class=\"circle6\">6</a></q6>"; }
		if ($obj[$GLOBALS['id']]['7'][$numQ[7]] == 0) { echo "<q7><a href=\"7\" class=\"circle7\">7</a></q7>"; }
		if ($obj[$GLOBALS['id']]['8'][$numQ[8]] == 0) { echo "<q8><a href=\"8\" class=\"circle8\">8</a></q8>"; }
		if ($obj[$GLOBALS['id']]['9'][$numQ[9]] == 0) { echo "<q9><a href=\"9\" class=\"circle9\">9</a></q9>"; }
		$count = $obj[$GLOBALS['id']]['9'][$numQ[9]] +
				$obj[$GLOBALS['id']]['8'][$numQ[8]] +
				$obj[$GLOBALS['id']]['7'][$numQ[7]] +
				$obj[$GLOBALS['id']]['6'][$numQ[6]] +
				$obj[$GLOBALS['id']]['5'][$numQ[5]] +
				$obj[$GLOBALS['id']]['4'][$numQ[4]] +
				$obj[$GLOBALS['id']]['3'][$numQ[3]] +
				$obj[$GLOBALS['id']]['2'][$numQ[2]] +
				$obj[$GLOBALS['id']]['1'][$numQ[1]];
		if ($count == 9) {
			// Automate completion check
			# Count total teams
			$team_count = 18;
			# Count total challenges
			$chall_count = 9;
			# Check each team progress
			$release = 1;
			# Make sure to increment first digit when check teams above 9
			for ($i = 1; $i <= $team_count; $i++) {
				# Teams 01 - 18
				if ($i < 10)
				{
					$i = "0" . $i;
				}
				# For each team, check each question status (0 for incomplete, 1 for complete)
				for ($x = 1; $x <= $team_count; $x++) {
					for ($z = 1; $z <= $numQ[$x]; $z++) {
						# If all questions for all teams complete, release final challenge
						if($obj[$i][$x][$z] == 0)
						{
							$release = 0;
						}
					}
				}
			}
			# Set 'release' value based on teams completion
			$data = array('release' => $release);
			file_put_contents("/var/www/helpers/lastChall.json", json_encode($data));

			$string = file_get_contents("/var/www/helpers/lastChall.json");
			$obj2 = json_decode($string, true);
			if ($obj2['release'] == 1) {
				// GENCYBER 2016
				/* echo "<q10><a href=\"finalChallenge\" class=\"circle10\">" .
				"WELCOME TO THE FINAL CHALLENGE!<br>CLICK HERE TO BEGIN</a></q10>"; */
				// GENCYBER 2017
				echo "<q10><a href=\"overall\" class=\"circle10\">" .
				"GAME IS NOW OVER!<br/> " .
				"TEAM " . $GLOBALS['id'] . ": Here is your piece of the map:<br/><br/>" . 
				"<center><img src=\"rewards/" . $GLOBALS['id'] . ".png\" style=\"width:20%; height:20%;\"></center></img><br/>" . 
				"THE TREASURE AWAITS</a></q10>";
			}
			else {
				echo "<q11><a href=\"overall\" class=\"circle11\">" .
				"TEAM " . $GLOBALS['id'] . "<br/>" .
				"Well done! Congratulations on completing the nine sacred<br/> " .
				"challenges of a GenCyber Warrior. Here is your piece of the map:<br/><br/>" . 
				"<center><img src=\"rewards/" . $GLOBALS['id'] . ".png\" style=\"width:20%; height:20%;\"></center></img><br/>" .
				"Note: In order to continue to the final challenge, <br/>all teams must complete their " .
				"nine sacred challenges. You are now free to help <br/>the other teams. " . 
				"(You can give them hints on how to attain a flag but not <br/>give them the actual flag)</a></q11>";
			}
		}
		?>
	</div>
<?php include("sidebar.php"); ?>
</body>
</html>

<?php
	session_start();
	$id = $_SESSION['id'];
	$auth_user = $_SESSION['name'];

	require 'numQs.php';
	$string = file_get_contents("/var/www/helpers/status.json");
	$obj = json_decode($string, true);

	if ($obj[$id]['1'][$numQ[1]] == 1) { $check1 = "★"; }
	if ($obj[$id]['2'][$numQ[2]] == 1) { $check2 = "★"; }
	if ($obj[$id]['3'][$numQ[3]] == 1) { $check3 = "★"; }
	if ($obj[$id]['4'][$numQ[4]] == 1) { $check4 = "★"; }
	if ($obj[$id]['5'][$numQ[5]] == 1) { $check5 = "★"; }
	if ($obj[$id]['6'][$numQ[6]] == 1) { $check6 = "★"; }
	if ($obj[$id]['7'][$numQ[7]] == 1) { $check7 = "★"; }
	if ($obj[$id]['8'][$numQ[8]] == 1) { $check8 = "★"; }
	if ($obj[$id]['9'][$numQ[9]] == 1) { $check9 = "★"; }

	$display = "<div id=\"header\">\n";
	$display .= "	<!-- Nav -->\n";
	$display .= "	<nav id=\"nav\">\n";
	$display .= "		<ul>\n";
	$display .= "			<li><a>GenCyber Hawaii CTF 2017</a></li>\n";
	$display .= "			<li><a href=\"./\">Game Map</a></li>\n";
	$display .= "			<li>\n";
	$display .= "				<ul>\n";
	$display .= "					<li><a href=\"1\">Challenge 1 " . $check1 . "</a></li>\n";
	$display .= "					<li><a href=\"2\">Challenge 2 " . $check2 . "</a></li>\n";
	$display .= "					<li><a href=\"3\">Challenge 3 " . $check3 . "</a></li>\n";
	$display .= "					<li><a href=\"4\">Challenge 4 " . $check4 . "</a></li>\n";
	$display .= "					<li><a href=\"5\">Challenge 5 " . $check5 . "</a></li>\n";
	$display .= "					<li><a href=\"6\">Challenge 6 " . $check6 . "</a></li>\n";
	$display .= "					<li><a href=\"7\">Challenge 7 " . $check7 . "</a></li>\n";
	$display .= "					<li><a href=\"8\">Challenge 8 " . $check8 . "</a></li>\n";
	$display .= "					<li><a href=\"9\">Challenge 9 " . $check9 . "</a></li>\n";
	$display .= "				</ul>\n";
	$display .= "			</li>\n";
	$display .= "			<li><a href=\"myteam\">My Team's Score</a></li>\n";
	$display .= "			<li><a>leaderboard</a>\n";
	$display .= "			<ul>\n";
	$display .= "				<li><a href=\"overall\">Overall</a></li>\n";
	$display .= "				<li><a href=\"byteam\">By Team</a></li>\n";
	$display .= "			</ul>\n";
	$display .= "			</li>\n";
	$display .= "			<li><a href=\"rules\">Rules</a></li>\n";
	$display .= "			<li><a href=\"about\">About</a></li>\n";
	if ($id == 1337) { # Displays admin controls link only if admin (id: 1337) is signed in
		$display .= "			<li><a>administrator</a>\n";
		$display .= "			<ul>\n";
		$display .= "				<li><a href=\"controls/\">Controls</a></li>\n";
		$display .= "			</ul>\n";
		$display .= "			</li>\n";
	}
	$display .= "			<li><a>Logged in: " .  $auth_user . "</a></li>\n";
	$display .= "			<li><ul>\n";
	$display .= "				<li><a href=\"/logout\">Logout</a>\n";
	$display .= "			</ul></li>\n";
	$display .= "		</ul>\n";
	$display .= "	 </nav>\n";
	$display .= "</div>\n";
?>
<?php echo $display; ?>

<?php
# Start session
session_start();
# If there is no active session, redirect back to login
if(!isset($_SESSION["id"]))
{
	header("location: /login");
}
# Otherwise, set global session ID throughout the game
else
{
	$GLOBALS['id'] = $_SESSION["id"];
}
# If user visits a page, get the challenge
if(isset($_GET['page']))
{
	$GLOBALS['challengeID'] = $_GET['page'];
}
else
{
	header('location: /');
}
?>
<html>
<?php
# Require questionnaire css
require 'questionStyle.html';
# Require other assets such as CSS and scripts
require 'head.html';

# Get challenge descriptions based on challenge
$desc_json = file_get_contents("/var/www/helpers/description.json");
$description = json_decode($desc_json, True);
# Get challenge questions based on challenge
$ques_json = file_get_contents("/var/www/helpers/questions.json");
$questions = json_decode($ques_json, True);

?>
<!-- Tab Title -->
<title>Challenge <?php echo $GLOBALS['challengeID'] ?> - GenCyber Hawaii CTF</title>

<style>
	.wrap { 
		white-space: pre-wrap;		/* CSS3 */
		white-space: -moz-pre-wrap;	/* Firefox */
		white-space: -pre-wrap;		/* Opera <7 */
		white-space: -o-pre-wrap;	/* Opera 7 */
		word-wrap: break-word;		/* IE */
	}
</style>

<body>
	<div id="wrap" onclick='window.location.href="./"'></div>
	<center>
		<!-- Answer Box -->
		<div class="ansbox">
			<!-- Challenge Details -->
			<h1><strong>Challenge <?php echo $GLOBALS['challengeID'] ?></strong></h1>
			<p><strong>Description</strong><br><?php echo $description[$GLOBALS['challengeID']]?></p>

			<!-- DEPRECATE HINTING SYSTEM
			<?php
				/*
				$string = file_get_contents("/var/www/helpers/hints.json");
				$obj = json_decode($string, true);
				$count = $obj[$GLOBALS['challengeID']][1] + $obj[$GLOBALS['challengeID']][2] + $obj[$GLOBALS[$GLOBALS['challengeID']]][3] + $obj[$GLOBALS['challengeID']][4] + $obj[$GLOBALS['challengeID']][5];
					if ($count >= 1) { echo "<p><strong>Hints</strong><br>";
					if ($obj[$GLOBALS['challengeID']][1] == 1) { echo "<strong>1: </strong>AES 128, take the 128 bit MD5 hash of the Gencyber First Principle (no spaces, capitalization matters) and use as the cipher key.<br>"; }
					if ($obj[$GLOBALS['challengeID']][2] == 1) { echo "<strong>2: </strong>Specific building.<br>"; }
					if ($obj[$GLOBALS['challengeID']][3] == 1) { echo "<strong>3: </strong><br>"; }
					if ($obj[$GLOBALS['challengeID']][4] == 1) { echo "<strong>4: </strong><br>"; }
					if ($obj[$GLOBALS['challengeID']][5] == 1) { echo "<strong>5: </strong><br>"; }
				echo "</p>"; }
				*/
			?> -->

			<?php
				# Obtain the total number of questions for this challenge to keep track
				require_once 'numQs.php';
				
				/* Get the completion values for the questions per challenge per team
				* The file 'status.json' stores values of whether each question is answered or unanswered per challenge */
				$string = file_get_contents("/var/www/helpers/status.json");
				$obj = json_decode($string, true);
				# Send user's answer, remove whitespaces and lowercase it
				if(isset($_POST["answer"])) {
					$answer = $_POST["answer"];
					$answer = preg_replace('/\s+/', '', $answer);
					$answer = strtolower($answer);
				}
				else {
					$answer = "NULL";
				}
				
				# Block unauthorized users from submitting flags
				if ($GLOBALS['id'] == "00") {
					echo "<p>You're not allowed to submit flags!</p>";
				}
							
				# Display questions for challenge
				else {
					for ($chall_q = 1; $chall_q < ($numQ[$GLOBALS['challengeID']] + 1); $chall_q++) {
						$question_text = "";

						### BOX LABEL ###
						# Label final question as FLAG
						if($chall_q == ($numQ[$GLOBALS['challengeID']])) {
							$question_text = "<p class=\"wrap\"><strong><font color=\"red\">Flag</font></strong><br />" . $questions[$GLOBALS['challengeID']]['question'][$chall_q];
						}
						# Otherwise, label other question as ANSWER (to show it's not the final question)
						else {
							$question_text = "<p class=\"wrap\"><strong>Answer</strong><br />" . $questions[$GLOBALS['challengeID']]['question'][$chall_q];
						}

						### BOX NOTIFY ###
						if ($GLOBALS['id'] == 1337) {
							$answers = $questions[$GLOBALS['challengeID']]['answer'];
							$qAns = "Answers: ";
							foreach($answers[$chall_q] as $ans) { 
								$qAns .= $ans . "; ";
							}
							$question_text .= "<br><br>[DEBUG][" . $chall_q ."] <i><font color=\"blue\">" . $qAns . "</font></i>";
						}
									
						if($obj[$GLOBALS['id']][$GLOBALS['challengeID']][($chall_q)] == 1 or in_array($answer, $questions[$GLOBALS['challengeID']]['answer'][$chall_q])) {
							echo $question_text;

							# Mark challenge as complete once the final question is successfully answered
							if($chall_q == ($numQ[$GLOBALS['challengeID']])) {
								echo "<br /><br /><strong><font color=\"green\">You've solved this challenge!</font></strong><br></p>";
							}
							# Otherwise, mark question with this message for each successfully answered question
							else {
								echo "<br /><br /><strong>You've solved this portion!</strong><br /></p>";
							}

							# Set challenge question to value '1' for 'complete', write it to status.json
							if ($obj[$GLOBALS['id']][$GLOBALS['challengeID']][$chall_q] == 0) {
								$obj[$GLOBALS['id']][$GLOBALS['challengeID']][$chall_q]++;
								$json = json_encode($obj);
								file_put_contents("/var/www/helpers/status.json", $json);
							}
						}
						
						# If the question is not the final question of the challenge, keep showing Submit button and Answer field
						elseif($obj[$GLOBALS['id']][$GLOBALS['challengeID']][($chall_q - 1)] == 1 or $chall_q == 1) {
							echo "<form action=\"" . $GLOBALS['challengeID'] . "\" method=\"post\" style=\"margin: 0; padding: 0;\">";
							echo $question_text;
							echo "<br><br><input type=\"text\" name=\"answer\" placeholder=\" Answer\" value=\"\">";
							echo "<br><input type=\"submit\" value=\"Submit\" onclick=\"myFunction()\"></p>";
							echo "</form>";
							break;
						}
					}
				}
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

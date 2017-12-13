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
<style>
	.wrap { 
		white-space: pre-wrap;		/* CSS3 */
		white-space: -moz-pre-wrap;	/* Firefox */
		white-space: -pre-wrap;		/* Opera <7 */
		white-space: -o-pre-wrap;	/* Opera 7 */
		word-wrap: break-word;		/* IE */
	}
</style>

<title>Rules - GenCyber Hawaii CTF</title>
<body>
    <div id="wrap" onclick='window.location.href="./"'></div>
    <center>
        <div class="ansbox">
            <h1><strong>Rules for the GenCyber Hawaii CTF</strong></h1>
            <p>
                <strong>Gencyber Games Rules and Guidelines</strong><br/>
                Today you are challenged with completing the nine sacred challenges of a Gencyber Warrior. Upon completion of the nine challenges you will be given a piece of the map leading to the Lost Treasure of Kapalama.<br/>

                <br/><strong>Safety Rules</strong><br/>
                You must not cross any external streets and stay within the boundaries of Honolulu Community College. There are no flags outside of this area.<br/><br/>
                <a href="images/map_rules.jpg"><img src="images/map_rules.jpg" style="width: 75%; height: auto" alt="Campus Map"></a><br/><br/>
                
                - Team must have a minimum of 2 people per flag search team. One member must have a cellphone.<br/>
                - Members must keep in contact with your home base at all times. It is important that you keep track of all your team members at all times.<br/>
                - Volunteers wearing Gencyber shirts will be situated throughout the campus if you need assistance.<br/>

                <br/><strong>Gencyber Games Guidelines</strong><br/>
                - Initially, you will be given a URL to the website. Your username will be your team name. You will have to complete your first team task in order to get a pasword. When logged in, you will then receive a clickable map of HCC which will give you access to the first nine challenges.<br/>
                - You will enter your answers and flags into each challenge question. The game will convert your answers to all <b>lowercase</b> and with <b>no spaces.</b><br/>
                - The solution to the scenario will be a Cybersecurity First Principle. That principle can be used as a key to unlock further clues in each challenge.<br/>
                - The solution to each challenge will require you to go physically to a location and locate the answer to the flag.<br/>
                - Once you enter the correct flag, you will complete that challenge and if you refresh your browser that challenge should disappear (you can still revisit it from the sidebar).<br/>
                - Once you complete all nine challenges you will be give instructions on how to enter the final challenge.<br/>

                <br/><strong>Additional Rules</strong><br/>
                - Only one workstation can login to the game at a time (e.g Team1 must be logged in to their workstation).<br/>
                - You can use any resource available on the Internet.<br/>
                - Especially the resources given to you during the event.<br/>
                - You are not allowed to insert unauthorized USB devices for malicious activities.<br/>
                - You will not be allowed to leave the game room until 9:30.<br/>
                
                <br/><input type="submit" onclick="location.href='http://gencyber.cyberhawk.team/gencyber/';" value="Go to game map" style="block:inline"><br/>
            </p>
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

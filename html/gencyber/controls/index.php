<?php
    session_start();
    if(!isset($_SESSION['id'])) 
    {
        header("location: /login");
    }
    else {
        $id = $_SESSION['id'];
        if ($id != 1337) 
        {
            header("location: /gencyber");
        }
        else {
            $GLOBALS['id'] = $_SESSION["id"];
        }
    }

    $display =  "<h1>Controls</h1>\n";
    $display .= "<p><b><font color=\"red\">Admin ID:</font> " . $id . "</b><br/><br/>\n";
    $display .= "GenCyber Game developed by:<br/>\n";
    $display .= "Jayson Hayworth<br/>\n";
    $display .= "Emherson Borillo<br/>\n";
    $display .= "Taylor Kina<br/>\n";
    $display .= "Derrick Le<br/>\n";
    $display .= "Edward Chang<br/></p>\n";
    $display .= "<h2>GenCyber 2017</h2><br/>";
    $display .= "<a href=\"scripts/status_refresh\">Reset Challenges</a><br/><br/>\n";
    $display .= "<a href=\"scripts/status_complete\">Complete Challenges</a><br/><br/>\n";
    $display .= "<a href=\"scripts/check_status\">Check Status and Teams Progress</a><br/><br/>\n";
    $display .= "<a href=\"scripts/firstlog_check.php\">Reset Initial Login Checks</a><br/><br/>\n";
    $display .= "<a href=\"scripts/create_challenges\">Run 'Create Challenges' script</a><br/><br/>\n";
    $display .= "Easter egg directory used in CJ, Kara, Scott, and Pierce's <br/>security course for directory traversal lab<br/>\n";
    $display .= "<a href=\"nyan\">Nyan Cat</a><br/><br/>\n";
    $display .= "Security: CJ, Kara, Scott, Pierce<br/>\n";
    $display .= "Networking: Brad<br/>\n";
    $display .= "Cryptography: Sally<br/>\n";
    $display .= "Programming: Teren<br/>\n";
    $display .= "Game Development: Aaron, Emherson<br/>\n";
    $display .= "<hr><br/>";
    $display .= "<h2>GenCyber 2016</h2><br/>";
    $display .= "<a href=\"scripts/release_map\">Release The Map</a><br/><br/>\n";
    $display .= "<a href=\"scripts/unrelease_map\">Unrelease The Map</a><br/><br/>\n";
    $display .= "<a href=\"../../finalChallenge\">View Server-side Game Pieces</a><br/><br/>\n";
    $display .= "Security: Gerome, Cat, CJ, Derrick<br/>\n";
    $display .= "Networking*: Brad<br/>\n";
    $display .= "Cryptography*: Sally<br/>\n";
    $display .= "Programming: Mario<br/>\n";
    $display .= "(*) I can't remember<br/>\n";
    $display .= "<hr><br/>";
    $display .= "<a href=\"../\">Go Back</a><br/><br/>\n";
?>
<!DOCTYPE html>
<html>
<body>
    <h3 id="timer"></h3>
<?php 
echo $display; 
?>

<script>
// Set the date we're counting down to
var countDownDate = new Date("Jun 9, 2017 10:30:00").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();
    
    // Find the distance between now an the count down date
    var distance = countDownDate - now;
    
    // Time calculations for days, hours, minutes and seconds
    //var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    //var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    // Output the result in an element with id="demo"
    document.getElementById("timer").innerHTML = /*days + "d " + hours + "h "
    + */minutes + "m " + seconds + "s ";
    
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("timer").innerHTML = "GAME ENDED";
    }
}, 1000);
</script>

</body>
</html>

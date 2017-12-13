<?php
    session_start();
    if(!isset($_SESSION['id'])) 
    {
        header("location: /login");
    }
    else 
    {
        $id = $_SESSION['id'];
        if ($id != 1337) 
        {
            header("location: /gencyber");
        }
        else 
        {
            $GLOBALS['id'] = $_SESSION["id"];
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <META http-equiv="refresh" content="30" ;URL="">
</head>
<body>
    <h1>
    <?php
        # Count total teams
        $team_count = 18;
        # Count total challenges
        $chall_count = 9;
        # Count number of questions per challenge
        require '../../numQs.php';
        # Check each team progress
        $release = 1;
        $string = file_get_contents("/var/www/helpers/status.json");
        $obj = json_decode($string, true);
        # Make sure to increment first digit when check teams above 9
        for ($i = 1; $i <= $team_count; $i++) {
            # Teams 01 - 18
            if($i < 10)
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

        # Output status
        if($release == 0)
        {
            echo "Last challenge has not been released";
        }
        else
        {
            echo "RELEASE THE CHALLENGE!";
        }
    ?>
</h1>
    <a href="../../byteam">View Progress By Teams</a><br/>
    <a href="../../overall">View Overall Progress</a><br/>
    <a href="../../">Go Back to Map</a><br/>
    <a href="../">Go Back to Controls</a></br>
</body>
</html>

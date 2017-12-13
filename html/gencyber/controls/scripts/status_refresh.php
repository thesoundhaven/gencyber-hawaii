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

	$data = file_get_contents("/var/www/helpers/defaults/statusRefresh.json");
	file_put_contents("/var/www/helpers/status.json", $data);
	echo "<h2>All challenges reset</h2>";
	echo "<a href=\"../../\">Go Back to Map</a><br/>";
	echo "<a href=\"../\">Go Back to Controls</a><br/>";
?>

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

	$data = array('release' => 1);
	file_put_contents("/var/www/helpers/map.json", json_encode($data));

	echo "<h2>The map has been released.</h2>";
	echo "<a href=\"../../\">Go Back to Map</a><br/>";
	echo "<a href=\"../\">Go Back to Controls</a><br/>";
?>

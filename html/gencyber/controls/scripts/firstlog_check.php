<?php
    session_start();
    if(!isset($_SESSION['id'])) {
            header("location: /login");
    }
    else {
        $id = $_SESSION['id'];
        if ($id != 1337) {
            header("location: /gencyber");
        }
        else {
            $GLOBALS['id'] = $_SESSION["id"];
        }
    }

    # Reset all first login checks of 18 teams
    $firstlog['01']['firstlogin'] = 0;
    $firstlog['02']['firstlogin'] = 0;
    $firstlog['03']['firstlogin'] = 0;
    $firstlog['04']['firstlogin'] = 0;
    $firstlog['05']['firstlogin'] = 0;
    $firstlog['06']['firstlogin'] = 0;
    $firstlog['07']['firstlogin'] = 0;
    $firstlog['08']['firstlogin'] = 0;
    $firstlog['09']['firstlogin'] = 0;
    $firstlog['10']['firstlogin'] = 0;
    $firstlog['11']['firstlogin'] = 0;
    $firstlog['12']['firstlogin'] = 0;
    $firstlog['13']['firstlogin'] = 0;
    $firstlog['14']['firstlogin'] = 0;
    $firstlog['15']['firstlogin'] = 0;
    $firstlog['16']['firstlogin'] = 0;
    $firstlog['17']['firstlogin'] = 0;
    $firstlog['18']['firstlogin'] = 0;

    $json_login = json_encode($firstlog, JSON_PRETTY_PRINT);
    file_put_contents("/var/www/helpers/firstlog.json", $json_login);

    echo "<h2>First login checks (to display rules) have been reset</h2>";
    echo "<a href=\"../../\">Go Back to Map</a><br/>";
    echo "<a href=\"../\">Go Back to Controls</a><br/>";
?>

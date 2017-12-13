<?php
  session_start();
  if(!isset($_SESSION["id"])) {
    header("location: /login");
  }
  else {
    $GLOBALS['id'] = $_SESSION["id"];
  }
?>
<html>
<?php
require 'questionStyle.html';
require 'head.html';
?>
<title>About - GenCyber Hawaii CTF</title>
<body>
    <div id="wrap" onclick='window.location.href="./"'></div>
    <center>
        <div class="ansbox">
            <h1><strong>About the GenCyber Hawaii CTF</strong></h1>

            <p><strong>
		            GenCyber Hawaii CTF 2017 - Web game was developed by the following HATS members:<br/>
                <a href="http://hats.team"><img src="images/HATS-Crest.gif" alt="Hawai'i Advanced Technology Society" height=600 width=600></a><br/>
	    	        Jayson Hayworth<br/>
            		Derrick Le<br/>
            		Emherson Borillo<br/>
            		Taylor Kina<br/>
            		Edward Chang<br/><br/>
            		#HATS #JBM
	          </strong></p><br>
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

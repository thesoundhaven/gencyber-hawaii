<?php
require('/var/www/helpers/user_data.php');
# START SESSION
session_start();

if(isset($_GET['logout']))
{
	Logout();
}

if(isset($_POST['pass']) && isset($_POST["user"]))
{
	$error_msg = Login();
}

if(isset($_SESSION['name']))
{
	$error_msg = "You are already logged in.";
}
?>
<!DOCTYPE html>
<html>
  <head>
	<title>GENCYBER 2017 | LOGIN</title>
	<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
	<META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
	<link href="favicon.ico" rel="icon" type="image/x-icon" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script>
	  jQuery(document).ready(function($)
	  {
		$("#login").click
		(
		  function()
		  {
			var $continue = true;
			if($("#user").attr("value") == "")
			{
			  $("#user").addClass("alert").delay(3000).queue(function(next){$(this).removeClass("alert"); next();});
			  $continue = false;
			}
			if($("#pass").attr("value") == "")
			{
			  $("#pass").addClass("alert").delay(3000).queue(function(next){$(this).removeClass("alert"); next();});
			  $continue = false;
			}
			if ($continue == false)
			{
			  return false;
			}
		  }
		);
		$("#error").fadeOut(4000, function()
		{
		  // Animation complete.
		});
	  });
	</script>
	<style type="text/css">
	*
	{
	  outline:none
	}
	body
	{
	  font:62.5% "Lucida Grande",Arial,sans-serif;
	  background-color:#f6f6f6;
	  background-image: url("/img/bg.png");
	  background-repeat: repeat;
	  background-attachment: fixed;
	  background-position: center;
	  color:#777
	}
	h1,h2,h3,h4,h5
	{
	  color:#222
	}
	a
	{
	  text-decoration:none;
	  color:#08c
	}
	a:hover
	{
	  text-decoration:none
	}
	h1
	{
	  font:30px Arial,Helvetica,sans-serif;
	  letter-spacing:-1px;
	  padding:30px 0 0 0;
	  margin:0
	}
	h2
	{
	  font:15px Arial,Helvetica,sans-serif;
	  padding:0 0 3px 0;
	  margin-bottom:0
	}
	.list
	{
	  margin:0 auto;
	  width:380px;
	  padding:10px;
	background-color:#fff
	}
	.exists
	{
	  background:#FBE3E4 url(assets/cross.gif) no-repeat 98% center;
	  border-color:#FBC2C4;
	  color:#8a1f11
	}
	.avail
	{
	  background:#D6FFD8 url(assets/success.gif) no-repeat 98% center;
	  border-color:#A0D997;
	  color:#436213
	}
	#main,#header,#footer
	{
	  margin:0 auto;
	  width:540px;
	  margin-bottom:10px;
	  overflow:hidden
	}
	#main
	{
	  padding:15px 37px;
	  width:510px;
	  box-shadow:0 0 10px #CBCBCB;
	  border:1px solid #cbcbcb;
	  background:#fff
	}
	#logo
	{
	  position: static;
	  top: 0px;
	  width: 232;
	  height: auto;
	  margin: auto auto -120px auto
	}
	label
	{
	  display:block;
	  font-weight:bold;
	  color:#888;
	  font:10px Arial,Helvetica,sans-serif;
	  text-transform:uppercase;
	  margin:12px 0 4px
	}
	input,textarea,select
	{
	  padding:7px;
	  border:1px solid #eee;
	  font:16px Arial,Helvetica,sans-serif;
	  width:100%;
	  color:#999
	}
	input[type=submit],input.submit
	{
	  width:auto;
	  background:#178232;
	  border:1px solid #178232;
	  color:#fff;
	  font-family:Verdana;
	  font-size:14px;
	  margin-top:15px;
	  cursor:pointer;
	  width:auto;
	  padding:5px
	}
	input[type=submit]:hover,input[type=submit]:focus,input.submit:hover,input.submit:focus
	{
	  background:#178232;
	  color:#fff
	}
	.alert
	{
	  border: 1px solid red;
	}
	</style>
   </head>
   <body>
	<div id="main" style="background-color: #178232; color: #FFFFFF;font-family: Verdana; font-size: 14px; margin: 10% auto 0 !important;">
	   GENCYBER GAMES 2017 | LOGIN
	</div>

	<div id="main" style="margin: 10px auto !important;">
	<form method="POST" action="">
	<font id="error" color="red"><?php echo $error_msg; ?></font>
	<br />
	<label>Username</label><input type="text" name="user" id="user" value="" size="20" />
	<br />
	<label>Password</label><input type="password" name="pass" id="pass" size="20" />
	<br />
	<input type="submit" id="login" value="Submit" name="login" />
	</form>
	</div>

	<div id="main" style="background-color: #fff; color: #000;font-family: Verdana; font-size: 11px; margin: 10px auto 0 !important;">
	Welcome to GenCyber Hawaii of 2017. To begin doing challenges, login to your designated team using the username and password provided to you.<br /><br />
	<b>SPECTATORS:</b> For spectators to view rules and team scoring, login with username <i>guest</i> and password <i>spectate</i>
  </body>
</html>

<?php
function Logout()
{
	session_unset();
	session_destroy();
	header('Location: /login');
	exit();
}

function Login()
{
	$user_array = get_user_data();
	$user_match = get_user_match();
	/** user provided password */
	$username = trim($_POST['user']); /* user provided username */
	$password = trim($_POST['pass']); /* user provided password */
	if (($password != $user_array[$username]))
	{
		return "Error: Invalid username or password.";
	}
	else
	{
		if ($username == "admin")
		{
			$_SESSION['id'] = 1337;
			$_SESSION['name'] = "Admin";
		}
		else
		{
			$team_name = $user_match[$username];
			$team_num = preg_replace("/[^0-9]/", "", $team_name);
			if ($team_num <= 9)
			{
				$team_num = "0" . $team_num;
			}
			/** set cookie if password was validated  */
			$_SESSION['id'] = $team_num;
			$_SESSION['name'] = $username;
		}
		unset($_POST['user']);
		unset($_POST['pass']);
		unset($_POST['Submit']);
		
		// Show GenCyber Rules on first login
		$firstlog_json = file_get_contents("/var/www/helpers/firstlog.json");
		$firstlogin = json_decode($firstlog_json, True);
		if ($firstlogin[$team_num]['firstlogin'] == 0) {
			$firstlogin[$team_num]['firstlogin']++;
			$json = json_encode($firstlogin);
			file_put_contents("/var/www/helpers/firstlog.json", $json);
			header('Location: /gencyber/rules');
		}
		else {
			header('Location: /gencyber/');
		}
	}
}
?>

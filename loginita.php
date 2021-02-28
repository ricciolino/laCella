<?php
  require 'configita.inc';

  // check if login form is filled
  $user = trim($_REQUEST['username']);
  $pass = trim($_REQUEST['password']);
  $ad = $_REQUEST['admin'];

  if(!empty($user) && !empty($pass)) {
	  
	/* check if user is defined with the given password */
		if($ad=='yes'){
			if($UsersResp[$user]==$pass) { 
			  // Setting Session
			  session_start();
			  $_SESSION['user'] = $user;
			  // Redirecting to the logged page.
			  header("Location: insidepageRespita.php");
			 } else { 
			  // Wrong username or Password. Show error here.
			  header("Location: loginita.php?error=yes");
			 }
		}
		else{
			if($Users[$user]==$pass) { 
			  // Setting Session
			  session_start();
			  $_SESSION['user'] = $user;
			  // Redirecting to the logged page.
			  header("Location: insidepageita.php");
			 } else { 
			  // Wrong username or Password. Show error here.
			  header("Location: loginita.php?error=yes");
			 }
		 }              
    } else {
   /* no login data: send login form */
?>

<html>
<head>
<title>Login page</title>
<link rel="stylesheet" type="text/css" href="style\style.css"></link>
</head>
<body class="Body">

<?php
 if(!empty($_REQUEST['error'])) {
?>

<!-- error box in case of invalide user-password pair as set by the error GET
	variable -->
<div style="border-style:solid;border-color:red;text-align:center">
<h3 style="color:red">username e/o password errati</h3>
</div><br />

<?php
   }
?>
<table class="header">
	<tr>
		<td class="languages">
				<a href="index.html"><img src="images/ita.gif"</img></a>
				<a href="indexing.html"><img src="images/ing.png"></img></a>
		</td>
		<td style="width:5%;">
			<a id="aLogin" onmouseover="this.style='background-color:#fff099;color:#a15425;border-style:solid;border-width:2px;border-color:#a15425'" onmouseout="this.style='background-color:#fff9d5;color:withe;border-style:solid;border-width:2px;border-color:#a15425'" href="loginita.php">Accedi</a><br/>
			<a id="aLogin" onmouseover="this.style='background-color:#fff099;color:#a15425;border-style:solid;border-width:2px;border-color:#a15425'" onmouseout="this.style='background-color:#fff9d5;color:withe;border-style:solid;border-width:2px;border-color:#a15425'" href="signinita.php">Registrati</img></a>
		</td>
	</tr>
</table>
<p id="indexTitle">Agriturismo La Cella</p>
<div class="outer">
	<div class="middle">
		<center>
			<p id="enterPlogin">Accedi</p>
			<div id="divLogin">
				<form action="loginita.php" method="post">
					<table>
						<tr><td id="tdPrenota"><small>admin:</small></td><td><input type="checkbox" name="admin" value="yes"/></td></tr>
						<tr><td id="tdPrenota">Username:</td><td><input type="text" name="username" size="20" maxlength="20"/></td></tr>
						<tr><td id="tdPrenota">Password:</td><td><input type="password" name="password" /></td></tr>
					</table>
					<input type="submit" value="Accedi"/>	
				</form>
			</div>
		</center>
	</div>
</div>
<p class="foo1">Località&nbsp;San&nbsp;Bernardino&nbsp;-&nbsp;Strada&nbsp;del&nbsp;Pecorile&nbsp;-&nbsp;53041&nbsp;Asciano&nbsp;(SI)</p>
<p class="foo2">Tel/Fax:&nbsp;+39&nbsp;0577717116&nbsp;-&nbsp;Mobile:&nbsp;+39&nbsp;3490605766</p>
<p class="foo3"><i>e-mail:&nbsp;nicholasredimail@gmail.com</i></p>

<?php
   }
?>
</body>
</html>

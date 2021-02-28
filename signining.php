<html>
	<head>
		<title>SignIn page</title>
		<link rel="stylesheet" type="text/css" href="style\style.css"></link>
		<script language="JavaScript">
			function verifica(dati){
				if(dati.nome.value=="") { alert("Campo nome mancante.\nModulo non spedito"); dati.nome.focus(); return false; }
				if(dati.cognome.value=="") { alert("Campo cognome mancante.\nModulo non spedito"); dati.cognome.focus(); return false; }
				if(dati.cf.value=="") { alert("Codice fiscale mancante.\nModulo non spedito"); dati.cf.focus(); return false; }
				if(dati.naz.value=="") { alert("Nazione mancante.\nModulo non spedito"); dati.naz.focus(); return false; } 
				if(dati.email.value=="") { alert("Campo email mancante.\nModulo non spedito"); dati.email.focus(); return false; }
				if(dati.username.value=="") { alert("Campo username mancante.\nModulo non spedito"); dati.username.focus(); return false; }
				if(dati.password.value=="") { alert("Campo password mancante.\nModulo non spedito"); dati.password.focus(); return false; }
				return true;
			}
		</script>
	</head>
	<body class="Body">
	<table class="header">
		<tr>
			<td class="languages">
				<a href="index.html"><img src="images/ita.gif"</img></a>
				<a href="indexing.html"><img src="images/ing.png"></img></a>
			</td>
			<td style="width:5%;">
				<a id="aLogin" onmouseover="this.style='background-color:#fff099;color:#a15425;border-style:solid;border-width:2px;border-color:#a15425'" onmouseout="this.style='background-color:#fff9d5;color:withe;border-style:solid;border-width:2px;border-color:#a15425'" href="logining.php">Login</a><br/>
				<a id="aLogin" onmouseover="this.style='background-color:#fff099;color:#a15425;border-style:solid;border-width:2px;border-color:#a15425'" onmouseout="this.style='background-color:#fff9d5;color:withe;border-style:solid;border-width:2px;border-color:#a15425'" href="signining.php">SignIn</img></a>
			</td>
		</tr>
	</table>
	<p id="indexTitle">Farmhouse La Cella</p>
	<div class="outer">
		<div class="middle">
			<center>
				<p id="enterPlogin">Sign In</p>
				<div id="divLogin">
					<form action="signedining.php" method="post" onsubmit="verifica(this)">
						<table>
							<tr><td id="tdPrenota"> Name: </td><td> <input type="text" name="nome" size="30" maxlength="30" /></td></tr>
							<tr><td id="tdPrenota"> Surname: </td><td> <input type="text" name="cognome" size="30" maxlength="30" /></td></tr>
							<tr><td id="tdPrenota"> SSN: </td><td> <input type="text" name="cf" size="16" maxlength="16" minlength="16" /></td></tr>
							<tr><td id="tdPrenota"> Nation: </td><td> <input type="text" name="naz" size="20" maxlength="20" /></td></tr>
							<tr><td id="tdPrenota">e-Mail:</td><td><input type="email" name="email" size="30" maxlength="30" /></td></tr>
							<tr><td id="tdPrenota">Username:</td><td><input type="text" name="username" size="20" maxlength="20"/></td></tr>
							<tr><td id="tdPrenota">Password:</td><td><input type="password" name="password" size="20" maxlength="20"/></td></tr>
						</table>
						<input type="submit" value="Sign In"/>	
					</form>
				</div>
			</center>
		</div>
	</div>
	<p class="foo1">Località&nbsp;San&nbsp;Bernardino&nbsp;-&nbsp;Strada&nbsp;del&nbsp;Pecorile&nbsp;-&nbsp;53041&nbsp;Asciano&nbsp;(SI)</p>
	<p class="foo2">Tel/Fax:&nbsp;+39&nbsp;0577717116&nbsp;-&nbsp;Mobile:&nbsp;+39&nbsp;3490605766</p>
	<p class="foo3"><i>e-mail:&nbsp;nicholasredimail@gmail.com</i></p>
	</body>
</html>


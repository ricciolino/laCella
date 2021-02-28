<?php require "defSel.php"; ?>
<html>
	<head>
		<title>Prenota</title>
		<link rel="stylesheet" type="text/css" href="style/style.css" />
		<script language="JavaScript">
			function verifica(dati){
				if(dati.nome.value=="") { alert("Campo nome mancante.\nModulo non spedito"); dati.nome.focus(); return false; }
				if(dati.cognome.value=="") { alert("Campo cognome mancante.\nModulo non spedito"); dati.cognome.focus(); return false; }
				if(dati.cf.value=="") { alert("Codice fiscale mancante.\nModulo non spedito"); dati.cf.focus(); return false; }
				if(dati.naz.value=="") { alert("Nazione mancante.\nModulo non spedito"); dati.naz.focus(); return false; }
				if(dati.persone.value=="") { alert("Campo persone mancante.\nModulo non spedito"); dati.persone.focus(); return false; }
				if(dati.arrivo.value=="") { alert("Campo data di arrivo mancante.\nModulo non spedito"); dati.arrivo.focus(); return false; }
				if(dati.partenza.value=="") { alert("Campo data di ripartenza mancante.\nModulo non spedito"); dati.partenza.focus(); return false; }
				if(dati.partenza.value<=dati.arrivo.value) { alert("Data di ripartenza non può antecedere (o eguagliare) la data di arrivo.\nModulo non spedito"); dati.partenza.focus(); return false; }
				if(dati.email.value=="") { alert("Campo email mancante.\nModulo non spedito"); dati.email.focus(); return false; }
				return true;
			}
		</script>
	</head>
	<body class="Body">				
		<table class="header">
			<tr>
				<td class="languages">
					<a href="#"><img src="images/ita.gif"</img></a>
					<a href="prenotaing.php"><img src="images/ing.png"></img></a>
				</td>
				<td style="width:5%;">
					<a id="aLogin" onmouseover="this.style='background-color:#fff099;color:#a15425;border-style:solid;border-width:2px;border-color:#a15425'" onmouseout="this.style='background-color:#fff9d5;color:withe;border-style:solid;border-width:2px;border-color:#a15425'" href="loginita.php">Accedi</a><br/>
					<a id="aLogin" onmouseover="this.style='background-color:#fff099;color:#a15425;border-style:solid;border-width:2px;border-color:#a15425'" onmouseout="this.style='background-color:#fff9d5;color:withe;border-style:solid;border-width:2px;border-color:#a15425'" href="signinita.php">Registrati</img></a>
				</td>
			</tr>
		</table>
		<div id="back">
			<p class="title">La Cella - Holiday Resort</p>
			<div class="menu">
				<ul id="links">
					<li><a href="homeita.html">Home</a></li>
					<li><a href="papaveroita.html">Il Papavero</a></li>
					<li><a href="girasoleita.html">Il Girasole</a></li>
					<li><a href="prodottiita.html">Prodotti tipici</a></li>
					<li><a href="#"><strong>Prenota</strong></a></li>
				</ul>
			</div>
			<p class="contentTitle">Prenota la tua vacanza!</p>
			<center>
				<form method="post" onSubmit="return verifica(this);" name="dati" action="prenotazione.php">
					<table>
						<tr><td id="tdPrenota"> Nome: </td><td colspan="5"> <input type="text" name="nome" size="30" maxlength="30" /></td></tr>
						<tr><td id="tdPrenota"> Cognome: </td><td colspan="5"> <input type="text" name="cognome" size="30" maxlength="30" /></td></tr>
						<tr><td id="tdPrenota"> SSN: </td><td colspan="5"> <input type="text" name="cf" size="16" maxlength="16" minlength="16" /></td></tr>
						<tr><td id="tdPrenota"> Nazione: </td><td colspan="5"> <input type="text" name="naz" size="20" maxlength="20" /></td></tr>
						<tr><td id="tdPrenota">Data di arrivo:</td><td><input type="date" name="arrivo" /></td></tr>
						<tr><td id="tdPrenota">Data di ripartenza:</td><td><input type="date" name="partenza" /></td></tr>
						<tr>
							<td id="tdPrenota">Appartamento:</td><td colspan="5"> <?php generateSelect("appartamento",$app,false); ?> </td>
						</tr>
						<tr><td id="tdPrenota">Numero di persone:</td><td colspan="5"><input type="number" min="1" name="persone" /></td></tr>
						<tr><td id="tdPrenota">e-Mail:</td><td colspan="5"><input type="email" name="email" size="30" maxlength="30" /></td></tr>
						<tr><td id="tdPrenota" valign="top"> Richieste aggiuntive:</td><td colspan="5"><textarea name="aggiu" rows="5" cols="37"></textarea></td></tr>
					</table>
					<input type="submit" value="Invia" />
				</form><br/>
			</center>
			<center><a href="homeita.html"><img src="images/home.gif" onmouseover="this.src='images/homeOn.gif'" onmouseout="this.src='images/home.gif'"></img></a></center><br />
			<p class="foo1">Localit&agrave;&nbsp;La&nbsp;Cella&nbsp;-&nbsp;Strada&nbsp;del&nbsp;Pecorile&nbsp;-&nbsp;53041&nbsp;Asciano&nbsp;(SI)</p>
			<p class="foo2">Tel/Fax:&nbsp;+39&nbsp;0577717116&nbsp;-&nbsp;Mobile:&nbsp;+39&nbsp;3490605766</p>
			<p class="foo3"><i>e-mail:&nbsp;nicholasredimail@gmail.com</i></p>
		</div>
	</body>
</html>

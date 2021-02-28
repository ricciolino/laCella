<?php require "defSel.php"; ?>
<html>
	<head>
		<title>Buy product</title>
		<link rel="stylesheet" type="text/css" href="style/style.css"></link>
		<script>
			function prodSel(){
				var x = document.getElementById("prod").value;
				switch(x){
					case "Gallina": document.getElementById("prod_sel").innerHTML = "(prezzo per unità 30 euro)"; break;
					case "Coniglio": document.getElementById("prod_sel").innerHTML = "(prezzo per unità 25 euro)"; break;
					case "Vino": document.getElementById("prod_sel").innerHTML = "(prezzo per litro 16 euro)"; break;
					case "Olio": document.getElementById("prod_sel").innerHTML = "(prezzo per unità 12 euro)"; break;
				}
			}
			function verifica(dati){
				if(dati.nome.value=="") { alert("Campo nome mancante.\nModulo non spedito"); dati.nome.focus(); return false; }
				if(dati.cognome.value=="") { alert("Campo cognome mancante.\nModulo non spedito"); dati.cognome.focus(); return false; }
				if(dati.cf.value=="") { alert("Codice fiscale mancante.\nModulo non spedito"); dati.cf.focus(); return false; }
				if(dati.naz.value=="") { alert("Nazione mancante.\nModulo non spedito"); dati.naz.focus(); return false; }
				if(dati.prod.value=="") { alert("Scegliere un prodotto"); dati.prod.focus(); return false; }
				if(dati.qu.value=="") { alert("Scegliere la quantità"); dati.qu.focus(); return false; }
				if(dati.email.value=="") { alert("Campo email mancante.\nModulo non spedito"); dati.email.focus(); return false; }
				return true;
			}
		</script>
	</head>
	<body class="Body">			
		<table class="header">
			<tr>
				<td class="languages">
					<a href="acquistoita.php"><img src="images/ita.gif"</img></a>
					<a href="#"><img src="images/ing.png"></img></a>
				</td>
				<td style="width:5%;">
					<a id="aLogin" onmouseover="this.style='background-color:#fff099;color:#a15425;border-style:solid;border-width:2px;border-color:#a15425'" onmouseout="this.style='background-color:#fff9d5;color:withe;border-style:solid;border-width:2px;border-color:#a15425'" href="logining.php">Login</a><br/>
					<a id="aLogin" onmouseover="this.style='background-color:#fff099;color:#a15425;border-style:solid;border-width:2px;border-color:#a15425'" onmouseout="this.style='background-color:#fff9d5;color:withe;border-style:solid;border-width:2px;border-color:#a15425'" href="signining.php">SignIn</img></a>
				</td>
			</tr>
		</table>
		<div id="back">
			<p class="title">La Cella - Holiday Resort</p>
			<div class="menu">
				<ul id="links">
					<li><a href="homeing.html">Home</a></li>
					<li><a href="papaveroing.html">Il Papavero</a></li>
					<li><a href="girasoleing.html">Il Girasole</a></li>
					<li><a href="prodottiing.html">Typical products</a></li>
					<li><a href="prenotaing.php">Booking</a></li>
				</ul>
			</div>
			<p class="contentTitle">Buy a product!</p>
			<form method="post" onSubmit="return verifica(this);" name="dati" action="acquistatoing.php">
				<center>
					<table>
						<tr><td id="tdPrenota"> Name: </td><td colspan="5"> <input type="text" name="nome" size="30" maxlength="30" /></td></tr>
						<tr><td id="tdPrenota"> Surname: </td><td colspan="5"> <input type="text" name="cognome" size="30" maxlength="30" /></td></tr>
						<tr><td id="tdPrenota"> SSN: </td><td colspan="5"> <input type="text" name="cf" size="16" maxlength="16" minlength="16" /></td></tr>
						<tr><td id="tdPrenota"> Nation: </td><td colspan="5"> <input type="text" name="naz" size="20" maxlength="20" /></td></tr>
						<tr><td id="tdPrenota">e-Mail:</td><td colspan="5"><input type="email" name="email" size="30" maxlength="30" /></td></tr>
						<tr><td></td><td><p style="margin-bottom:-6px;font-size:15px;text-align:center;color:#6f2f08;" id="prod_sel"></p></td><td colspan="3"></td></tr>
						<tr><td id="tdPrenota"> Product</td><td><select id="prod" name="prod" onchange="prodSel()"><?php echo "<option disabled selected value> -- scegli prodotto -- </option>"; foreach($prod as $k => $val) echo "<option value=\"$val\">$val</option>"; ?></select></td></tr>
						<tr><td id="tdPrenota"> Quantity</td><td align="left"><input type="number" min="1" name="qu"/></td></tr>
					</table>
					<input type="submit" value="Buy"/>
				</center>
			</form><br/><br/>
			<center><a href="homeing.html"><img src="images/home.gif" onmouseover="this.src='images/homeOn.gif'" onmouseout="this.src='images/home.gif'"></img></a></center><br />
			<p class="foo1">Localit&agrave;&nbsp;La&nbsp;Cella&nbsp;-&nbsp;Strada&nbsp;del&nbsp;Pecorile&nbsp;-&nbsp;53041&nbsp;Asciano&nbsp;(SI)</p>
			<p class="foo2">Tel/Fax:&nbsp;+39&nbsp;0577717116&nbsp;-&nbsp;Mobile:&nbsp;+39&nbsp;3490605766</p>
			<p class="foo3"><i>e-mail:&nbsp;nicholasredimail@gmail.com</i></p>
		</div>
	</body>
</html>


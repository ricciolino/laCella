<html>
	<head>
		<title>Prenotata</title>
		<link rel="stylesheet" type="text/css" href="style/style.css"></link>
	</head>
	<body class="Body">				
		<table class="header">
			<tr>
				<td class="languages">
					<a href="prenotaita.php"><img src="images/ita.gif"</img></a>
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
					<li><a href="prenotaita.php">Prenota</a></li>
				</ul>
			</div>
			<?php
				$dbconn=pg_connect("host=localhost port=5432 dbname=laCella user=postgres password=0123456789");
				if(!$dbconn){echo "Connection to laCella database failed<br/>";exit;}
				
				$name=$_REQUEST['nome']; $surname=$_REQUEST['cognome']; $ssn=$_REQUEST['cf']; $nazione=$_REQUEST['naz'];
				$arrive=$_REQUEST['arrivo']; $departure=$_REQUEST['partenza']; $flat=$_REQUEST['appartamento']; $number=$_REQUEST['persone'];
				$mail=$_REQUEST['email'];$aggiu=$_REQUEST['aggiu'];
				$query=pg_query($dbconn,"select nome,capienza from appartamento where id='$flat'");
				$row=pg_fetch_row($query);
				$flat_name=$row[0];
				$flat_cap=$row[1];

				if($number>$flat_cap) echo "<center><h4 style=\"color:#a15425;margin-bottom:0px\">numero di persone non può eccedere la capienza dell'appartamento (max ".$flat_cap." persone)</h4></center>";
				else{
					$result=pg_query($dbconn,"select count(cf) as tot from cliente where cf='$ssn' and nazione='$nazione'"); //cliente gia esistente?
					if((pg_fetch_row($result)[0])=="0"){ // inesistente
						$query="insert into cliente (cf,nazione,nome,cognome,mail) values ('$ssn','$nazione','$name','$surname','$mail');";
						$result=pg_query($dbconn,$query);
						if(!$result){echo "<center><small>query \"$query\" failed</small></center><br/><br/>";exit;}
						//else echo "<center><small>added client $name $surname</small></center><br/>";
					} // esistente
					//else echo "<center><small>client $name $surname already exist</small></center><br/>";
					
					//richieste aggiuntive?
					if($aggiu!="") $query="insert into prenotazione (cf,nazione,appartamento,arrivo,ripartenza,persone,richieste_aggiuntive) values ('$ssn','$nazione','$flat','$arrive','$departure','$number','$aggiu');";
					else $query="insert into prenotazione (cf,nazione,appartamento,arrivo,ripartenza,persone) values ('$ssn','$nazione','$flat','$arrive','$departure','$number');";
					$result=pg_query($dbconn,$query);
					if(!$result){echo "<center><small>query \"$query\" failed</small></center><br/><br/>";exit;}
					//else echo "<center><small>added prenotation for flat \"$flat_name\"</small></center><br/>";
					
					//prenotazione andata a buon fine!
					echo "<center><h2 style=\"color:#a15425;margin-bottom:0px\">Prenotazione effetuata con successo!</h2></center>";
					echo "<center><p style=\"color:#a15425;font-size:20px;margin-top:8px;margin-bottom:10px;padding-top:0px\">Riepilogo:</p></center>";
					echo "<center><table>
							<tr><td style=\"text-align:right;font-family:Courier;color:#a15425\"> Nome: </td><td style=\"font-size:18.5px;color:#a15425;font-weight:bold\">$name</td></tr>
							<tr><td style=\"text-align:right;font-family:Courier;color:#a15425\"> Cognome: </td><td style=\"font-size:18.5px;color:#a15425;font-weight:bold\">$surname</td></tr>
							<tr><td style=\"text-align:right;font-family:Courier;color:#a15425\">Data di arrivo:</td><td style=\"font-size:18.5px;color:#a15425;font-weight:bold\">$arrive</td></tr>
							<tr><td style=\"text-align:right;font-family:Courier;color:#a15425\">Data di ripartenza:</td><td style=\"font-size:18.5px;color:#a15425;font-weight:bold\">$departure</td></tr>
							<tr><td style=\"text-align:right;font-family:Courier;color:#a15425\">Appartamento:</td><td style=\"font-size:18.5px;color:#a15425;font-weight:bold\">$flat_name</td></tr>
							<tr><td style=\"text-align:right;font-family:Courier;color:#a15425\">Numero di persone:</td><td style=\"font-size:18.5px;color:#a15425;font-weight:bold\">$number</td></tr>";
					//calcolo prezzo in base al periodo della prenotazione tramite le views del database
					$prezzo=pg_fetch_row(pg_query($dbconn,"select * from prezzo;"))[0];  //prezzo è una vista!!! (si basa su un'altra vista 'stagione')
					$query="UPDATE prenotazione SET prezzo_tot = $prezzo WHERE id=(SELECT MAX(id) FROM prenotazione);";
					$result=pg_query($dbconn,$query);
					if(!$result){echo "<center><small>query \"$query\" failed</small></center><br/><br/>";exit;}
					  echo "<tr><td style=\"text-align:right;font-family:Courier;color:#a15425\">Prezzo totale:</td><td style=\"font-size:18.5px;color:#a15425;font-weight:bold\">$prezzo euro</td></tr>
						</table></center><br/>";
				}
			?>
			<center><a href="homeita.html"><img src="images/home.gif" onmouseover="this.src='images/homeOn.gif'" onmouseout="this.src='images/home.gif'"></img></a></center><br />
			<p class="foo1">Localit&agrave;&nbsp;La&nbsp;Cella&nbsp;-&nbsp;Strada&nbsp;del&nbsp;Pecorile&nbsp;-&nbsp;53041&nbsp;Asciano&nbsp;(SI)</p>
			<p class="foo2">Tel/Fax:&nbsp;+39&nbsp;0577717116&nbsp;-&nbsp;Mobile:&nbsp;+39&nbsp;3490605766</p>
			<p class="foo3"><i>e-mail:&nbsp;nicholasredimail@gmail.com</i></p>
		</div>
	</body>
</html>

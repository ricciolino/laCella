<html>
	<head>
		<title>Bought</title>
		<link rel="stylesheet" type="text/css" href="style/style.css"></link>
	</head>
	<body class="Body">				
		<table class="header">
			<tr>
				<td class="languages">
					<a href="acquistoita.php"><img src="images/ita.gif"</img></a>
					<a href="acquistoing.php"><img src="images/ing.png"></img></a>
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
			<?php
				$dbconn=pg_connect("host=localhost port=5432 dbname=laCella user=postgres password=0123456789");
				if(!$dbconn){echo "Connection to laCella database failed<br/>";exit;}
				
				$name=$_REQUEST['nome']; $surname=$_REQUEST['cognome']; $ssn=$_REQUEST['cf']; $nazione=$_REQUEST['naz'];$mail=$_REQUEST['email'];
				$q=$_REQUEST['qu'];$p_name=$_REQUEST['prod'];
				$p=pg_fetch_row(pg_query($dbconn,"select id from prodotto where nome='$p_name'"))[0];
				$price_prod=pg_fetch_row(pg_query($dbconn,"select prezzo from prodotto where name='$p'"))[0];

				$result=pg_query($dbconn,"select count(cf) as tot from cliente where cf='$ssn' and nazione='$nazione'"); //cliente gia esistente?
				if((pg_fetch_row($result)[0])=="0"){ // inesistente
					$query="insert into cliente values ('$ssn','$nazione','$name','$surname','$mail');";
					$result=pg_query($dbconn,$query);
					if(!$result){echo "<center><small>query \"$query\" failed</small></center><br/><br/>";exit;}
					//else echo "<center><small>added client $name $surname</small></center><br/>";
				} // esistente
				//else echo "<center><small>client $name $surname already exist</small></center><br/>";
				
				//inserisci acquisto
				$query="insert into acquisto (cf,nazione,prodotto,quantita) values ('$ssn','$nazione','$p','$q');";
				$result=pg_query($dbconn,$query);
				if(!$result){echo "<center><small>query \"$query\" failed</small></center><br/><br/>";exit;}
				//else echo "<center><small>added prenotation for flat \"$flat_name\"</small></center><br/>";
				
				//prenotazione andata a buon fine!
				echo "<center><h2 style=\"color:#a15425;margin-bottom:0px\">Successful purchase!</h2></center>";
				echo "<center><p style=\"color:#a15425;font-size:20px;margin-top:8px;margin-bottom:10px;padding-top:0px\">summary:</p></center>";
				echo "<center><table>
						<tr><td style=\"text-align:right;font-family:Courier;color:#a15425\"> Name: </td><td style=\"font-size:18.5px;color:#a15425;font-weight:bold\">$name</td></tr>
						<tr><td style=\"text-align:right;font-family:Courier;color:#a15425\"> Surname: </td><td style=\"font-size:18.5px;color:#a15425;font-weight:bold\">$surname</td></tr>
						<tr><td style=\"text-align:right;font-family:Courier;color:#a15425\">Product:</td><td style=\"font-size:18.5px;color:#a15425;font-weight:bold\">$p_name</td></tr>
						<tr><td style=\"text-align:right;font-family:Courier;color:#a15425\">Quantity:</td><td style=\"font-size:18.5px;color:#a15425;font-weight:bold\">$q</td></tr>";
				//calcolo prezzo totale in base al prezzo unitario del prodotto e la quantità acquistata
				$prezzo=pg_fetch_row(pg_query($dbconn,"select (acquisto.quantita)*(prodotto.prezzo) as prezzo_tot from acquisto,prodotto where acquisto.id=(select max(acquisto.id) from acquisto) and prodotto.id='$p';"))[0];
				$query="UPDATE acquisto SET prezzo_tot = '$prezzo' WHERE id=(SELECT MAX(id) FROM acquisto);";
				$result=pg_query($dbconn,$query);
				if(!$result){echo "<center><small>query \"$query\" failed</small></center><br/><br/>";exit;}
				  echo "<tr><td style=\"text-align:right;font-family:Courier;color:#a15425\">Prezzo totale:</td><td style=\"font-size:18.5px;color:#a15425;font-weight:bold\">$prezzo euro</td></tr>
					</table></center><br/>";
			?>
			<center><a href="homeing.html"><img src="images/home.gif" onmouseover="this.src='images/homeOn.gif'" onmouseout="this.src='images/home.gif'"></img></a></center><br />
			<p class="foo1">Localit&agrave;&nbsp;La&nbsp;Cella&nbsp;-&nbsp;Strada&nbsp;del&nbsp;Pecorile&nbsp;-&nbsp;53041&nbsp;Asciano&nbsp;(SI)</p>
			<p class="foo2">Tel/Fax:&nbsp;+39&nbsp;0577717116&nbsp;-&nbsp;Mobile:&nbsp;+39&nbsp;3490605766</p>
			<p class="foo3"><i>e-mail:&nbsp;nicholasredimail@gmail.com</i></p>
		</div>
	</body>
</html>

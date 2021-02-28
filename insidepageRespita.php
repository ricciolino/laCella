<?php
  // Starting the session
  session_start();

  if(empty($_SESSION['user'])) {
     // Code for not Logged members
     header("Location: loginita.php");
   } else {
	   
     /* valid user */
     /* count number of accesses */
     $us=$_SESSION['user'];
     
     $_SESSION['insidecnt']++;

     $_SESSION['timestamps'][] = date('l jS \of F Y h:i:s A');

   }
?> 
<html>
<head>
<title>Login page</title>
<link rel="stylesheet" type="text/css" href="style\style.css"></link>
</head>
<body class="Body">
<table class="header">
	<tr>
		<td>
			<center><a id="aLogout" onmouseover="this.style='background-color:#fff099;color:#a15425;border-style:solid;border-width:2px;border-color:#a15425'" onmouseout="this.style='background-color:#fff9d5;color:withe;border-style:solid;border-width:2px;border-color:#a15425'" href="logoutita.php">Logout</a></center>
		</td>
	</tr>
</table>
<p id="indexTitle">Agriturismo La Cella</p>
<div class="outer">
	<div class="middle">
		<center>
			<div id="divLogin">
				<p id="welcome">Responsabile <?php echo $us; ?></p>
				<?php
					$dbconn=pg_connect("host=localhost port=5432 dbname=laCella user=postgres password=0123456789");
					if(!$dbconn){echo "Connection to laCella database failed<br/>";exit;}
					$prenotazioni=pg_query($dbconn,"select cliente.nome,cognome,appartamento.nome,persone,arrivo,ripartenza from prenotazione join cliente on prenotazione.cf=cliente.cf and prenotazione.nazione=cliente.nazione join appartamento on prenotazione.appartamento=appartamento.id");
					echo "<div style=\"float:left;width:68%;\"><h2 style=\"color:#a15425;padding-right:30%;\">Tutte le prenotazioni:</h2>";echo "<ul>";
					while($p=pg_fetch_row($prenotazioni)) echo "<li style=\"color:#a15425;text-align:left;\">prenotazione di ".$p[0]." ".$p[1]." per appartamento ".$p[2]." dal ".$p[4]." al ".$p[5]." (".$p[3]." persona/e)</li>"; echo "</ul></div>";
					$acquisti=pg_query($dbconn,"select cliente.nome,cognome,prodotto.nome,quantita from acquisto join cliente on acquisto.cf=cliente.cf and acquisto.nazione=cliente.nazione join prodotto on acquisto.prodotto=prodotto.id");
					echo "<div style=\"float:right;width:32%;\"><h2 style=\"color:#a15425;padding-right:30%;\">Tutti gli acquisti:</h2>";echo "<ul>";
					while($a=pg_fetch_row($acquisti)) echo "<li style=\"color:#a15425;text-align:left;\">acquistato ".$a[3]." di ".$a[2]." da ".$a[0]." ".$a[1]."</li>"; echo "</ul></div>";
				?>
			</div>
		</center>
	</div>
</div>
<p class="foo1">Località&nbsp;San&nbsp;Bernardino&nbsp;-&nbsp;Strada&nbsp;del&nbsp;Pecorile&nbsp;-&nbsp;53041&nbsp;Asciano&nbsp;(SI)</p>
<p class="foo2">Tel/Fax:&nbsp;+39&nbsp;0577717116&nbsp;-&nbsp;Mobile:&nbsp;+39&nbsp;3490605766</p>
<p class="foo3"><i>e-mail:&nbsp;nicholasredimail@gmail.com</i></p>
</body>
</html>


<?php
  // Starting the session
  session_start();

  if(empty($_SESSION['user'])) {
     // Code for not Logged members
     header("Location: logining.php");
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
			<center><a id="aLogout" onmouseover="this.style='background-color:#fff099;color:#a15425;border-style:solid;border-width:2px;border-color:#a15425'" onmouseout="this.style='background-color:#fff9d5;color:withe;border-style:solid;border-width:2px;border-color:#a15425'" href="logouting.php">Logout</a></center>
		</td>
	</tr>
</table>
<p id="indexTitle">Farmhouse La Cella</p>
<div class="outer">
	<div class="middle">
		<center>
			<div id="divLogin">
				<p id="welcome">Welcome <?php echo $us; ?></p>
				<?php
					$dbconn=pg_connect("host=localhost port=5432 dbname=laCella user=postgres password=0123456789");
					if(!$dbconn){echo "Connection to laCella database failed<br/>";exit;}
					$prenotazioni=pg_query($dbconn,"select appartamento.nome,arrivo,ripartenza,persone from prenotazione,cliente,appartamento where appartamento.id=prenotazione.appartamento and cliente.cf=prenotazione.cf and cliente.nazione=prenotazione.nazione and cliente.username='$us'");
					echo "<div style=\"float:left;width:50%;\"><h2 style=\"color:#a15425;padding-right:30%;\">Historical reservations:</h2>";echo "<ul>";
					while($p=pg_fetch_row($prenotazioni)) echo "<li style=\"color:#a15425;\">booked apartment ".$p[0]." from ".$p[1]." to ".$p[2]." for ".$p[3]." people</li>"; echo "</ul>";
					$acquisti=pg_query($dbconn,"select prodotto.nome,quantita from acquisto,cliente,prodotto where prodotto.id=acquisto.prodotto and cliente.cf=acquisto.cf and cliente.nazione=acquisto.nazione and cliente.username='$us'");
					echo "</div><div style=\"float:right;width:50%;\"><h2 style=\"color:#a15425;\">Historical purchases:</h2>";echo "<ul style=\"text-align:left;padding-left:33%;\">";
					while($a=pg_fetch_row($acquisti)) echo "<li style=\"color:#a15425;\">purchased ".$a[1]." of ".$a[0]."</li>"; echo "</ul></div>";
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

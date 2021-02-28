<html>
<head>
<title>SignedIn page</title>
<link rel="stylesheet" type="text/css" href="style\style.css"></link>
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
			<div id="divLogin">
				<?php
					$dbconn=pg_connect("host=localhost port=5432 dbname=laCella user=postgres password=0123456789");
					if(!$dbconn){echo "Connection to laCella database failed<br/>";exit;}
					
					$name=$_REQUEST['nome']; $surname=$_REQUEST['cognome']; $ssn=$_REQUEST['cf']; $nazione=$_REQUEST['naz'];$mail=$_REQUEST['email'];
					$user=$_REQUEST['username'];$pass=$_REQUEST['password'];
					$result=pg_fetch_row(pg_query($dbconn,"select cf,nazione,username,password from cliente where cf='$ssn' and nazione='$nazione'"));
					$c=$result[0];$n=$result[1];$u=$result[2];$p=$result[3];
					if($c==null&&$n==null){
						$result=pg_fetch_row(pg_query($dbconn,"select username from cliente where username='$user'"))[0];
						if($result==null){
							$query="insert into cliente (cf,nazione,nome,cognome,mail,username,password) values ('$ssn','$nazione','$name','$surname','$mail','$user','$pass');";
							$result=pg_query($dbconn,$query);
							if(!$result){echo "<center><small>query \"$query\" failed</small></center><br/><br/>";exit;}
							echo "<p style=\"font-family:Courier; font-size:20px; color:#a15425;\">The user has been registered!</p>";
						}
						else
							echo "<p style=\"font-family:Courier; font-size:20px; color:#a15425;\">User name already exists...</p>";
					}
					else{
						if($u==null&&$p==null){
							$query="UPDATE cliente SET username = '$user', password = '$pass' WHERE cf='$c' AND nazione='$n';";
							$result=pg_query($dbconn,$query);
							if(!$result){echo "<center><small>query \"$query\" failed</small></center><br/><br/>";exit;}
							echo "<p style=\"font-family:Courier; font-size:20px; color:#a15425;\">Existing customer, registered user!</p>";
						}
						else{
							echo "<p style=\"font-family:Courier; font-size:20px; color:#a15425;\">User already existing...</p>";
						}
					}
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



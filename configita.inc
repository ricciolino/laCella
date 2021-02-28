<?php
	$dbconn=pg_connect("host=localhost port=5432 dbname=laCella user=postgres password=0123456789");
	if(!$dbconn){echo "Connection to laCella database failed<br/>";exit;}
	$clie=pg_query($dbconn,"select username,password from cliente where username is not null and password is not null");
	$resp=pg_query($dbconn,"select username,password from responsabile where username is not null and password is not null");
	while($cl=pg_fetch_row($clie)){
		$Users[$cl[0]]=$cl[1];
	}
	while($re=pg_fetch_row($resp)){
		$UsersResp[$re[0]]=$re[1];
	}
?>

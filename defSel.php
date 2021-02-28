<?php
	$dbconn=pg_connect("host=localhost port=5432 dbname=laCella user=postgres password=0123456789");
	if(!$dbconn){echo "Connection to laCella database failed<br/>";exit;}
	$result=pg_query($dbconn,"select * from appartamento");
	while ($row = pg_fetch_row($result)) $app[$row[0]]=$row[1];
	$result=pg_query($dbconn,"select * from prodotto;");
	while ($row = pg_fetch_row($result)) $prod[$row[0]]=$row[1];
	
	function generateSelect($name,$list,$mult){
		$multopt = "";
		if($mult)
			$multopt = "multiple=\"true\" sixe=\"" . count($list) . "\"";
		echo "<select name=\"$name\" $multopt >";
		foreach($list as $k => $val)
			echo "<option value=\"$k\">$val</option>";
		echo "</select>";
	}
?>

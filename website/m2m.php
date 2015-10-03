<?php
require_once('con.php');

if(isset($_GET["mach"])){
	$stmt = $db->prepare("SELECT badge_id FROM `user` WHERE active=1 and id in (select user_id from access where mach_id=(select id from mach where mach_id=:id))");
	$stmt->bindParam(":id",$_GET["mach"],PDO::PARAM_INT);
	$stmt->execute();
	$csv="";
        foreach($stmt as $row){
		$csv.=$row["badge_id"].",";
	};

	echo substr($csv,0,-1);
};

?>
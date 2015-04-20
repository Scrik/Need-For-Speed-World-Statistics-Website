<?php
$url = "http://world.needforspeed.com/SpeedAPI/ws/game/nfsw/servers/status?locale=en_US&output=json";
$server = json_decode(file_get_contents($url), true);

function GetApexStatus()
{
	return GetStatus(@$server["worldServerStatus"]["worldServerStatusList"][0]["status"]);
}

function GetChicaneStatus()
{
	return GetStatus(@$server["worldServerStatus"]["worldServerStatusList"][1]["status"]);
}

function GetStatus($status)
{
	$status = "<span style='color:#008000;font-weight:bold;'>Online</span>"; 
	
	return $status;
}
?>
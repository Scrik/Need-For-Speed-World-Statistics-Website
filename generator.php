<?php
if($_GET["g"] == 0)
{
	header("Content-Type: image/jpeg");
	$nfsw = array(
		"Server" => $_GET["s"] , 
		"Bg" => $_GET["bg"],
		"Status" => "http://world.needforspeed.com/SpeedAPI/ws/game/nfsw/servers/status?locale=en_US&output=json");	
	$server = json_decode(file_get_contents($nfsw["Status"]), true);
	if($nfsw["Server"] == "APEX")
	{
		$status_serveru = GetStatus($server["worldServerStatus"]["worldServerStatusList"][0]["status"]);
	}
	else if($nfsw["Server"] == "CHICANE")
	{
		$status_serveru = GetStatus($server["worldServerStatus"]["worldServerStatusList"][1]["status"]);
	}
	else if($nfsw["Server"] == "BOTH")
	{
		$status_serveru = array(GetStatus($server["worldServerStatus"]["worldServerStatusList"][0]["status"]),GetStatus($server["worldServerStatus"]["worldServerStatusList"][1]["status"]));
	}
	if($nfsw["Bg"] == 0) $bg = rand(1,3);
	else $bg = $nfsw["Bg"];
	$img = imagecreatefrompng("common/assets/".$bg.".png");
	$bg = imagecolorallocate($img, 255, 255, 255);
	$textcolor = imagecolorallocate($img, 255, 255, 255);
	$online = imagecolorallocate($img, 0, 255, 0);
	$offline = imagecolorallocate($img, 255, 0, 0);
	$font = "common/fonts/font_2.ttf";
	imagettftext($img, 12, 0, 20, 21, $textcolor, $font, "Server Status");
	if($nfsw["Server"] == "APEX")
	{
		imagettftext($img, 12, 0, 40, 41, $textcolor, $font, "Apex : ");
		imagettftext($img, 12, 0, 110, 41, ($status_serveru == "Online")?$online:$offline, $font, $status_serveru);
	}
	else if($nfsw["Server"] == "CHICANE")
	{
		imagettftext($img, 12, 0, 40, 41, $textcolor, $font, "Chicane : ");
		imagettftext($img, 12, 0, 140, 41, ($status_serveru == "Online")?$online:$offline, $font, $status_serveru);
	}
	else if($nfsw["Server"] == "BOTH")
	{
		imagettftext($img, 10, 0, 64, 35, $textcolor, $font, "Apex : ");
		imagettftext($img, 10, 0, 130, 35, ($status_serveru[0] == "Online")?$online:$offline, $font, $status_serveru[0]);
		
		imagettftext($img, 10, 0, 40, 47, $textcolor, $font, "Chicane : ");
		imagettftext($img, 10, 0, 130, 47, ($status_serveru[1] == "Online")?$online:$offline, $font, $status_serveru[1]);
	}
	imagepng($img);
	imagedestroy($img);
}




function GetStatus($status)
{
	if($status == "UP" or "up") $status = "Online"; 
	else $status = "Offline";
	return $status;
}
?>
<?php

function Connect_MySQL()
{
	require "dibi/dibi.php";
}

function PageSystem()
{
    if(isset($_GET['page']))
	{
        if (file_exists("pages/".$_GET['page'].".php"))
        {
            include("pages/".$_GET['page'].".php");
        } else {
            echo "<div class=\"alert alert-error\">Stránka nenalezena !!</div>";
        }
    } else {
        include("pages/index.php");
    }
}
function GetManu($manu)
{
	$werk = str_replace("CAR_MANU_", "", $manu);
	return $werk;
}

function GetCarName($name)
{
	$car = str_replace("CAR_MDL_","",$name);
	return $car;
}

function CarNameTranslator($name)
{
	$check = strstr($name, "CAR_MDL_");
	
	$car = str_replace("CAR_MDL_","",$name);
	$carname = array(
	"CHEVELLE" => "Chevelle SS",
	"MURCIELAGO650" => "Murcielago LP 650-4 ROADSTER",
	"CAR1006" => "Reventon",
	"MURCIELAGOSV" => "Murcielago Super Veloce",
	"MURCIELAGO640" => "Murcielago LP 640",
	"CAR1034" => "Aventador LP-700",
	"CARRERAGT" => "Carrera GT",
	"CROWNCOP" => "Crown Victoria Police Interceptor",
	"2000GTR72" => "2000GT-R",
	"SKYLINE" => "SKYLINE R34 V-SPEC",
	"CAR1032" => "Cobalt SS",
	"BMWM3GTS" => "M3 GTS",
	"CHALLENGER71" => "CHALLENGER R/T",
	"SKYLINER35V" => "GT-R SpecV [R35]",
	"CAMARO" => "Camaro SS",
	"FIREBIRD78" => "Firebird Formula",
	"IMPREZAWRXSTI" => "IMPREZA WRX STI",
	"JAGUARXKR" => "XKR",
	"RX82009" => "RX8 '09'",
	"S5" => "S5",
	"200SX" => "200SX",
	"300C" => "300C",
	"CHALLENGER71" => "CHALLENGER '71'",
	"R32" => "Golf R32",
	"240SX" => "240SX",
	"240ZG71" => "240ZG71",
	"SUPRA" => "SUPRA",
	"ELCAMINO" => "El Camino",
	"BMWM3E30" => "E30 M3",
	"CAR1030" => "CCXR",
	"ECLIPSEELITE" => "Eclipse",
	"DIABLO" => "Diablo",
	"R8V10" => "R8 V10",
	"SILVIAS15" => "Silvia S15",
	"CHALLENGERN" => "Challenger",
	"CAR1020" => "F150",
	"BMW3CSL" => "3 CSL",
	"350Z" => "350Z",
	"FORDGT" => "GT",
 	"CAR1068" => "Miura Concept",
	"IS300" => "IS300",
	"CAMAROZL1" => "Camaro ZL1",
	"CORVETTEZR1" => "Corvette ZR1",
	"CORVETTEZ06" => "Corvette Z06",	
	"LEXUSLFA" => "LFA",
	"911GT3RS" => "911 GT3 RS",
	"MUSTANGBOSS12" => "Mustang Boss'12",
	"COUNTACH" => "Countach",
	"SKYLINER35" => "Skyline R35",
	
	
);
	if(!$check)
	{
		return $name;
	}else{
		return @$carname[$car];
	}
}
?>
<?php
include "libs/funkce.php";
Connect_MySQL();
include "common/server_status.php";
$Timer = MicroTime( true );
?>
<!DOCTYPE html>
<html>
	<head>
		<META HTTP-EQUIV="content-language"CONTENT="cs">
		<META HTTP-EQUIV="content-type"CONTENT="text/html; charset=windows-1250">
		<META NAME="description"CONTENT="Need For Speed World">
		<META NAME="keywords"CONTENT="Need For Speed World">
		<META NAME="googlebot"CONTENT="index,follow,snippet,archive">
		<META NAME="robots"CONTENT="index,follow">
		<META NAME="author"CONTENT="Ewwe">
		<META NAME="owner"CONTENT="Ewwe">
		<META NAME="webmaster"CONTENT="Ewwe">
		<META NAME="copyright"CONTENT="Ewwe © 2012">
		<link rel="stylesheet"href="style/css/bootstrap.css"type="text/css"/>
		<link rel="stylesheet"href="style/css/main.css"type="text/css"/>
		<script type="text/javascript"src="style/js/bootstrap.js"></script>
		<link rel=" shortcut icon" href="style/img/favicon.ico">
		<Title>Need For Speed World</Title>
	</head>
	<body style="background:url('style/img/bg.jpg');background-repeat: no-repeat;background-attachment:fixed;">
		<div class="navbar">
			<div class="navbar-inner">
				<a class="brand" href="#" onclick="javascript:window.location='?page=index'">NFS - World</a>
				<ul class="nav">
					<li><a href="#" onclick="javascript:window.location='?page=index'"><i class="icon-home"></i> Home</a></li>
					<li><a href="#"><i class="icon-eye-open"></i> O hře</a></li>
					<li><a href="#" onclick="javascript:window.location='?page=server'"><i class="icon-hdd"></i> Servery</a></li>
					<li><a href="#" onclick="javascript:window.location='?page=profil'"><i class="icon-user"></i> Profil</a></li>
					<li><a href="#" onclick="javascript:window.location='?page=carpark'"><i class="icon-fire"></i> Vozový park hráče</a></li>
					<li><a href="#"><i class="icon-play-circle"></i> <b>Apex</b> : <?php echo GetApexStatus();?></a></li>
					<li><a href="#"><i class="icon-play-circle"></i> <b>Chicane</b> : <?php echo GetChicaneStatus();?></a></li>
				</ul>
			</div>
		</div>
		<?php PageSystem();?>
		<div class="span10 tabulka"></div>
		<div id="bottom" class="span10 " style="font-size:small;background-color:white;" >
			<table class="table table-striped">
				<tbody>
					<tr>
						<td style="text-align:left;"><span class="badge badge-important">Ewolutions.cz &copy; 2012</span></td>
						<td style="text-align:right;"><span class="badge badge-success" >Vygenerováno za <?php echo Number_Format( ( MicroTime( true ) - $Timer ), 4, '.', '' )*1000; ?> ms</span></td>
					</tr>
				</tbody>
			<table>
		</div>
	</body>
</html>
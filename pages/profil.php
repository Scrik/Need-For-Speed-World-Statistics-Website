<?php if(!isset($_GET["send"])) { ?>
<table style="text-align:center;background-color:white;width:80%;" align="center"  class="table table-striped">
	<form method="GET">
		<input type="hidden" name="page" value="profil">
			<thead>  
				<tr>
					<caption style="text-align:center;background-color:white;"><b>NFS - World Profil</b></caption>
				</tr>
			</thead> 
			<tbody> 
				<tr>
					<th>Herní Nick :  </th>
					<td><input class="span2" type="text" name="d" placeholder="Tvùj Nick" required></td>
				</tr>
				<tr>
					<th>Server :  </th>
					<td>
						<select name="s" class="span2">
							<option value="none">Vyber server</option>
							<option value="APEX">APEX</option>
							<option value="CHICANE">CHICANE</option>
						</select>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="submit" name="send" value="Odeslat" class="btn btn-primary">
					</td>
				</tr>
			</tbody>
			<tfoot>
				<tr>
					<td></td>
				</tr>
			</tfoot>
		</form>
	</table>
		
<?php 
	}else{
	$basic = array("Driver" => strtoupper($_GET["d"]),"Shard" => $_GET["s"]);

	$_profil = "http://world.needforspeed.com/SpeedAPI/ws/game/nfsw/driver/".$basic["Driver"]."/profile?shard=".$basic["Shard"]."&output=json";
	$_curcar = "http://world.needforspeed.com/SpeedAPI/ws/game/nfsw/driver/".$basic["Driver"]."/car?shard=".$basic["Shard"]."&output=json";
	$_stats = "http://world.needforspeed.com/SpeedAPI/ws/game/nfsw/driver/".$basic["Driver"]."/stats?shard=".$basic["Shard"]."&output=json";
	$_carcount = "http://world.needforspeed.com/SpeedAPI/ws/game/nfsw/driver/".$basic["Driver"]."/cars?output=json";
	$_last_seen = "http://world.needforspeed.com/SpeedAPI/ws/game/nfsw/driver/".$basic["Driver"]."/lastLogin?output=json";
	
	$profil = json_decode(file_get_contents($_profil), true);
	$curcar = json_decode(file_get_contents($_curcar), true); 
	$carscount = json_decode(file_get_contents($_carcount), true);
	$lsn = json_decode(file_get_contents($_last_seen), true);
	$last_seen = $lsn["worldLastLogin"]["date"].".".$lsn["worldLastLogin"]["month"].".20".substr( $lsn["worldLastLogin"]["year"], 1 );
	$last_seen = $last_seen." v ".$lsn["worldLastLogin"]["hours"].":".$lsn["worldLastLogin"]["minutes"].":".$lsn["worldLastLogin"]["seconds"];
	
	$user = array(
		"Level" => $profil["worldDriverProfile"]["level"],
		"Status" => $profil["worldDriverProfile"]["statusMessage"],
		"AvatarId" => $profil["worldDriverProfile"]["image"],
	);
	

	$class = str_replace("carclass_", "", $curcar["worldCar"]["physicsProfile"]["carClass"]);
	
	
?>
	<table style="text-align:center;background-color:white;width:80%;" align="center"  class="table table-striped">
		<thead>
			<tr>
				<caption style="text-align:center;background-color:white;">
					<b>Profil hráèe <?php echo $_GET["d"];?></b>
				</caption>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><button class="btn" type="submit" onclick="javascript:window.location='?page=profil'"><i class="icon-backward"></i> Zpìt</button></td><td></td>
			</tr>
			<tr>
				<td> Avatar : </td>
				<td><img src="common/assets/avatar/<?php echo $user["AvatarId"];?>.png" width="48" height="48" ondragstart="return false;"></td>
			</tr>
			<tr>
				<td>Nick : </td>
				<td><?php echo ucfirst($_GET["d"]);?></td>
			</tr>
			<tr>
				<td>Level : </td>
				<td><?php echo $user["Level"];?></td>
			</tr>
			<tr>	
				<td>Zpráva : </td>
				<td><?php echo $user["Status"];?></td>
			</tr>
			<tr>	
				<td>Vlastní vozidel : </td>
				<td><?php echo sizeof($carscount["worldCars"]);?></td>
			</tr>
			<tr>
				<td>Vozový park : </td>
				<td><a href="http://<?php echo $_SERVER["SERVER_NAME"];?>/?page=carpark&d=<?php echo $_GET["d"];?>&send=Odeslat">ZDE</a></td>
			</tr>
			<tr>	
				<td>Naposledy online : </td>
				<td><?php echo $last_seen;?></td>
			</tr>
			<tr><th colspan="2" style="text-align:center;">Aktuální vozidlo</th></tr>
			<tr>
				<td><img src="common/assets/icons/car_make.png"></td>
				<td><img src='common/assets/car_make/CAR_MANU_<?php echo GetManu($curcar["worldCar"]["make"]);?>.png' width='38' heigth='38' ondragstart='return false;'></td>
			</tr>
			<tr>
				<td><img src="common/assets/icons/car_name.png"></td>
				<td><?php echo utf8_decode(CarNameTranslator($curcar["worldCar"]["carName"]));?></td>
			</tr>
			<tr>	
				<td><img src="common/assets/icons/car_overall.png"></td>
				<td><img src='common/assets/class/car_class_<?php echo $class;?>.png' width='20' heigth='20' ondragstart='return false;' title="Tøída <?php echo strtoupper($class)." : ".$curcar["worldCar"]["physicsProfile"]["rating"];?>"></td>
			</tr>
			<tr>
				<td><img src="common/assets/icons/car_top_speed.png"></td>
				<td><progress value='<?php echo $curcar["worldCar"]["physicsProfile"]["topSpeed"];?>' max='1000' title='Maximální rychlost : <?php echo $curcar["worldCar"]["physicsProfile"]["topSpeed"];?>'></progress></td>
			</tr>
			<tr>
				<td><img src="common/assets/icons/car_accel.png"></td>
				<td><progress value='<?php echo $curcar["worldCar"]["physicsProfile"]["acceleration"];?>' max='1000' title='Zrychlení : <?php echo $curcar["worldCar"]["physicsProfile"]["acceleration"];?>'></progress></td>
			</tr>
			<tr>	
				<td><img src="common/assets/icons/car_handl.png"></td>
				<td><progress value='<?php echo $curcar["worldCar"]["physicsProfile"]["handling"];?>' max='1000' title='Ovládání : <?php echo $curcar["worldCar"]["physicsProfile"]["handling"];?>'></progress></td>
			</tr>
			
		</tbody>
		<tfoot>
		</tfoot>
	</table>
	<br><br><br>
<?php } 

?>
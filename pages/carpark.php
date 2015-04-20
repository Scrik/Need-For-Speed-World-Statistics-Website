<?php 
	if(empty($_GET["send"]))
	{
		global $_GET;
		unset($_GET);
?>	
		<table style="text-align:center;background-color:white;width:80%;" align="center"  class="table table-striped tabulka">
			<form method="GET" id ="myform">
				<input type="hidden" name="page" value="carpark">
				<thead>  
					<tr>
						<caption style="text-align:center;background-color:white;"><b>NFS - World Vozový park hráèe</b></caption>
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
							<input type="submit" name="send" value="Odeslat" class="btn btn-primary" onclick='javascript:document.forms["myform"].submit();'>
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
	
	$nfsw = array(
	"Driver" => strtoupper(@$_GET["d"]), 
	"Url" => "http://world.needforspeed.com/SpeedAPI/ws/game/nfsw/driver/".strtoupper(@$_GET["d"])."/cars?shard=".$_GET["s"]."&output=json"
	);
	$json_reader = json_decode(file_get_contents($nfsw["Url"]), true);
	?>
	<table style="text-align:center;background-color:white;width:90%;" align="center"  class="table table-striped tabulka">
		<thead>
			<tr>
				<caption style="text-align:center;background-color:white;"><b>NFS - World Vozový park hráèe <?php echo ucfirst($_GET["d"]);?></b></caption>
			</tr>
			<tr><td><button class="btn" type="submit" onclick="javascript:window.location='?page=carpark'"><i class="icon-backward"></i> Zpìt</button></td><td style="text-align:right;" colspan="8"><?php echo "Vozidel : ".sizeof($json_reader["worldCars"]);?></td></tr>
			<tr>
				<th>ID</th>
				<th style="text-align:center;"><img src="common/assets/icons/car_make.png"></th>
				<th colspan="2"><img src="common/assets/icons/car_name.png"></th>
				<th style="text-align:center;"><img src="common/assets/icons/car_overall.png"></th>
				<th>Class</th>
				<th><img src="common/assets/icons/car_top_speed.png"></th>
				<th><img src="common/assets/icons/car_accel.png"></th>
				<th><img src="common/assets/icons/car_handl.png"></th>
			</tr>
		</thead>
		<tbody>
		<?php
		for($i=0;$i < sizeof($json_reader["worldCars"]);$i++)
		{
		$class = str_replace("carclass_", "", $json_reader["worldCars"][$i]["physicsProfile"]["carClass"]);
		?>
		<tr style='font-size:x-small;'>
			<td style='text-align:center;'>
				<b><?php echo ($i+1);?></b>
			</td>
			<td style="text-align:center;">
				<img src='common/assets/car_make/CAR_MANU_<?php echo GetManu(preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '',$json_reader["worldCars"][$i]["make"]));?>.png' width='32' heigth='32' ondragstart='return false;'>
			</td>
			<td colspan="2">
				<?php echo utf8_decode(CarNameTranslator($json_reader["worldCars"][$i]["carName"]));?>
			</td>
			
			<td style="text-align:center;">
				<?php echo $json_reader["worldCars"][$i]["physicsProfile"]["rating"];?>
			</td>
			
			<td style='text-align:center;'>
				<img src='common/assets/class/car_class_<?php echo $class;?>.png' width='20' heigth='20' ondragstart='return false;'>
			</td>
			
			<td>
				<progress value='<?php echo $json_reader["worldCars"][$i]["physicsProfile"]["topSpeed"];?>' max='1000' title='Maximální rychlost : <?php echo $json_reader["worldCars"][$i]["physicsProfile"]["topSpeed"];?>'></progress>
			</td>
			
			<td>
				<progress value='<?php echo $json_reader["worldCars"][$i]["physicsProfile"]["acceleration"];?>' max='1000' title='Zrychlení : <?php echo $json_reader["worldCars"][$i]["physicsProfile"]["acceleration"];?>'></progress>
			</td>
			
			<td>
				<progress value='<?php echo $json_reader["worldCars"][$i]["physicsProfile"]["handling"];?>' max='1000' title='Ovládání : <?php echo $json_reader["worldCars"][$i]["physicsProfile"]["handling"];?>'></progress>
			</td>
		</tr>
		<?php
		}
		?>
		</tbody>
		<tfoot>
			<tr>
				<td></td>
			</tr>
		</tfoot>
	</table>
<?php } ?>



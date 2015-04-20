<form method="POST">
	<table style="text-align:center;background-color:white;width:80%;" align="center"  class="table table-striped">
		<tr>
			<td>Znaèka</td>
			<td>
				<select name="make" class="span2">
				<option value="none">Vyber znaèku</option>
				<?php
					if ($handle = opendir('./common/assets/car_make')) 
					{
						while (false !== ($entry = readdir($handle))) 
						{
							if ($entry != "." && $entry != "..") 
							{
								$entry2 = str_replace("CAR_MANU_", "", $entry);
								$entry2 = str_replace(".png", "", $entry2);
								echo "<option value='".$entry."'>".ucfirst(strtolower($entry2))."</option>";
							}
						}
						closedir($handle);
					}
				?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Model</td>
			<td><input class="span2" type="text" name="z" placeholder="Model vozidla" required></td>
		</tr>
		<tr>
			<td>Rating</td>
			<td><input class="span2" type="text" name="rat" placeholder="Model vozidla" required></td>
		</tr>
		<tr>
			<td>Top Speed</td>
			<td><input class="span2" type="text" name="top" placeholder="Max rychlost" required></td>
		</tr>
		<tr>
			<td>Akcelerace</td>
			<td><input class="span2" type="text" name="acc" placeholder="Max akcelerace" required></td>
		</tr>
		<tr>
			<td>Handling</td>
			<td><input class="span2" type="text" name="hndl" placeholder="Max ovladatelnost" required></td>
		</tr>
		<tr>
			<td>Speed Boost</td>
			<td><input class="span2" type="text" name="boost" placeholder="Max rychlost" required></td>
		</tr>
		<tr>
			<td>Money</td>
			<td><input class="span2" type="text" name="money" placeholder="Max rychlost" required></td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="submit" name="add" value="Vložit" class="btn btn-primary">
			</td>
		</tr>
		
	</table>
</form>
<?php
if(@$_POST["add"])
{
	$cn = mysql_connect("localhost","root","");
	$sql_prepare = "INSERT INTO need_for_speed.car_list (Make,Model,rating,Top,Akc,Handl,Boost,Money) VALUES('".$_POST["make"]."','".$_POST["z"]."',".$_POST["rat"].",".$_POST["top"].",".$_POST["acc"].",".$_POST["hndl"].",".$_POST["boost"].",".$_POST["money"].")";
	if($cn)
	{
		if(mysql_select_db("need_for_speed"))
		{
			if(mysql_query($sql_prepare)) echo"Added!";
			else echo "Neadded";
			
		}else echo "Ne";
	}else echo "Ne";
}
?>
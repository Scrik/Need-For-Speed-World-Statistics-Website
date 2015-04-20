<?php 
	if(!isset($_GET["submit"])) 
	{
?>
<table style="text-align:center;background-color:white;width:80%;" align="center"  class="table table-striped">
	<form method="GET">
		<input type="hidden" name="page" value="server">
		<input type="hidden" name="g" value="0">
			<thead>  
				<tr>
					<caption style="text-align:center;background-color:white;"><b>NFS - World Server Statusy</b></caption>
				</tr>
			</thead> 
			<tbody> 
				<tr>
					<th>Server :  </th>
					<td colspan='2'>
						<select name="s" class="span2">
							<option value="none">Vyber server</option>
							<option value="APEX">APEX</option>
							<option value="CHICANE">CHICANE</option>
							<option value="BOTH">OBA</option>
						</select>
					</td>
				</tr>
				<tr>
					<th>Pozadí :  </th>
					<td colspan='2'>
						<select name="bg" class="span2">
							<option value="none">Vyber pozadí
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="0">Random</option>
						</select>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="submit" name="submit" value="Odeslat" class="btn btn-primary">
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
?>

	<script type="text/javascript">
		function SelectAll(id)
		{
			document.getElementById(id).focus();
			document.getElementById(id).select();
		}
	</script>
	<table align='center' style="text-align:center;background-color:white;width:80%;" align="center" class="table table-striped">
		<tr>
			<td>
				<button class="btn" type="submit" onclick="javascript:window.location='?page=server'">
					<i class="icon-backward"></i> Zpìt
				</button>
			</td>
			<th align='center' style='text-align:center;'>
				<?php if($_GET["s"] == "BOTH")$server = " Status Serverù";else $server = $_GET["s"]." status serveru";?>
				<?php echo $server;?>
			</th>
		</tr>
		<tr>
			<td colspan='2' style='text-align:center;'>
				<img ondragstart='return false;' src='http://<?php echo $_SERVER["SERVER_NAME"];?>/generator.php?g=0&s=<?php echo $_GET["s"];?>&bg=<?php echo $_GET["bg"];?>'>
			</td>
		</tr>
		<tr>
			<td style='text-align:center;'>
				Direct :
			</td>
			<td colspan='2' style='text-align:center;'>
				<textarea id="direct" onClick="SelectAll('direct');" style='resize:none' rows='2' cols='90' readonly>http://<?php echo $_SERVER["SERVER_NAME"];?>/generator.php?g=0&s=<?php echo $_GET["s"];?>&bg=<?php echo $_GET["bg"];?></textarea>
			</td>
		</tr>
		<tr>
			<td style='text-align:center;'>
				HTML :
			</td>
			<td colspan='2' style='text-align:center;'>
				<textarea id="html" onClick="SelectAll('html');" style='resize:none' rows='2' cols='90' readonly><img src='http://<?php echo $_SERVER["SERVER_NAME"];?>/generator.php?g=0&s=<?php echo $_GET["s"];?>&bg=<?php echo $_GET["bg"];?>'></textarea>
			</td>
		</tr>
		<tr>
			<td style='text-align:center;'>
				BBCODE :
			</td>
			<td colspan='2' style='text-align:center;'>
				<textarea id="bbc" onClick="SelectAll('bbc');" style='resize:none' rows='2' cols='90' readonly>[img]http://<?php echo $_SERVER["SERVER_NAME"];?>/generator.php?g=0&s=<?php echo $_GET["s"];?>&bg=<?php echo $_GET["bg"];?>[/img]</textarea>
			</td>
		</tr>
	</table>


<?php }?>
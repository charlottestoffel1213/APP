<html><table class="forum">
	<tr class= "header">
		<th class="case"> Case à cocher </th>
		<th > Username </th>
		<th > Type </th>
	</tr>
<form action = "index.php?cible=users&function=gerer_compte" method ="POST"/>
<?php 
while ($key=$requete2->fetch()) {
	if ($key['id_type_utilisateur'] == 1) {
		$type= "Principal";
	} elseif ($key['id_type_utilisateur'] == 2) {
		$type = "Secondaire";
	}
?>
	<tr> 
		<td class="check">
			<p>
			<input type="checkbox" name="a[]" value ="<?php echo $key['id'] ?>" /> 
			</p>
		</td>
		<td>
			<p>
			<?php echo $key['username'] ;?>
			</p>
		</td>
		<td>
			<p>
			<?php echo $type; ?> 
			</p>
		</td>
	</tr>
<?php  }?>
</table>
<input type="submit" name="secondaire" value="Modifier en tant que compte secondaire"/>
<input type="submit" name="principal" value="Modifier en tant que compte principal"/>
</form>
</html>
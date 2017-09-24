<?php require_once('common/header.php'); ?>

<h1>Member :: Rent :: Update</h1>
<p>&nbsp;</p>

<?php if ((isset($_POST['submit'])) and ($_POST['submit']=='Update Rental')) {
	mysql_query('update rental SET copy_id="'.$_POST['copy_id'].'", rental_date="'.$_POST['rental_date'].'",'.
			'due_date="'.$_POST['due_date'].'" WHERE id="'.$_POST['id'].'"') or die(mysql_error()); ?>
			
	<p>The rental has been updated.</p>
	
<?php } else { 
	$result = mysql_query('SELECT * FROM rental WHERE id = "'.$_POST['id'].'"') or die(mysql_error());
	$row = mysql_fetch_assoc($result); ?>

	<p>Use the form below to update the rental.</p>
	<p>&nbsp;</p>
	
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<table>
			<tr> 
				<td>Copy ID :</td>
				<td><input name="copy_id" type="text" value="<?php echo $row['copy_id']; ?>" size="10" maxlength="5"></td>
			</tr>
			<tr> 
				<td>Rent Date :</td>
				<td><input name="rental_date" type="text" value="<?php echo $row['rental_date']; ?>" size="20" maxlength="10"></td>
			</tr>
			<tr> 
				<td>Due Date :</td>
				<td><input name="due_date" type="text" value="<?php echo $row['due_date']; ?>" size="20" maxlength="10"></td>
			</tr>
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			<tr> 
				<td><input type="hidden" name="id" value="<?php echo $row['id']; ?>"></td>
				<td><input type="submit" name="submit" value="Update Rental" class="button"></td>
			</tr>
		</table>
	</form>
	
<?php } ?>

<?php require_once('common/footer.php'); ?>
<?php require_once('common/functions.php'); ?>
<?php require_once('common/header.php'); ?>

<h1>Video :: Rent</h1>
<p>&nbsp;</p>
<?php if ((isset($_POST["submit"])) && ($_POST["submit"]=='Insert Record')) {
	mysql_query('INSERT INTO rental (member_id, copy_id, rental_date, due_date)
  			VALUES ("'.$_POST['member_id'].'","'.$_POST['copy_id'].'","'.$_POST['rental_date'].'",
			"'.$_POST['due_date'].'")') or die(mysql_error()); ?>

	<p>A rental has now been entered.</p>

<?php } else {
	$result = mysql_query('SELECT * FROM rental') or die(mysql_error());
	$row = mysql_fetch_assoc($result); ?>

	<p>Please enter the details below to rent a video.</p>
	<p>&nbsp;</p>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<table>
			<tr> 
				<td>&nbsp;</td>
				<td class="small">* Required</td>
			</tr>
			<tr> 
				<th class="har nowrap">Member ID :</th>
				<td><input type="text" name="member_id" value="" size="32" />*</td>
			</tr>
			<tr> 
				<th class="har nowrap">Copy ID :</th>
				<td><input type="text" name="copy_id" value="" size="32" />*</td>
			</tr>
			<tr> 
				<th class="har nowrap">Rental Date :</th>
				<td><input type="text" name="rental_date" value="" size="32" />* (yyyy-mm-dd)</td>
			</tr>
			<tr> 
				<th class="har nowrap">Return Date :</th>
				<td><input type="text" name="due_date" value="" size="32" />* (yyyy-mm-dd)</td>
			</tr>
			<tr> 
				<td colspan="2">&nbsp;</td>
			</tr>
			<tr> 
				<td><input name="receipt" type="hidden" id="receipt" value="<?php echo $row['id']; ?>" /></td>
				<td><input type="submit" name="submit" onclick="validate_form('member_id','','RisNum','copy_id','','RisNum','rental_date','','R','due_date','','R');return document.MM_returnValue" value="Insert Record" /></td>
			</tr>
		</table>
	</form>

<?php } ?>

<?php require_once('common/footer.php'); ?>
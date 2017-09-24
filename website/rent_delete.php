<?php require_once('common/functions.php'); ?>
<?php require_once('common/header.php'); ?>

<h1>Member :: RENT:: Remove</h1> 
<p>&nbsp;</p> 

<?php if ((isset($_POST['submit'])) and ($_POST['submit']=='Delete rental')) {
 	mysql_query('DELETE FROM rental WHERE receipt_id="'.$_GET['receipt_id'].'"') or die(mysql_error()); ?>
	
<p>Rental has been successfully removed.</p>

<?php } else { ?>

<p>Are you sure you wish to delete the rental listed below.</p> 
<p>&nbsp;</p> 

<table class="results"> 
	<tr> 
		<th>Member ID</th> 
		<th>Copy ID</th> 
		<th>Rent Date</th> 
		<th>Due Date</th> 
	</tr> 
	<?php $result = mysql_query('SELECT * FROM rental WHERE id="'.$_POST['id'].'"') or die(mysql_error());
		$row = mysql_fetch_assoc($result); ?> 
	<tr> 
		<td><?php echo $row['member_id']; ?></td> 
		<td><?php echo $row['copy_id']; ?></td> 
		<td><?php echo $row['rental_date']; ?></td> 
		<td><?php echo $row['due_date']; ?></td> 
	</tr> 
</table> 
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<input type="hidden" name="id" value="<?php echo $_POST['id']; ?>" /> 
	<input type="submit" name="Submit" value="Delete Rental" /> 
</form> 

<?php } ?>

<?php require_once('common/footer.php'); ?>
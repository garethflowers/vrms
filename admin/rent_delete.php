<?php
require_once('common/functions.php');

$result = mysql_query('select * from rental where id="'.$_POST['id'].'" limit 1') or die(mysql_error());
$row = mysql_fetch_assoc($result);

require_once('common/header.php');
?>

<h1>Member :: RENT:: Remove</h1>
<p>&nbsp;</p>
<p>Are you sure you wish to delete the rental listed below.</p>
<p>&nbsp;</p>
<table class="results">
	<tr> 
		<td>Member ID</td>
		<td>Copy ID</td>
		<td>Rent Date</td>
		<td>Due Date</td>
	</tr>
	<tr> 
		<td><?php echo $row['member_id']; ?></td>
		<td><?php echo $row['copy_id']; ?></td>
		<td><?php echo $row['rental_date']; ?></td>
		<td><?php echo $row['due_date']; ?></td>
	</tr>
</table>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
	<input type="submit" name="Submit" value="Remove Rental" class="button">
</form>

<?php require_once('common/footer.php'); ?>
<?php
// include functions
require_once('common/functions.php');

if ((isset($_POST['submit'])) and ($_POST['submit']=='Delete Member')) {
	mysql_query('DELETE FROM member WHERE id="'.$_POST['id'].'"') or die(mysql_error());
} else {
	$result = mysql_query('SELECT * FROM member WHERE id="'.$_POST['id'].'"') or die(mysql_error());
	$row = mysql_fetch_assoc($result);
}
?>
<?php require_once('common/header.php'); ?>

<h1>Member :: Delete</h1>
<p>&nbsp;</p>

<?php if ((isset($_POST['submit'])) and ($_POST['submit']=='Delete Member')) { ?>
	<p>Member has been successfully removed.</p>
<?php } else { ?>
	<p>Are you sure you wish to delete the member listed below.</p>
	<p>&nbsp;</p>
	
	<table class="results">
	  <tr> 
		<th>ID</th>
		<th>Title</th>
		<th>Last Name</th>
		<th>First Name</th>
		<th>House</th>
		<th>Street</th>
		<th>Area</th>
		<th>Town</th>
		<th>Postcode</th>
		<th>Tel</th>
		<th>Password</th>
	  </tr>
	  <tr> 
		<td><?php echo $row['id']; ?></td>
		<td><?php echo $row['title']; ?></td>
		<td><?php echo $row['last_name']; ?></td>
		<td><?php echo $row['first_name']; ?></td>
		<td><?php echo $row['house']; ?></td>
		<td><?php echo $row['street']; ?></td>
		<td><?php echo $row['area']; ?></td>
		<td><?php echo $row['town']; ?></td>
		<td><?php echo $row['postcode']; ?></td>
		<td><?php echo $row['tel']; ?></td>
		<td><?php echo $row['password']; ?></td>
	  </tr>
	</table>
	<br />
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    	<input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
		<input type="submit" name="submit" value="Delete Member" class="button" />
	</form>
<?php } ?>

<?php require_once('common/footer.php'); ?>

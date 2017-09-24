<?php require_once('common/header.php'); ?>

<h1>Member :: Rent :: View</h1>

<p>&nbsp;</p>

<form action="/rent_add.php" method="post">
	<input name="submit" type="submit" value="New Rental" />
</form>

<p>&nbsp;</p>

<table class="results">
	<tr> 
		<th colspan="2">&nbsp;</th>
		<th>Receipt ID</th>
		<th>Member ID</th>
		<th>Copy ID</th>
		<th>Rent Date</th>
		<th>Due Date</th>
	</tr>
	<?php $result = mysql_query('SELECT * FROM rental ORDER BY rental_date DESC') or die(mysql_error());
		while ($row = mysql_fetch_assoc($result)) { ?>
	<tr> 
		<td>
			<form action="/rent_update.php" method="post">
				<input name="id" type="hidden" value="<?php echo $row['id']; ?>" />
				<input name="submit" type="submit" value="Update" />
			</form>
		</td>
		<td>
			<form action="/rent_delete.php" method="post">
				<input name="id" type="hidden" value="<?php echo $row['id']; ?>" />
				<input name="submit" type="submit" value="Delete" />
			</form>
		</td>
		<td><?php echo $row['id']; ?></td>
		<td><?php echo $row['member_id']; ?></td>
		<td><?php echo $row['copy_id']; ?></td>
		<td><?php echo $row['rental_date']; ?></td>
		<td><?php echo $row['due_date']; ?></td>
	</tr>
	<?php }
	if (mysql_num_rows($result)==0) { ?>
    <tr>
    	<td colspan="7" class="hac">No Rentals Found</td>
    </tr>
    <?php } ?>
</table>

<?php require_once('common/footer.php'); ?>
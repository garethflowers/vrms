<?php require_once('common/header.php'); ?>

<h1>Member :: Search</h1>

<p>&nbsp;</p>

<?php if ((isset($_POST['submit'])) and ($_POST['submit']=='Search Members')) {
	if (empty($_POST['title'])) $_POST['title'] = '%';
	if (empty($_POST['last_name'])) $_POST['last_name'] = '%';
	if (empty($_POST['first_name'])) $_POST['first_name'] = '%';
	if (empty($_POST['house'])) $_POST['house'] = '%';
	if (empty($_POST['street'])) $_POST['street'] = '%';
	if (empty($_POST['area'])) $_POST['area'] = '%';
	if (empty($_POST['town'])) $_POST['town'] = '%';
	if (empty($_POST['postcode'])) $_POST['postcode'] = '%';
	if (empty($_POST['tel'])) $_POST['tel'] = '%';
	
	$result = mysql_query('SELECT * FROM member
			WHERE title LIKE "'.$_POST['title'].'"
			AND last_name LIKE "'.$_POST['last_name'].'"
			AND first_name LIKE "'.$_POST['first_name'].'"
			AND house LIKE "'.$_POST['house'].'"
			AND street LIKE "'.$_POST['street'].'"
			AND area LIKE "'.$_POST['area'].'"
			AND town LIKE "'.$_POST['town'].'"
			AND postcode LIKE "'.$_POST['postcode'].'"
			AND tel LIKE "'.$_POST['tel'].'"') or die(mysql_error()); ?>
	
	<p>Search results. Click on ID number to update the information.</p>
	<p>&nbsp;</p>
	
	<table class="results">
		<tr> 
			<th colspan="2">&nbsp;</th>
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
		<?php while ($row = mysql_fetch_assoc($result)) { ?>
		<tr> 
			<td class="hac">
                <form method="post" action="/member_update.php">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
                    <input type="submit" name="submit" value="Update" class="button" />
                </form>
			</td>
            <td class="hac">
                <form method="post" action="/member_delete.php">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
                    <input type="submit" name="submit" value="Delete" class="button" />
                </form>
			</td>
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
		<?php } 
		if (mysql_num_rows($result)<1) { ?>
		<tr>
			<td colspan="13" class="hac">No Results Found</td>
		</tr>
		<?php } ?>
	</table>
	
<?php } else { ?>
	
	<p>Search for a member by various criteria. Refine the search by increasing the 
	number of criterion. Search words are NOT case sensitive. To display all members 
	supply no search criteria. </p>
	
	<p>&nbsp;</p>
	
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<table>
			<tr> 
				<th>Title :</th>
				<td><select name="title" id="title">
					<option value=""></option>
					<option value="Mr">Mr</option>
					<option value="Mrs">Mrs</option>
					<option value="Miss">Miss</option>
					<option value="Ms.">Ms.</option>
				</select></td>
			</tr>
			<tr> 
				<th>Last Name :</th>
				<td><input type="text" name="last_name" maxlength="50" size="50" value="" /></td>
			</tr>
			<tr> 
				<th>First Name :</th>
				<td><input type="text" name="first_name" maxlength="50" size="50" value="" /></td>
			</tr>
			<tr> 
				<th>House :</th>
				<td><input type="text" name="house" maxlength="25" size="30" value="" /></td>
			</tr>
			<tr> 
				<th>Street :</th>
				<td><input type="text" name="street" maxlength="50" size="50" value="" /></td>
			</tr>
			<tr> 
				<th>Area :</th>
				<td><input type="text" name="area" maxlength="50" size="50" value="" /></td>
			</tr>
			<tr> 
				<th>Town :</th>
				<td><input type="text" name="town" maxlength="50" size="50" value="" /></td>
			</tr>
			<tr> 
				<th>Postcode :</th>
				<td><input type="text" name="postcode" maxlength="10" size="20" value="" /></td>
			</tr>
			<tr> 
				<th>Telephone :</th>
				<td><input type="text" name="tel" maxlength="15" size="30" value="" /></td>
			</tr>
			<tr> 
				<th>Password :</th>
				<td><input type="text" name="password" maxlength="15" size="30" value="" /></td>
			</tr>
			<tr> 
				<td colspan="2">&nbsp;</td>
			</tr>
			<tr> 
				<td>&nbsp;</td>
				<td><input name="submit" type="submit" value="Search Members" class="button" /></td>
			</tr>
		</table>
	</form>
	
<?php } ?>

<?php require_once('common/footer.php'); ?>
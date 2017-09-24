<?php require_once('common/functions.php'); ?>
<?php require_once('common/header.php'); ?>

<h1>Member :: Update</h1>

<p>&nbsp;</p>

<?php if ((isset($_POST['submit'])) and ($_POST['submit']=='Update Record')) {
	mysql_query('UPDATE member SET title="'.$_POST['title'].'", last_name="'.$_POST['last_name'].'",
		first_name="'.$_POST['first_name'].'", house="'.$_POST['house'].'", street="'.$_POST['street'].'",
		area="'.$_POST['area'].'", town="'.$_POST['town'].'", postcode="'.$_POST['postcode'].'", tel="'.$_POST['tel'].'",
		password="'.$_POST['password'].'" WHERE id="'.$_POST['id'].'"') or die(mysql_error()); ?>
  
	<p>The members details have now been upated.</p>
	
<?php } else { 
	$result = mysql_query('SELECT * FROM member WHERE id ="'.$_POST['id'].'"') or die(mysql_error());
	$row = mysql_fetch_assoc($result); ?>

	<p>Update the fields using the form below</p>
	<p>&nbsp;</p>
		
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<table>
			<tr>
				<td>&nbsp;</td>
				<td><font size="1">* required</font></td>
			</tr>
			<tr> 
				<th class="har nowrap">Title ::</th>
				<td>
					<select name="title">
						<option value="Mr" <?php if ($row['title']=='Mr') { echo "SELECTED"; } ?>>Mr</option>
						<option value="Mrs" <?php if ($row['title']=='Mrs') { echo "SELECTED"; } ?>>Mrs</option>
						<option value="Miss" <?php if ($row['title']=='Miss') { echo "SELECTED"; } ?>>Miss</option>
						<option value="Ms." <?php if ($row['title']=='Ms.') { echo "SELECTED"; } ?>>Ms.</option>
					</select>
				</td>
			</tr>
			<tr> 
				<th class="har nowrap">Last Name ::</th>
				<td><input name="last_name" type="text" value="<?php echo $row['last_name']; ?>" size="50" maxlength="50">*</td>
			</tr>
			<tr> 
				<th class="har nowrap">First Name ::</th>
				<td><input name="first_name" type="text" value="<?php echo $row['first_name']; ?>" size="50" maxlength="50">*</td>
			</tr>
			<tr> 
				<th class="har nowrap">House ::</th>
				<td><input name="house" type="text" value="<?php echo $row['house']; ?>" size="30" maxlength="25">*</td>
			</tr>
			<tr> 
				<th class="har nowrap">Street ::</th>
				<td><input name="street" type="text" value="<?php echo $row['street']; ?>" size="50" maxlength="50">*</td>
			</tr>
			<tr> 
				<th class="har nowrap">Area ::</th>
				<td><input name="area" type="text" value="<?php echo $row['area']; ?>" size="50" maxlength="50"></td>
			</tr>
			<tr> 
				<th class="har nowrap">Town ::</th>
					<td><input name="town" type="text" value="<?php echo $row['town']; ?>" size="50" maxlength="50">*</td>
			</tr>
			<tr> 
				<th class="har nowrap">Postcode ::</th
				><td> <input name="postcode" type="text" value="<?php echo $row['postcode']; ?>" size="20" maxlength="10">*</td>
			</tr>
			<tr> 
				<th class="har nowrap">Tel ::</th>
				<td> <input name="tel" type="text" value="<?php echo $row['tel']; ?>" size="30" maxlength="15"></td>
			</tr>
			<tr> 
				<th class="har nowrap">Password ::</th>
				<td><input name="password" type="text" value="<?php echo $row['password']; ?>" size="30" maxlength="15">*</td>
			</tr>
			<tr> 
				<td colspan="2">&nbsp;</td>
			</tr>
			<tr> 
				<td><input type="hidden" name="id" value="<?php echo $row['id']; ?>"></td>
				<td><input type="submit" name="submit" onclick="validate_form('last_name','','R','first_name','','R','house','','R','street','','R','town','','R','postcode','','R','password','','R');return document.MM_returnValue" value="Update Record"></td>
			</tr>
			</table>
	</form>
	
<?php } ?>

<?php require_once('common/footer.php'); ?>
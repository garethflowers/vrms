<?php
// include functions
require_once('common/functions.php');

if ((isset($_POST['submit'])) and ($_POST['submit']=='Create Record')) {
	$sql = 'INSERT INTO member (title, last_name, first_name, house, street, area, town, postcode, tel, password)
			VALUES ("'.$_POST['title'].'","'.$_POST['last_name'].'","'.$_POST['first_name'].'","'.$_POST['house'].'",
				"'.$_POST['street'].'","'.$_POST['area'].'","'.$_POST['town'].'","'.$_POST['postcode'].'","'.$_POST['tel'].'",
				"'.$_POST['password'].'")';
	mysql_query($sql) or die(mysql_error());
}
?>
<?php require_once('common/header.php'); ?>

<h1>Member :: Create</h1>
<p>&nbsp;</p>

<?php if ((isset($_POST['submit'])) and ($_POST['submit']=='Create Record')) { ?>
	<p>A new member has now been created.</p>
<?php } else { ?>
	<p>Register a new member. All fields denoted by a star are mandatory.</p>
	<p>&nbsp;</p>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	  <table>
		<tr>
		  <td>&nbsp;</td>
		  <td class="small">* Required</td>
		</tr>
		<tr> 
		  <th>Title :</th>
		  <td>
			<select name="title">
				<option value="Mr">Mr</option>
				<option value="Mrs">Mrs</option>
				<option value="Miss">Miss</option>
				<option value="Ms.">Ms.</option>
			</select>*</td>
		</tr>
		<tr> 
		  <th>Last Name :</th>
		  <td><input name="last_name" type="text" value="" size="50" maxlength="50">*</td>
		</tr>
		<tr> 
		  <th>First Name :</strong></th>
		  <td><input name="first_name" type="text" value="" size="50" maxlength="50">*</td>
		</tr>
		<tr> 
		  <th>House :</th>
		  <td><input name="house" type="text" value="" size="30" maxlength="25">*</td>
		</tr>
		<tr> 
		  <th>Street :</th>
		  <td><input name="street" type="text" value="" size="50" maxlength="50">*</td>
		</tr>
		<tr> 
		  <th>Area :</th>
		  <td><input name="area" type="text" value="" size="50" maxlength="50"></td>
		</tr>
		<tr> 
		  <th>Town :</th>
		  <td><input name="town" type="text" value="" size="50" maxlength="50">*</td>
		</tr>
		<tr> 
		  <th>Postcode :</th>
		  <td><input name="postcode" type="text" value="" size="20" maxlength="10">*</td>
		</tr>
		<tr> 
		  <th>Tel :</th>
		  <td><input name="tel" type="text" value="" size="30" maxlength="15"></td>
		</tr>
		<tr> 
		  <th>Password :</th>
		  <td><input name="password" type="password" value="" size="30" maxlength="10">*</td>
		</tr>
		<tr> 
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		</tr>
		<tr> 
		  <td>&nbsp;</td>
		  <td>
			<input name="submit" type="submit" onClick="validate_form('last_name','','R','first_name','','R','house','','R','street','','R','town','','R','postcode','','R','password','','R');return document.MM_returnValue" value="Create Record" class="button" />
			</td>
		</tr>
	  </table>
	</form>
<?php } ?>

<?php require_once('common/footer.php'); ?>
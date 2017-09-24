<?php
// include functions
require_once('common/functions.php');

if ((isset($_POST['submit'])) and ($_POST['submit']=='Update Record')) {
	$sql = 'UPDATE video SET title="'.$_POST['title'].'", rating="'.$_POST['rating'].'", director="'.$_POST['director'].'",
		actors="'.$_POST['actors'].'", genre="'.$_POST['genre'].'", year="'.$_POST['year'].'", length="'.$_POST['length'].'",
		widescreen="'.$_POST['widescreen'].'", type="'.$_POST['type'].'", value="'.$_POST['value'].'" WHERE id="'.$_POST['id'].'"';
	mysql_query($sql) or die(mysql_error());
}

$sql = mysql_query('SELECT * FROM video WHERE id="'.$_POST['id'].'"') or die(mysql_error());
$row = mysql_fetch_assoc($sql);
?>
<?php require_once('common/header.php'); ?>

<h1>Video :: Update</h1>
<p>&nbsp;</p>

<?php if ((isset($_POST['submit'])) and ($_POST['submit']=='Update Record')) { ?>
	<p>The video has been successfully updated.</p>
<?php } else { ?>
	<p>Update the fields using the form below.</p>
	<p>&nbsp;</p>
		
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	  <table>
		<tr> 
		  <td>&nbsp;</td>
		  <td class="small">* require_onced</td>
		</tr>
		<tr> 
		  <td>Title :</td>
		  <td><input name="title" type="text" value="<?php echo $row['title']; ?>" size="50" maxlength="100" />
		  *</td>
		</tr>
		<tr> 
		  <td>Rating :</td>
		  <td><input type="text" name="rating" value="<?php echo $row['rating']; ?>" size="32" />
		  *</td>
		</tr>
		<tr> 
		  <td>Director :</td>
		  <td><input name="director" type="text" value="<?php echo $row['director']; ?>" size="30" maxlength="25" /></td>
		</tr>
		<tr> 
		  <td>Actors :</td>
		  <td><input name="actors" type="text" value="<?php echo $row['actors']; ?>" size="50" maxlength="100" /></td>
		</tr>
		<tr> 
		  <td>Genre :</td>
		  <td><input type="text" name="genre" value="<?php echo $row['genre']; ?>" size="32" />
			*</td>
		</tr>
		<tr> 
		  <td>Year :</td>
		  <td><input name="year" type="text" value="<?php echo $row['year']; ?>" size="10" maxlength="4" /></td>
		</tr>
		<tr> 
		  <td>Widescreen :</td>
		  <td><input name="widescreen" type="text" value="<?php echo $row['widescreen']; ?>" size="10" maxlength="3" />
			*</td>
		</tr>
		<tr> 
		  <td>Type :</td>
		  <td><input name="type" type="text" value="<?php echo $row['type']; ?>" size="10" maxlength="5" />
			*</td>
		</tr>
		<tr> 
		  <td>Length :</td>
		  <td><input name="length" type="text" value="<?php echo $row['length']; ?>" size="10" maxlength="3" /></td>
		</tr>
		<tr> 
		  <td>Value :</td>
		  <td><input name="value" type="text" value="<?php echo $row['value']; ?>" size="10" maxlength="4" />
		  *</td>
		</tr>
		<tr> 
		  <td colspan="2">&nbsp;</td>
		</tr>
		<tr> 
		  <td><input type="hidden" name="id" value="<?php echo $row['id']; ?>" /></td>
		  <td><input type="submit" onclick="validate_form('title','','R','rating','','R','genre','','R','year','','NinRange1000:9999','widescreen','','R','type','','R','length','','NinRange1:999','value','','RinRange1:999');return document.MM_returnValue" value="Update Record" class="button" /></td>
		</tr>
	  </table>
	  
	</form>
<?php } ?>

<?php require_once('common/footer.php'); ?>
<?php require_once('common/header.php'); ?>

<h1>Video :: Create</h1>
<p>&nbsp;</p>

<?php if ((isset($_POST['submit'])) and ($_POST['submit']=='Create Record')) {
	mysql_query('INSERT INTO video (title, rating, director, actors, genre, `year`, length, widescreen, type, `value`) VALUES
  			("'.$_POST['title'].'", "'.$_POST['rating'].'", "'.$_POST['director'].'", "'.$_POST['actor'].'", "'.$_POST['genre'].'",
			"'.$_POST['year'].'", "'.$_POST['length'].'", "'.$_POST['widescreen'].'", "'.$_POST['type'].'", "'.$_POST['value'].'")')
			 or die(mysql_error()); ?>
	<p>A new video has now been created.</p>
<?php } else { ?>
	<p>Fill in the form below to create a new record.</p>
	<p>&nbsp;</p>
	
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<table>
			<tr> 
				<td>&nbsp;</td>
				<td class="small">* Required</td>
			</tr>
			<tr> 
				<th>Title :</th>
				<td><input name="title" type="text" size="50" maxlength="100" />
			  *</td>
			</tr>
			<tr> 
				<th>Rating :</th>
				<td><select name="rating">
			    <option value="U">U</option>
					<option value="PG">PG</option>
					<option value="12">12</option>
					<option value="15">15</option>
					<option value="18">18</option>
					<option value="XXX">XXX</option>
					<option value="UNRATED" selected="selected">UNRATED</option>
				</select>*</td>
			</tr>
			<tr> 
				<th>Director :</th>
				<td><input name="director" type="text" size="30" maxlength="25" /></td>
			</tr>
			<tr> 
				<th>Actors :</th>
				<td><input name="actors" type="text" id="actors" size="50" maxlength="100" /></td>
			</tr>
			<tr> 
				<th>Genre :</th>
				<td><select name="genre" id="genre">
			    <option value="Comedy" selected="selected">Comedy</option>
					<option value="Action">Action</option>
					<option value="Horror">Horror</option>
					<option value="Thriller">Thriller</option>
					<option value="Drama">Drama</option>
					<option value="Childrens">Childrens</option>
				</select>*</td>
			</tr>
			<tr> 
				<th>Year :</th>
				<td><input name="year" type="text" size="10" maxlength="4" /></td>
			</tr>
			<tr> 
			<th>Widescreen :</th>
				<td><input name="widescreen" type="radio" value="Yes" checked="checked" />
				Yes<br />
				<input type="radio" name="widescreen" value="No" />
			  No</td>
			</tr>
			<tr> 
				<th>Type :</th>
				<td><input name="type" type="radio" value="DVD" checked="checked" />
				DVD<br />
				<input type="radio" name="type" value="Video" />
			  Video</td>
			</tr>
			<tr> 
				<th>Length :</th>
				<td><input name="length" type="text" id="length" size="10" maxlength="3" />
			  (in mins)</td>
			</tr>
			<tr> 
				<th>Value :</th>
				<td><input name="value" type="text" id="value" size="10" maxlength="4" />
			  (in pence)*</td>
			</tr>
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			<tr> 
				<td>&nbsp;</td>
				<td><input name="submit" type="submit" onclick="validate_form('title','','R','year','','NinRange1000:9999','length','','NisNum','value','','RisNum');return document.MM_returnValue" value="Create Record" class="button" /></td>
			</tr>
		</table>
	</form>
<?php } ?>

<?php require_once('common/header.php'); ?>
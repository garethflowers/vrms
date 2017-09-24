<?php require_once('common/functions.php'); ?>
<?php require_once('common/header.php'); ?>

<h1>Video :: Search</h1>

<p>&nbsp;</p>

<?php if (isset($_POST['submit']) and $_POST['submit']=='Search') {
	if (empty($_POST['rating'])) $_POST['rating'] = '%';
	if (empty($_POST['title'])) $_POST['title'] = '%';
	if (empty($_POST['director'])) $_POST['director'] = '%';
	if (empty($_POST['actors'])) $_POST['actors'] = '%';
	if (empty($_POST['genre'])) $_POST['genre'] = '%';
	if (empty($_POST['year'])) $_POST['year'] = '%';
	if (empty($_POST['type'])) $_POST['type'] = '%';
	if (empty($_POST['widescreen'])) $_POST['widescreen'] = '%';
	if (empty($_POST['length'])) $_POST['length'] = '%';
	if (empty($_POST['value'])) $_POST['value'] = '%';
	
	$result = mysql_query('SELECT * FROM video
			WHERE title LIKE "'.$_POST['title'].'"
			AND director LIKE "'.$_POST['director'].'"
			AND actors LIKE "'.$_POST['actors'].'"
			AND genre LIKE "'.$_POST['genre'].'"
			AND year LIKE "'.$_POST['year'].'"
			AND type LIKE "'.$_POST['type'].'"
			AND widescreen LIKE "'.$_POST['widescreen'].'"
			AND length LIKE "'.$_POST['length'].'"
			AND value LIKE "'.$_POST['value'].'"
			AND rating LIKE "'.$_POST['rating'].'"') or die(mysql_error()); ?>

	<p>Search results. Click on ID number to update the information.</p>
	<p>&nbsp;</p>
	
	<table class="results">
		<tr> 
			<th>ID</th>
			<th>Title</th>
			<th>Rating</th>
			<th>Director</th>
			<th>Actor(s)</th>
			<th>Genre</th>
			<th>Year</th>
			<th>Type</th>
			<th>Widescreen</th>
			<th>Length</th>
			<th>Value</th>
		</tr>
		<?php while ($row = mysql_fetch_assoc($result)) { ?>
		<tr> 
			<td><?php echo $row['id']; ?></td>
			<td><?php echo $row['title']; ?></td>
			<td><?php echo $row['rating']; ?></td>
			<td><?php echo $row['director']; ?></td>
			<td><?php echo $row['actors']; ?></td>
			<td><?php echo $row['genre']; ?></td>
			<td><?php echo $row['year']; ?></td>
			<td><?php echo $row['type']; ?></td>
			<td><?php echo $row['widescreen']; ?></td>
			<td><?php echo $row['length']; ?></td>
			<td><?php echo $row['value']; ?></td>
		</tr>
		<?php }
		if (mysql_num_rows($result)==0) { ?>
		<tr>
			<td class="hac" colspan="11">No Results</td>
		</tr>
		<?php } ?>
	</table>

<?php } else { ?>

	<p>Chooses Search fields from below:</p>
	
	<p>&nbsp;</p>
	
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<table>
			<tr> 
				<th class="vat har">Title :</th>
				<td><input name="title" type="text" size="50" maxlength="100" /></td>
			</tr>
			<tr> 
				<th class="vat har">Rating :</th>
				<td><select name="rating">
					<option vasue="" selected="selected"></option>
					<option value="U">U</option>
					<option value="PG">PG</option>
					<option value="12">12</option>
					<option value="15">15</option>
					<option value="18">18</option>
					<option value="XXX">XXX</option>
					<option value="UNRATED">UNRATED</option>
					</select></td>
			</tr>
			<tr> 
				<th class="vat har">Director :</th>
				<td><input name="director" type="text" size="30" maxlength="25" /></td>
			</tr>
			<tr> 
				<th class="vat har">Actor :</th>
				<td><input name="actors" type="text" id="actors" size="50" maxlength="100" /></td>
			</tr>
			<tr> 
				<th class="vat har">Genre :</th>
				<td><select name="genre" id="genre">
					<option value="" selected="selected"></option>
					<option value="Comedy">Comedy</option>
					<option value="Action">Action</option>
					<option value="Horror">Horror</option>
					<option value="Thriller">Thriller</option>
					<option value="Drama">Drama</option>
					<option value="Childrens">Childrens</option>
					</select></td>
			</tr>
			<tr> 
				<th class="vat har">Year :</th>
				<td><input name="year" type="text"size="10" maxlength="4" /></td>
			</tr>
			<tr> 
				<th class="vat har">Widescreen :</th>
				<td><input name="widescreen" type="radio" value="" checked="checked" />No preference<br />
				<input name="widescreen" type="radio" value="Yes" />Yes<br />
				<input type="radio" name="widescreen" value="No" />No</td>
			</tr>
			<tr> 
				<th class="vat har">Type :</th>
				<td><input name="type" type="radio" value="" checked="checked" />Any format<br />
				<input name="type" type="radio" value="DVD" />DVD<br />
				<input type="radio" name="type" value="Video" />Video</td>
			</tr>
			<tr> 
				<th class="vat har">Length :</th>
				<td><input name="length" type="text" id="length" size="10" maxlength="3" />(in mins)</td>
			</tr>
			<tr> 
				<th class="vat har">Value :</th>
				<td><input name="value" type="text" id="value" size="10" maxlength="4" />(in pence)</td>
			</tr>
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			<tr> 
				<td>&nbsp;</td>
				<td><input type="submit" name="submit" onclick="validate_form('year','','NinRange1000:9999','length','','NisNum','value','','NisNum');return document.MM_returnValue"  value="Search" /></td>
			</tr>
		</table>
	</form>

<?php } ?>

<?php require_once('common/footer.php'); ?>
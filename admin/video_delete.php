<?php
// include functions
require_once('common/functions.php');

if ((isset($_POST['submit'])) and ($_POST['submit']=='Delete Video')) {
	mysql_query('DELETE FROM project_phv_video WHERE id="'.$_POST['id'].'"') or die(mysql_error());
} else {
	$query = mysql_query('SELECT * FROM video WHERE id="'.$_POST['id'].'"') or die(mysql_error());
	$result = mysql_fetch_assoc($query);
}
?>
<?php require_once('common/header.php'); ?>

<h1>Video :: Delete</h1>
<p>&nbsp;</p>

<?php if ((isset($_POST['submit'])) and ($_POST['submit']=='Delete Video')) { ?>
	<p>The video has been removed.</p>
<?php } else { ?>
	<p>Are you sure you wish to delete the video listed below.</p>
	<p>&nbsp;</p>
	
	<table>
	  <tr> 
		<td>ID</td>
		<td>Title</td>
		<td>Rating</td>
		<td>Director</td>
		<td>Actors</td>
		<td>Genre</td>
		<td>Year</td>
		<td>Length</td>
		<td>Widescreen</td>
		<td>Type</td>
		<td>Value</td>
	  </tr>
	  <tr> 
		<td><?php echo $row['id']; ?></td>
		<td><?php echo $row['title']; ?></td>
		<td><?php echo $row['rating']; ?></td>
		<td><?php echo $row['director']; ?></td>
		<td><?php echo $row['actors']; ?></td>
		<td><?php echo $row['genre']; ?></td>
		<td><?php echo $row['year']; ?></td>
		<td><?php echo $row['length']; ?></td>
		<td><?php echo $row['widescreen']; ?></td>
		<td><?php echo $row['type']; ?></td>
		<td><?php echo $row['value']; ?></td>
	  </tr>
	</table>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
		<input type="submit" name="submit" value="Delete Video"  class="button" />
	</form>
<?php } ?>

<?php require_once('common/footer.php'); ?>
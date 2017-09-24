<?php
// include functions
require_once('common/functions.php');

if ((isset($_POST["submit"])) && ($_POST["submit"] == "Update Record")) {
	$sql = 'UPDATE rental SET copy_id="'.$_POST['copy_id'].'", rental_date="'.$_POST['rental_date'].'", due_date="'.$_POST['due_date'].'" WHERE receipt_id="'.$_POST['receipt_id'].'"';
	mysql_query($sql, $db) or die(mysql_error());
}

$sql = 'SELECT * FROM rental WHERE receipt_id="'.$_GET['receipt_id'].'"';
$result = mysql_query($ql, $db) or die(mysql_error());
$date = mysql_fetch_assoc($result);

// page header
require_once('common/header.php');
?>
<h1>Member :: Rent :: Update</h1>
<p>&nbsp;</p>
<p>Use the form below to update the rental.</p>
<p>&nbsp;</p>

    
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  
  
  <table width="100%" align="center">
    
    <tr> 
      <th class="har nowrap">Copy ID ::</strong></td>
      <td> <input name="copy_id" type="text" value="<?php echo $row['copy_id']; ?>" size="10" maxlength="5"></td>
    </tr>
    <tr> 
      <th class="har nowrap">Rent Date ::</strong></td>
      <td> <input name="rental_date" type="text" value="<?php echo $row['rental_date']; ?>" size="20" maxlength="10"></td>
    </tr>
    <tr> 
      <th class="har nowrap">Due Date ::</strong></td>
      <td> <input name="due_date" type="text" value="<?php echo $row['due_date']; ?>" size="20" maxlength="10"></td>
    </tr>
    <tr>
      <td align="right" nowrap>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td width="20%" align="right" nowrap>&nbsp;</td>
      <td> <input type="submit" name="submit" value="Update Record"></td>
    </tr>
  </table>
  <input type="hidden" name="receipt_id" value="<?php echo $row['receipt_id']; ?>">  
</form>

<?php require_once('common/footer.php'); ?>
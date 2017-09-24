<?php
// include functions
require_once('common/functions.php');

$idin_rent_view = "0000";
if (isset($_GET['ID'])) {
  $idin_rent_view = (get_magic_quotes_gpc()) ? $_GET['ID'] : addslashes($_GET['ID']);
}
$passin_rent_view = "0000";
if (isset($_GET['Password'])) {
  $passin_rent_view = (get_magic_quotes_gpc()) ? $_GET['Password'] : addslashes($_GET['Password']);
}

$query_rent_view = sprintf("SELECT * FROM member, rental WHERE member.id = rental.member_id AND password = '%s' AND id = '%s' ORDER BY rental.rental_date DESC", $passin_rent_view,$idin_rent_view);
$rent_view = mysql_query($query_limit_rent_view, $db) or die(mysql_error());

if (isset($_GET['totalRows_rent_view'])) {
  $totalRows_rent_view = $_GET['totalRows_rent_view'];
} else {
  $all_rent_view = mysql_query($query_rent_view);
  $totalRows_rent_view = mysql_num_rows($all_rent_view);
}
$totalPages_rent_view = ceil($totalRows_rent_view/$maxRows_rent_view)-1;

// page header
require_once('common/header.php');
?>
<h1>MEMBER :: Rent :: View</h1>
<p>&nbsp;</p>
<table width="100" border="0">
  <tr>
    <td bgcolor="#0000FF"><div align="center"><a href="/rent_create.php">RENT</a></div></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>Welcome <strong><?php echo $row_rent_view['first_name'].' '.$row_rent_view['last_name'] ?></strong>.<br />
  Your rented videos are listed below - sorted by date.</p>
<p>&nbsp;</p>
<table border="1" cellspacing="2">
  <tr bgcolor="#999999"> 
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <th>Receipt ID</th>
    <th>Member ID</th>
    <th>Copy ID</th>
    <th>Rent Date</th>
    <th>Due Date</th>
  </tr>
  <?php while ($row_rent_view = mysql_fetch_assoc($rent_view)) { ?>
  <tr> 
    <td><strong><a href="/rent_update.php?receipt_id=<?php echo $row_rent_view['receipt_id']; ?>"><font color="#FF0000">UPDATE</font></a></strong></td>
    <td><strong><a href="/rent_delete.php?receipt_id=<?php echo $row_rent_view['receipt_id']; ?>"><font color="#FF0000">DELETE</font></a></strong></td>
    <td><?php echo $row_rent_view['receipt_id']; ?></td>
    <td><?php echo $row_rent_view['member_id']; ?></td>
    <td><?php echo $row_rent_view['copy_id']; ?></td>
    <td><?php echo $row_rent_view['rental_date']; ?></td>
    <td><?php echo $row_rent_view['due_date']; ?></td>
  </tr>
  <?php } ?>
</table>

<?php require_once('common/footer.php'); ?>
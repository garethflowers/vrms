<?php
// include functions
require_once('common/functions.php');
?>
<?php require_once('common/header.php'); ?>

<h1>Login</h1> 

<p>&nbsp;</p> 

<p>Please enter your id and password below.</p>
 
<p>&nbsp;</p> 

<form action="/rent_view.php" method="post" id="login"> 
	<table> 
		<tr> 
			<th>ID ::</th> 
			<td><input name="ID" type="text" id="ID" size="10" maxlength="5" /></td> 
		</tr> 
		<tr> 
			<th>Password ::</th> 
			<td><input name="Password" type="password" id="Password" size="20" maxlength="15" /></td> 
		</tr> 
		<tr> 
			<td colspan="2">&nbsp;</td>
		</tr> 
		<tr> 
			<td>&nbsp;</td> 
			<td><input name="Submit" type="submit" onclick="validate_form('ID','','RisNum','Password','','R');return document.MM_returnValue" value="Submit" /></td> 
		</tr> 
	</table> 
</form> 

<?php require_once('common/footer.php'); ?>
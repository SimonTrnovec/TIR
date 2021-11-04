<?php 
	include'assets/hlavicka.php';
	include'assets/menu.php';
	
?>
<?php
session_start();


if (!isset($_SESSION['meno']))
{
   unset($_SESSION['meno']);
   header('Location: ./prihlasenie.php');
}
/*if ($_SESSION['meno']['isLoggedIn'] === false)
{
    header('Location: ./prihlasenie.php');
}
*/

?>
<?php 
if(isset($_POST['clear-session']))
{ 
session_destroy();
}

?>
<H1><?php 
echo $_SESSION[("meno")];
?></h1>
<form action="index.php" method="POST">
    <input type="submit" class="btn btn-primary" name="clear-session" value="Odhlasiť sa">
</form>

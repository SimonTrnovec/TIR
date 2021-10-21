<?php 
	include'assets/hlavicka.php';
	include'assets/menu.php';
	
?>
<?php
session_start();


if (!isset($_SESSION['user']))
{
    $_SESSION['user'] = ['username' => null, 'isLoggedIn' => false, ];
}
if ($_SESSION['user']['isLoggedIn'] === false)
{
    header('Location: ./prihlasenie.php');
}


?>
<?php 
if(isset($_POST['clear-session']))
{ 
session_destroy();
}
?>
<form action="index.php" method="POST">
    <input type="submit" class="btn btn-primary" name="clear-session" value="Odhlasiť sa">
</form>

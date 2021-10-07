<?php 
	include'../../assets/hlavicka.php';
	include'../../assets/menu.php';
?>

<section class="container pt-4">
	<?php 

	$clanky = file('clanky.txt',FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
	foreach ($clanky as $clanok) {
		list($nadpis,$obrazok,$text) = explode('::',$clanok)
	 ?>
	<h1><?php echo $nadpis?></h1>
	<img src="images/<?php echo $obrazok?>">
	<img src="<?php //echo 'domov/images/'.$obrazok ?>">
	<p><?php echo $text?></p><br>

	<?php
	}
	?>
</section>

<?php 

	

 ?>

<?php 
	include'../../assets/paticka.php';
?>
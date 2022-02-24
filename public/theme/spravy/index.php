<?php 
date_default_timezone_set("Europe/Bratislava");
	include '../../assets/hlavicka.php';
	include '../../assets/menu.php';
	include '../../../includes/db.php';
?>
	<!--<section class="container pt-4">
 	<h2 class="text-center pt-2">Správy</h2>
 	<h4><?php echo date('j.n.Y H:i:s') ?></h4>
 	<?php
 		$clankyNazovSuboru = glob('*.txt');
 		foreach ($clankyNazovSuboru as $subor) {
 			$datum = strtotime(basename($subor,".txt"));
 			$datumStr = date('j.n.Y H:i', $datum);
 			$clanok = file($subor, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
 				?>
 				<div>
 					<br><h5><?php echo $clanok[0]?></h5>
 					<small>Publikované: <?php echo date('j.n.Y H:i', $datum) ?></small> <br><br>
 					<img src="images/<?php echo $clanok[1] ?>" alt="" width=150><br><br>
 					 	<?php
 							for ($i=2; $i < count($clanok); $i++) { 
 								echo '<p>' . $clanok[$i] . '</p>';
 							}
 						?>
 						<?php echo $clanok[2]?>
 					</p>
 					<br><br>
 				</div>
 		<?php
 		}
 		
 	?>
 </section>-->
 <section class="container pt-4">
 	<h2 class="text-center pt-2">Správy</h2>
 	<h4><?php echo date('j.n.Y H:i:s') ?></h4>
 	<?php
			$conn = new mysqli($servername, $username, $password, $dbname);

			if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
			}
			
			$sql = "SELECT * FROM spravy";
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
 				?>
 				<div>
 					<br><h5><?php echo $clanok[0]?></h5>
 					<small>Publikované: <?php echo date('j.n.Y H:i', $datum) ?></small> <br><br>
 					<img src="images/<?php echo $clanok[1] ?>" alt="" width=150><br><br>
 					 	<?php
 							for ($i=2; $i < count($clanok); $i++) { 
 								echo '<p>' . $clanok[$i] . '</p>';
 							}
 						?>
 						<?php echo $clanok[2]?>
 					</p>
 					<br><br>
 				</div>
 			<?php
					}
				} else {
				echo "0 results";
				}
				$conn->close();

 	?>
 </section>
<?php 
	include '../../assets/paticka.php'
?>

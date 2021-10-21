<?php 
	include'../../assets/hlavicka.php';
	include'../../assets/menu.php';
	include'../../assets/rozne.php';

	date_default_timezone_set("Europe/Bratislava");
	
	$chyba = "";
	$alert = "alert-danger";
	$meno = $sprava = "";

	if($_SERVER['REQUEST_METHOD'] == "POST"){

	

		if( empty($chyba) ){ 

			$suborPrispevky = fopen('prispevky.csv', 'a');

			$novyPrispevok[] = $_GET['pocet'] + 1; 
			$novyPrispevok[] = kontrola($_POST['meno']); 
			$novyPrispevok[] = kontrola($_POST['sprava']);
			$novyPrispevok[] = date('Y-m-d H:i:s', time() ); 

			fputcsv($suborPrispevky, $novyPrispevok, ';');
			$chyba .= "save";

		}else{

			$meno = kontrola($_POST['meno']);
			$sprava = kontrola($_POST['sprava']);
		}
		
	}
	//antispam
	$suborCaptcha = file('captcha.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
	//priprava
	for ($i=0; $i < count($suborCaptcha) ; $i+=2){

		$antiSpam[str_replace('odpoved: ','',$suborCaptcha[$i+1])] = str_replace('otazka: ','', $suborCaptcha[$i]);
	}
	//náhodný výber otázky
	$vybranyKluc = array_rand($antiSpam);
	//echo $vybranyKluc;

	//nacitanie csv
	$suborPrispevky = fopen("prispevky.csv", "r");

	while($prispevok = fgetcsv($suborPrispevky,1000,';')){
		$prispevky[] = $prispevok;
	}

	fclose($suborPrispevky);
	//obrátiť pole podľa aktuálnosti
	$prispevky = array_reverse($prispevky);

	if( !empty($chyba) ){
		{

			$alert = "alert-success";
			$chyba = "Tvoj príspevok bol uložený";
			$message = "Ďakujeme!";
		}
		?>
		<div class="alert <?php echo $alert ?> alert-dismissible fade show" role="alert">
			<strong>Skvelé!</strong> <?php echo $chyba; ?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
	 	</div>
<?php
	}

?>
<section>
	<h1 class="py-3 text-center">Blog</h1>

	<div class="container">
		<form class="was-validated" action="?pocet=<?php echo count($prispevky) ?>" method="post"> 
			<div class="form-group"> 
				<label for="i1">Meno</label> 
					<input type="text" name="meno" class="form-control" pattern="\S.{4,20}" placeholder="Autor správy" value="<?php echo $meno ?>" required > 
				<div class="invalid-feedback">
					Prosím vyplň túto položku!
				</div>
			</div> 

			<div class="form-group"> 
				<label for="i2">Správa</label> 
				<textarea name="sprava" class="form-control" rows="5" placeholder="Text správy" required><?php echo $sprava ?></textarea> 
				<div class="invalid-feedback">
					Prosím vyplň text správy!
				</div>
			</div> 

			<div>
				<label for="i3"><sma11><b>Antispam: </b><?php echo $antiSpam[$vybranyKluc] ?></sma11></label> 
			</div>	

			<div class="row d-flex"> 
				<div class="form-group col-7"> 		
					<input type="text" name="odpoved" class="form-control" placeholder="Odpoveď na otázku" required pattern="<?php echo $vybranyKluc?>"> 
					<div class="invalid-feedback">
						Prosím odpovedaj správne na otázku!
					</div>
				</div> 


				<div class="form-group col-5 d-flex justify-content-end align-self-baseline"> 
					<input type="reset" value="Reset" class="btn btn-outline-primary mr-3">
					<input type="submit" value="Odoslať" class="btn btn-primary">
				</div>
			</div> 		

			<input type="hidden" name="spravnaOdpoved" value="<?php echo trim($vybranyKluc) ?>">

		</form> 
	</div>
	<hr>
	<div class="container">
		<?php 
			foreach ($prispevky as $prispevok) {
				$datum = strtotime($prispevok[3]);
				$datumTxt = date('j. ', $datum) .$mesiace[date('n', $datum) - 1]. date(' Y H:i', $datum); 
			
		 ?>	
			<h4><?php echo $prispevok[1] ?></h4>
			<small><i> Odoslane: <?php echo $datumTxt ?></i></small>
			<p>
				<?php echo prelozBBCode(nl2br($prispevok[2])) ?>
			</p>
			<hr>
		<?php 
			}
		 ?>
	</div>
</section>

<?php 
include'../../assets/paticka.php';
?>

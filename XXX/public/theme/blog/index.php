<?php 
	include'../../assets/hlavicka.php';
	include'../../assets/menu.php';
	include'../../assets/rozne.php';
	include'../../../includes/db.php';

	date_default_timezone_set("Europe/Bratislava");
	$success = '';
	$chyba = "";
	$alert = "alert-danger";
	$meno = $sprava = "";

	if($_SERVER['REQUEST_METHOD'] == "POST"){

            $sql = "INSERT INTO prispevky (meno, prispevok)VALUES ('".$_POST['meno']."', '".$_POST['sprava']."')";

            if ($conn->query($sql) === TRUE) {
                echo "Tvoj príspevok bol uložený";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
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

	if (!empty($chyba))
	{
	?>
   <div class="alert alert-danger alert-dismissible fade show" role="alert">
	 <strong>Opps!!!</strong> <?php  echo $chyba ?>
	 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
	 </button>
   </div>
   <?php
   }
   if ($success == 'true') {
   ?>
   <div class="alert alert-success alert-dismissible fade show" role="alert">
	 <strong>Ďakujeme</strong> Tvoj príspevok bol úspešne uložený
	 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
	 </button>
   </div>
   <?php
	 $success = 'false';
   }
   ?>
<!-- Button trigger modal 
<button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#modelId">
  Launch
</button>-->

<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Modal title</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				Body
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save</button>
			</div>
		</div>
	</div>
</div>

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
			$sql = "SELECT meno, prispevok, cas FROM prispevky ORDER BY id DESC";
			$result = $conn->query($sql);
			
			while($row = $result->fetch_assoc()) {
				echo "<h4> " . $row["meno"]. "</h4><br>";
				echo "<small>Odoslané: ". $row["cas"]."</small> <br>";
				echo "<p>" . $row["prispevok"]. "</p><hr>";
			}
		 ?>
	</div>
</section>
<!-- Button trigger modal 
<button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#modelId">
Spusti
</button>-->

<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
				<div class="modal-header">
						<h5 class="modal-title">Modal</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
			<div class="modal-body">
				<div class="container-fluid">
					Skuska
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zatvoriť</button>
				<button type="button" class="btn btn-primary">Uložiť</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal zrus -->
<!--<div class="modal fade" id="idModalzrus" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
	<h5 class="modal-title fw-bold text-dark" Vymazať záznam?></h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
</div>
<div class="modal-body">
	<div class="container-fluid">
		<div id="idobsah" class="">Naozaj chceš zmazať príspevok užívateľa <b></b> publikovaný dňa - <ix/i> ?</div>
	</div>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-outline-oranz" data-bs-dismiss="modal">Nie</button>
	<button id="idBtnZmazats" class="btn btn-outline-oranz">Áno JS</button>
	<a id="idBtnZmazatPHP" href="" class="btn btn-outline-oranz">Áno PHP</a>
			</div>
		</div>
	</div>
</div>-->
<script>
/*var mojModal = document.getElementById('idModalzrus');
	mojModal.addEventListener("show.bs.modal', function(event) {
	// ktoré tlačítko vyvolalo modal (show.bs.modal)
	let tlacitko = event.relatedTarget;
	// prečitanie atributu data-bs-*
	let dataText = tlacitko.getAttribute('data-bs-mojedata');
	dataPole = dataText.split("::");
	// vloženie údajov - meno, datum tlacitko
	// document.getElementById("idobsah').getElementsByTagName("b")[0].innerHTML = datapole[1]; // postupné vyhladanie
	// alebo presné id
	document.querySelector('#idobsah b').innerHTML = datapole[1]; // vyhladanie css selektor
	datum = new Date(dataPole[2]);
	volby = { year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: 'numeric', second: 'numeric'};
	document.querySelector('#idobsah i').innerHTML = datum.toLocalestring('sk-SK', volby);
	document.getElementById("idBtnZmazatPHP').href
	=
	'cms/zmazatBlog.php?id=' + dataPole[@];
	})
	/*document.getElementById("idBtnZmazatJS").addEventListener('click", function() {
	Let modal = bootstrap.Modal.getInstance (mojmodal);
	modal.hide();
	})/*
I
</script>


<?php 
include'../../assets/paticka.php';
?>
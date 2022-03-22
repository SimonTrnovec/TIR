<?php 
  session_start();
	include'assets/hlavicka.php';
	include'assets/menu.php';
    include'../includes/db.php';
?>
	
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $meno = $_POST['meno'];
    $heslo = $_POST['heslo'];
    $sql = "SELECT login, heslo, rola FROM uzivatelia WHERE login ='". $meno."' AND heslo ='". md5($heslo)."'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

        if($meno == $row['login'] && md5($heslo) == $row['heslo']){
            $_SESSION["meno"] = $meno;
            $_SESSION["heslo"] = $heslo;
            $_SESSION["post"] = $post;
            $_SESSION["prihlasenyuzivatel"] = true;
            header('Location: index.php');
            die();

?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong> Si prihlásený </strong> <?php echo "" ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
    <?php

    } else {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong> Ups! nesprávne meno alebo heslo!</strong> <?php echo $chyba; ?>
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
     </button>
   </div>';
    }

    }
  $conn->close();

  
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body class="text-center">
    <div class="justify-content-center container p-5">
        <h2 class="h3">Prihlásenie</h2>
        <p>Prosím zadajte svoje prihlasovacie údaje.</p>


        <form method="post">
            <div class="justify-content-center">
                <label>Prihlasovacie meno</label>
                <input  type="text" name="meno" class="form-control  " value="" pattern="[^ ][\D|0-9]{3,9}" required placeholder="Zadaj prihlasovacie meno">
                <!--<input type="text" id="email_address" class="form-control" name="email-address" pattern="[^ ][\D|0-9]{3,9}" required placeholder="Zadaj prihlasovacie meno" >-->
                <span class="invalid-feedback"></span>
            </div>
            <div class="form-group">
                <label>Heslo</label>
                <input type="password" name="heslo" class="form-control pattern="[^ ][\D|0-9]{3,9}" required placeholder="Zadaj heslo" >
                <!--<input type="password" id="heslo" class="form-control" name="password" pattern="[^ ][\D|0-9]{3,9}" required placeholder="Zadaj heslo">-->
                <span class="invalid-feedback">Nesprávne heslo!</span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Prihlásiť sa">
            </div>
            <p>Ešte nemáte účet? <a>Vytvorte si ho teraz</a>.</p>
        </form>
    </div>
	 
</section>

<?php 
	include'assets/paticka.php';
?>

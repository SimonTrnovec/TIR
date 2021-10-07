<?php 
	include'assets/hlavicka.php';
	include'assets/menu.php';
	
?>
 
<section>
	<?php 

 
// Skontroluje ci je uzivatel prihlaseny
if(isset($_SESSION["prihlaseny"]) && $_SESSION["prihlaseny"] === true){
    
    exit;
}
 


 
// Zadanie premennych a inicializuje ich s prazdnymi hodnotami 
$meno = $heslo = "";
$meno_err = $heslo_err = $prihlasenie_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
  	/*if(empty(trim($_POST["meno"]))){
        $meno_err = "Prosím zadaj meno.";
    } else{
        $meno = trim($_POST["meno"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["heslo"]))){
        $heslo_err = "Prosím zadaj heslo.";
    } else{
        $heslo = trim($_POST["heslo"]);
    }
    */
    // Overovanie prihlasovacich udajov
    if(empty($meno_err) && empty($heslo_err)){
        // Priprava prihlasenia
        $sql = "SELECT id, meno, heslo FROM uzivatelia WHERE meno = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            
            mysqli_stmt_bind_param($stmt, "s", $param_meno);
            
            // Nastavenie parametrov
            $param_meno = $meno;
            
            // Pokus o vykonanie
            if(mysqli_stmt_execute($stmt)){
                // Ulozi vysledky
                mysqli_stmt_store_result($stmt);
                
                // Skontroluje ci meno existuje ak ano overi heslo
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $meno, $hashed_heslo);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($heslo, $hashed_heslo)){
                            // Heslo je spravne
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["prihlaseny"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["meno"] = $meno;                            
                            
                            // Presmerovanie
                            header("location: welcome.php");
                        } else{
                            // Heslo je neplatne
                            $login_err = "Nesprávne meno alebo heslo.";
                        }
                    }
                } else{
                    // Meno neexistuje
                    $login_err = "Nesprávne meno alebo heslo.";
                }
            } else{
                echo "Oops! Niečo je zle. Prosím skúste znovu neskôr.";
            }

            // Zatvorenie
            mysqli_stmt_close($stmt);
        }
    }
    
    // Zavrie spojenie
    mysqli_close($link);
}
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
<body>
    <div class="wrapper">
        <h2>Prihlásenie</h2>
        <p>Prosím zadajte svoje prihlasovacie údaje.</p>

        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Prihlasovacie meno</label>
                <input type="text" name="meno" class="form-control <?php echo (!empty($meno_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $meno; ?>">
                <span class="invalid-feedback"><?php echo $meno_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Heslo</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($heslo_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Prihlásiť sa">
            </div>
            <p>Ešte nemáte účet? <a href="register.php">Vytvorte si ho teraz</a>.</p>
        </form>
    </div>
	 
</section>

<?php 
	include'/assets/paticka.php';
?>
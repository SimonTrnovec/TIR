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
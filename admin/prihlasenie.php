<?php 
  session_start();
	include'assets/hlavicka.php';
	include'assets/menu.php';
?>
	<?php
$servername = "localhost";
$username = "simon22";
$password = "1QYicDQ0pPENWmzI";
$dbname = "demo21";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


//<?php
//session_start();

//if (!isset($_SESSION['user']))
//{
  //  $_SESSION['user'] = ['username' => null, 'isLoggedIn' => false, ];

//}
//
//<div class="container">


//<?php
//$uzivatelia = file('uzivatelia.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

//foreach ($uzivatelia as $uzivatel)
//{
  //  list($meno, $heslo) = explode('::', $uzivatel);
    //$prihlasenie[$meno] = $heslo;
//}

//$chyba = "";




?>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $meno = $_POST['meno'];
    $heslo = md5($_POST['heslo']);
    $sql = 'SELECT * FROM uzivatelia WHERE login = "'.$meno.'" AND heslo = "'.$heslo.'" ';
    // echo $sql;
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()){
            echo "id: " . $row["id"]. " - Name: " . $row["login"]. " " . $row["heslo"]. "<br>";
        }
       
        $_SESSION["meno"] = $meno;
        //$_SESSION["meno"] = $row["meno"];
        
        header('Location: index.php');

    //foreach ($prihlasenie as $name => $password)
   // {
     //   if ($name === $_POST['meno'])
       // {
         //   if ($password === $_POST['heslo'])
           // { 
             //   $_SESSION['user'] = ['username' => $meno, 'isLoggedIn' => true, ];
               // header('Location: ./index.php');

            //}
        //}
       // var_dump($_SESSION);
     

  }
  $conn->close();
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


        <form method="post">
            <div class="form-group">
                <label>Prihlasovacie meno</label>
                <input  type="text" name="meno" class="form-control  " value="">
                <span class="invalid-feedback"></span>
            </div>    
            <div class="form-group">
                <label>Heslo</label>
                <input type="password" name="heslo" class="form-control ">
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

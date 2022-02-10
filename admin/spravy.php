<?php 
	include'assets/hlavicka.php';
	include'assets/menu.php';
    include'../includes/db.php';
    include'assets/rozne.php'
	
?>
<?php
session_start();
$sql = 'SELECT * FROM spravy';
$result = mysqli_query($conn, $sql);

if(isset($_SESSION['meno'])) {
if( isset($_GET['delete'])){

          $id = $_GET['delete'];
          $sql = "DELETE FROM spravy WHERE id=$id";
          $mysqli = mysqli_query($conn, $sql);
          header("Location: index.php?page=spravy");
      }
    }

if (!isset($_SESSION['meno']))
{
   unset($_SESSION['meno']);
   header('Location: ./prihlasenie.php');
}

?>
<?php 
if(isset($_POST['clear-session']))
{ 
session_destroy();
}

?>
</script>
</div>
</div>

<body class="bg-white">
  <div class="collapse navbar-collapse " id="navbarNavSupportedContent">
  </div>
</nav>
<div class="row">
<div class="col-md-2">
      <div class="d-flex flex-column flex-shrink-0 p-3 text-dark bg-primary" style="height: 900px;">
      <h2 style="color: white;"><?php echo $_SESSION["meno"]; ?></h2>
          <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
          <img src="" alt="">
          </a>
          <hr>
          <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
              <a href="index.php" class="nav-link text-white" aria-current="page">
                Domov
              </a>
            </li>
            
            <li class="nav-item">
              <a href="index.php?page=blog" class="nav-link text-white">
                Blog
              </a>
            </li>
            <li class="nav-item">
              <a href="spravy.php?page=spravy" class="nav-link text-white">
                Správy
              </a>
            </li>
            <li class="pb-3">
            <form action="index.php" method="POST">
                <input type="submit" class="btn btn-primary" name="clear-session" value="Odhlasiť sa">
            </form>
            </li>
          </ul>
        <div>
      </div>
</div>
</div>
</body>
<?php
  
?>
  <h2>Vitajte v administrácii</h2>
<?php
  
?>
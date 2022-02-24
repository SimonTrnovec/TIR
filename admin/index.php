<?php 
	include'assets/hlavicka.php';
	include'assets/menu.php';
    include'../includes/db.php';
    include'assets/rozne.php';
	
?>
<?php
session_start();
$sql = 'SELECT * FROM prispevky';
$result = mysqli_query($conn, $sql);

if(isset($_SESSION['meno'])) {
if( isset($_GET['delete'])){

          $id = $_GET['delete'];
          $sql = "DELETE FROM prispevky WHERE id=$id";
          $mysqli = mysqli_query($conn, $sql);
          header("Location: index.php?page=blog");
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
              <a href="spravy.php" class="nav-link text-white">
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
<div class="col-md-10 pt-5 pb-5">
  <?php
    if (isset($_GET['page']) && $_GET['page'] == 'blog') {
  ?>
      <table class="mt-2 table table-striped">
        <thead>
          <tr>
            <th scope="col">Meno</th>
            <th scope="col">Text</th>
            <th scope="col">Čas</th>
            <th scope="col">Akcie</th>
          </tr>
        </thead>
          <tbody>
        <?php while($row = mysqli_fetch_assoc($result)) {	?>
          <tr>
            <td><?= $row["meno"] ?></td>
            <td><?= prelozBBCode($row["prispevok"]) ?></td>
            <td><?= $row["cas"] ?></td>
      <td><a type="button" data-bs-id="<?= $row["id"] ?>" data-bs-name="<?= $row["meno"] ?>" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Zmazať</a></td>
</tr>
<?php } ?>
</tbody>
</table>

<div class="modal fade m" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Zmazať článok?</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
      Naozaj chcete zmazať článok od autora: <span id="spanName"></span>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zavrieť</button>
      <a id="btn-remove" class="btn btn-danger" data-bs-target="#deleteModal">Zmazať</a>
    </div>
  </div>
</div>
</div>


<script>
var myModal = document.getElementById('deleteModal')
myModal.addEventListener('shown.bs.modal', function (event) {
    let BtnClick = event.relatedTarget;

    let id = BtnClick.getAttribute('data-bs-id');

    let Name = BtnClick.getAttribute('data-bs-name');
    document.getElementById('spanName').innerHTML = Name;

    let link = "?page=blog&delete="+id;

    document.getElementById('btn-remove').href = link;
})

</script>
  <?php
    }else{
  ?>
    <h2>Vitajte v administrácii</h2>
  <?php
    }
  ?>
</div>
</div>
<?php 
echo $_SESSION[("meno")];
?></h1>

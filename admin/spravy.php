<?php
date_default_timezone_set("Europe/Bratislava");
include 'assets/hlavicka.php';
include 'assets/menu.php';
include '../includes/db.php';
include 'assets/rozne.php';
?>
<?php
session_start();
$sql = 'SELECT * FROM prispevky';
$result = mysqli_query($conn, $sql);

if (isset($_SESSION['meno'])) {
    if (isset($_GET['delete'])) {

        $id = $_GET['delete'];
        $sql = "DELETE FROM prispevky WHERE id=$id";
        $mysqli = mysqli_query($conn, $sql);
        header("Location: index.php?page=blog");
    }
}

if (!isset($_SESSION['meno'])) {
    unset($_SESSION['meno']);
    header('Location: ./prihlasenie.php');
}

?>
<?php
if (isset($_POST['clear-session'])) {
    session_destroy();
}

?>

<textarea hidden id="lab" cols="30" rows="1" name="label"></textarea>
<textarea hidden id="id" cols="30" rows="1"></textarea>
<div style="margin: 0">

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
                            <a href="spravy.php?spravy=spravy" class="nav-link text-white">
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
            <div class="col">
            <?php
            if (isset($_GET["spravy"])) {
            ?>
                <div class="row p-5 bg-light border shadow" style="">
                    <button type='button' class='btn btn-outline-warning pb-2  ' data-bs-toggle='modal' data-bs-target='#new-modal'><i class="bi bi-file-earmark-plus-fill"></i> Nový článok</button>
                    <table class="table table-striped table-primary" style=" margin-left: auto; margin-right: auto;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Názov Článku / Obsah / Čas publikovania</th>
                                <th>Úpravy článku </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM spravy";

                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                            ?>
                                    <tr>
                                        <td style="text-align: center; vertical-align: middle;">
                                            <p style="font-weight: bold;"><?php echo $row['id'] ?></p>
                                        </td>
                                        <td>
                                            <p style="font-weight: bold;"><?php echo $row['nadpis'] ?></p>
                                            <img src="../public/theme/spravy/images/<?php echo $row['obrazok'] ?>" alt="" style="width: 150px; height: 100px; float: left;"><span class="col-5 d-inline-block text-truncate" style="max-width: 500px; padding-left: 30px;"><?php echo $row['obsah'] ?></span>
                                        </td>
                                        <td style='text-align: center; vertical-align: middle;'><button type='button' class='btn btn-outline-warning' data-bs-toggle='modal' data-bs-target='#view-modal' onclick="document.getElementById('lab').innerHTML=JSON.stringify({id: '<?php echo $row['id'] ?>', nadpis: '<?php echo $row['nadpis'] ?>', cas: '<?php echo $row['cas'] ?>', obsah: '<?php echo preg_replace('/\r|\n/', '', $row['obsah']); ?>', obrazok: '<?php echo $row['obrazok'] ?>'}); document.getElementById('nadpis-view').innerHTML=(JSON.parse(document.getElementById('lab').innerHTML)).nadpis; document.getElementById('cas-view').innerHTML=(JSON.parse(document.getElementById('lab').innerHTML)).cas; document.getElementById('obsah-view').innerHTML=(JSON.parse(document.getElementById('lab').innerHTML)).obsah; document.getElementById('image-view').src='../public/theme/spravy/images/' + (JSON.parse(document.getElementById('lab').innerHTML)).obrazok;"><i class='bi bi-file-text-fill'></i> Náhľad</button>
                                            <button type='button' class='btn btn-outline-info' data-bs-toggle='modal' data-bs-target='#edit-modal'><i class='bi bi-pencil-fill'></i> Úprava</button>

                                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#remove-modal" onclick="document.getElementById('lab').innerHTML=JSON.stringify({id: '<?php echo $row['id'] ?>', nadpis: '<?php echo $row['nadpis'] ?>', cas: '<?php echo $row['cas'] ?>', obsah: '<?php echo preg_replace('/\r|\n/', '', $row['obsah']); ?>', obrazok: '<?php echo $row['obrazok'] ?>'}); document.getElementById('nadpis').innerHTML=(JSON.parse(document.getElementById('lab').innerHTML)).nadpis; document.getElementById('cas').innerHTML=(JSON.parse(document.getElementById('lab').innerHTML)).cas; document.getElementById('obsah').innerHTML=(JSON.parse(document.getElementById('lab').innerHTML)).obsah; document.getElementById('image').src='../public/theme/spravy/images/' + (JSON.parse(document.getElementById('lab').innerHTML)).obrazok;
                        document.getElementById('nadpis-view').innerHTML=(JSON.parse(document.getElementById('lab').innerHTML)).nadpis; document.getElementById('cas-view').innerHTML=(JSON.parse(document.getElementById('lab').innerHTML)).cas; document.getElementById('obsah-view').innerHTML=(JSON.parse(document.getElementById('lab').innerHTML)).obsah; document.getElementById('image-view').src='../public/theme/spravy/images/' + (JSON.parse(document.getElementById('lab').innerHTML)).obrazok;"><i class="bi bi-trash3-fill"></i> Zmazať</button>
                                        </td>
                                    </tr>
                            <?php
                                }
                            } else {
                            }
                            ?>
                </div>
                <!--Náhľad správy-->
                <div class="modal fade" id="view-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Náhľad článku</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <p id="nadpis-view" style="font-weight: bold;"></p>
                                    <i class="bi bi-clock"> </i><i id="cas-view" style="font-size: 12px;"></i>
                                </div>
                                <div>
                                    <img id="image-view" src="" alt="" style="width: 200px; height: 150px; float: left; padding-right: 20px;">
                                    <p id="obsah-view" style="font-size: 12px;"></p>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Zavrieť</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Úprava správy-->
                <div class="modal fade" id="edit-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Naozaj chceš upraviť článok?</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h2>Úprava</h2>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-warning" data-bs-dismiss="modal">Zavrieť</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Nová správy-->
                <div class="modal fade" id="new-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Pridať nový článok</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </button>
                            </div>
                            <div class="modal-body">
                                 <h1>Nová správa</h1>
                            </div>
                            <input rows="2" class="container" cols="2" placeholder="Názov článku" ><br><br>
                        <textarea rows="8" class="container" cols="50" placeholder="Článok" style="width: 450px; height: 200px; float: center;"></textarea>
                    
                    Nahraj obrázok zo súboru:
                        <input type="file" class="btn btn-primary" name="fileToUpload" id="fileToUpload">
                        <input type="submit" class="btn btn-primary" value="Upload Image" name="submit">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Zavrieť</button>
                                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Pridať článok</button>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <!--Zmazanie správy-->
                <div class="modal fade" id="remove-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Naozaj chceš vymazať článok?</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <p id="nadpis" style="font-weight: bold;"></p>
                                    <i class="bi bi-clock"> </i><i id="cas" style="font-size: 12px;"></i>
                                </div>
                                <div>
                                    <img id="image" src="" alt="" style="width: 200px; height: 150px; float: left; padding-right: 20px;">
                                    <p id="obsah" style="font-size: 12px;"></p>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-warning" data-bs-dismiss="modal">Zavrieť</button>
                                <form action="prihlasenie.php?spravy=spravy" method="post">
                                    <button type="submit" class="btn btn-danger" data-bs-dismiss="modal" name="zmazat" onclick="document.cookie='json_dat = ' + document.getElementById('lab').innerHTML;">Zmazať</button>
                                </form>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    if (sessionStorage.getItem('wasRemoved') == 'true') {
                        document.getElementById('alertsuccess').className = 'alert alert-success alert-dismissible';
                        sessionStorage.setItem('wasRemoved', 'false');
                        document.cookie = 'json_dat = false; expires=Thu, 01 Jan 1970 00:00:01 GMT;';

                    }
                </script>

            <?php
                if (isset($_POST['zmazat'])) {

                    $sql = "DELETE FROM spravy WHERE id = " . json_decode($_COOKIE['json_dat'])->id;

                    if ($conn->query($sql)) {
                        echo "<script>sessionStorage.setItem('wasRemoved', 'true');</script>";
                        echo "<script> document.location = 'prihlasenie.php?spravy=spravy'; </script>";
                        $conn->close();
                    }
                }
            }


            ?>
            </div>
        </div>

        <?php
        include 'assets/paticka.php';
        ?>
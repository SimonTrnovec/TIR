    <div class="container-fluid bg-primary">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary container sticky-top">
            <a class="navbar-brand" href="#">Spojená škola Tvrdošín - Administrácia</a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation"></button>

            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav ml-auto">

                <?php
                    //$active_page = basename($_SERVER['SCRIPT_NAME'],'.php');
                    $active_page = basename(dirname($_SERVER['SCRIPT_NAME']));
                    $menu = [];
                    $riadky = file('../public/assets/menu.txt',FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                    
                    foreach ($riadky as $riadok) {
                        list($k,$h) = explode(':',$riadok);
                        $menu[$k] = $h;
                    }

                    foreach($menu as $odkaz => $hodnota){
                    echo '
                       <li class="nav-item">
                           <a class="nav-link '.($active_page == $odkaz ?"active":"").'"
                            href="../public/theme/'.$odkaz.'">'.$hodnota.'</a>
                        </li>';
                   }
                ?>

                </ul>
            </div>
        </nav>
    </div>

    
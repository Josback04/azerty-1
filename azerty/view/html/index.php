<?php
include('header.php');
$idUser = isset($_SESSION['nom']) ? $_SESSION['nom'] : null;

require_once dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'indexController.php';

include('./footer.php');

$header  = new header('ACCUEIL', '../Css/style2.css');
$header->nav();

$index = new index();

?>

<body>
    <header>

        <section class="basCarrousel">
            <div class="CarrouselHaut">
                <h1 class="notreDescription">
                    Voyagez et faites des souvenirs uniques à travers le monde
                </h1>
                <p class="littleDescription">Notre but est de créer et offrir des circuits tourristiques sur-mesure et authentiques.
                    A la perfection.
                </p>
                <a href="./destination.php" class="btn btn-destination">
                    Voir nos destinations
                </a>
            </div>

            <div class="hautCarrousel">
                <div class="carrouselDroit" style="--bg-loader:#FAE1EC;">

                    <!-- ici, les resultions des images 460x630  -->

                    <?php

                        $index -> getRandomDestination();

                    ?>

                </div>
            </div>

        </section>
    </header>

    <section class="notreRole">
        <h3 class="descriptionRole">Nous sommes une plateforme d'orientation... <br> Mais quel est notre role en vrai? <br><br>
            Notre rôle auprès de nos clients peut sembler simple</h3>
        <ul class="role">

            <li class="cadre">
                <span style="background-color:#fe5925;"></span>
                Nous concevons et développons des itinéraires pour nos clients
            </li>

            <li class="cadre">
                <span style="background-color:#46877e;"></span>
                Nous concevons et développons des itinéraires pour nos clients
            </li>

            <li class="cadre">
                <span style="background-color:#fbba34;"></span>
                Nous offrons un large catalogue d'images plus ou moins attractives sur vos futurs enroits préferés
            </li>

            <li class="cadre">
                <span style="background-color:#ff40b4;"></span>
                Nous vous redirigeons rapidement via la réservation de votre vol sur une compagnie certifié
            </li>

            <li class="cadre">
                <span style="background-color:#fe5925;"></span>
                Pour finir nous sommes beaux ☻♥
            </li>
        </ul>
        </div>


    </section>

    <div class="elementorWidgetContainer">

        <div class="imageCoinGauche">
            <div class="imageCoinGauche1">
                <img src="../medias/Cotswolds-300x238.jpg" alt="">

                <img src="../medias/Snowmobile-201x300.jpg" alt="">
            </div>

        </div>

        <div class="bannerImages">

            <h3 class="rolePlus">
                Mais ce n'est <br> pas tout.
            </h3>

            <?php

            if ($idUser == null) { ?>

                <div class="rolePlusContainer">
                    <p class="rolePlusPlus">
                        Vous aussi, vous êtes libres de partager les merveilleux endroits
                        dont vous avez connaissance... Tout le monde peut devenir "Autochtone" il vous suffit de nous rejoindre. <br>
                    </p>
                    <a href="./login.php" class="btn btn-destination">
                        NOUS REJOINDRE
                    </a>
                </div>

            <?php
            } else { ?>

                <div class="rolePlusContainer">
                    <p class="rolePlusPlus">
                        Vous aussi, vous êtes libres de partager les merveilleux endroits
                        dont vous avez connaissance... Tout le monde peut devenir "Autochtone" il vous suffit de créer un lieu. <br>
                    </p>
                    <a href="./creationSite.php" class="btn btn-destination">
                        CREER UN SITE
                    </a>
                </div>

            <?php }

            ?>


        </div>
        <div class="imageCoinDroit">
            <div class="imageCoinDroit1">

                <img src="" alt="">

            </div>

            <div class="imageCoinDroit1">

                <img src="" alt="">

            </div>

        </div>
    </div>
    <!-- section autochtone -->
    <section class="autochtones">
        <div class="container">
            <div class="autochtonesContent">

                <div class="titleDestination">
                    <h3 class="TitreDestination">
                        Nos autochtones
                    </h3>
                </div>
                <div class="generale_top_autochtones">

                <?php

                    $index -> getRandomAuth();

                ?>
                    <!-- lien vers la liste des autochtones -->
                    <a href="" class="voirAutochtone">Voir plus</a>
                </div>
                
            </div>
        </div>
    </section>

    <!-- section destination envoie les aléatoirements -->
    <section class="destination">
        <div class="container">
            <div class="destinationContent">
                <div class="titleDestination">
                    <h3 class="TitreDestination">
                        Nos Destinations
                    </h3>
                </div>

                <div class="destinationSlide">

                    <!-- chaque image est porteuse de lien vers destination perso  -->
                    <a href="./destination.php" class="slideImage">
                <?php

                    $index -> getRandomContinent();

                ?>
                    </a>



                </div>

            </div>
        </div>
    </section>



    <?php
    new footer();
    ?>
</body>

</html>
<?php
include('header.php');

require_once dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'destinationController.php';

$header = new header('Destinations', '../Css/style2.css');
$header->nav();

$destination = new destination();

//superGlobales
$idContinent = isset($_GET['idContinent']) ? $_GET['idContinent'] : null;
?>

<div class=generale>
    <section class="sousHeader">
        <h1 class="notreDescription">
            Nos Destinations
        </h1>
        <p class="littleDescription">Découvrez pourquoi la nature scandinave est si grandiose, pourquoi les paysages irlandais sont si envoûtants et pourquoi les lieux historiques du Royaume-Uni sont si fascinants.
        </p>

    </section>

    <section class="boxDestination" id="continent">
        <div class="listeDestination">
            <div class="endroit">
                <a href="./destination.php">
                <h2>Tous</h2>
                </a>
            </div>
            <!-- destination enregistré affiché en aléatoire -->

            <?php
                $destination -> getRandomContinent();
            ?>

        </div>
    </section>

    <section class="imageDestination">

        <?php
        if($idContinent == null)
        {
            $destination->getRandomDestination();
        }
        else
        {
            $destination->getRandomDestination($idContinent);
        }
        ?>



    </section>

            <a href="./creationSite.php" class="btn btn-destination" style="margin-left: 40%;">
                CREER UN SITE
            </a>
</div>
<?php
include('./footer.php');
new footer();
?>


</body>

</html>
<?php
include('header.php');

include('footer.php');
require_once dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'destinationPersoController.php';

// modifier aussi le header automatiquement 
$header = new header('Destinations', '../Css/style2.css');
$header->nav();

$destinationPerso = new destinationPerso();

//superGlobales
$idSite = isset($_GET['idDest'])   ? $_GET['idDest'] : null;
?>

<section class="map" id="map" style="display: none;">
<p onclick = disparition();>X</p>
    <div class="map-space">
        <?php
            $destinationPerso -> maps($idSite);
        ?>
    </div>
</section>

<section class="banner">
    <div class="sectionBg">
        <!-- <img src="../medias/Blue-Lagoon-1024x975.jpg" class="sectionBgImg" alt=""> -->

        <?php
        $destinationPerso->getRandomDestination($idSite);
        ?>
    </div>

    <!-- ICI TEXTE DE BIENVENUE, INTEGRER LE NOM DE LA VILLE ASSOCIE -->
    <div class="textWelcome">
        <?php
        $destinationPerso->destinationTitre($idSite);
        ?>
    </div>
</section>

<div class="generale">

    <section class="navDestinationPerso">
        <div class="navDestinationPerso2">

            <div class="navDestPersoContainer">
                <div class="navDestPersoContent">
                    <a href="#images">Images</a>
                </div>

                <div class="navDestPersoContent">
                    <a href="#destination">Informations</a>
                </div>
            </div>

        </div>
    </section>

    <section class="activity">
        <p class="activityTitle" id="destination">Destinations</p>
        <!-- ici tu vas ramener les données entrée par l'utlisateur, texte, photos, petite déscription -->
        <div class="activityDescriptionContainer">
            <!-- div pour les images -->
            <div class="activityImageContainer">
                <div class="activityImage">
                    <div class="destinationLegend">
                        <div class="destinationText active" id="etape1">
                            <div class="destinationTextContent ">
<?php
        $destinationPerso -> getDestinationWithDetails($idSite);
?>

                            </div>

                            <div class="defile">
                                <div class="imgDestination">
                                    <?php
                                    $destinationPerso -> getRandomDestination2($idSite);
                                    ?>
                                </div>
                            </div>

                        </div>

                    </div>

                    <!-- les miniatures des images que l'user aura entré... tu voi que j'ai mis 
                la largeur a 80px si tu peux encore mieux geré de ton coté -->


                </div>
            </div>

        </div>
    </section>
    <!-- ici affichage d'une autre partie des informations entrées par l'user, 
    genre unn petit texte inspirant sur   -->
    <section class="info" id="Images">
        <div class="infoImage">
            <h3 id="images">images</h3>

            <section class="imageDestination">
                
<?php
        $destinationPerso -> getRandomDestination3($idSite);
?>

            </section>


        </div>
</div>
</div>
</section>
</div>

</div>

<?php
// include('./footer.php');
new footer();
?>

</body>

<script>
    function disparition()
    {
        let map = document.getElementById('map')
        map.style.display = 'none';
    }

    function apparition()
    {
        let map = document.getElementById('map')
        map.style.display = 'block';
    }
</script>

</html>
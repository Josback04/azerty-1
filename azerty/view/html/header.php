<?php

session_start();

$_SESSION['nom'] = isset($_SESSION['nom']) ? $_SESSION['nom'] : null;
class header
{
    public function __construct($titre, $style)
    { ?>

        <!DOCTYPE html>
        <html lang="fr" dir="ltr">

        <head>
            <meta charset="utf-8">
            <title><?= $titre ?></title>
            <link rel="stylesheet" href="<?= $style ?>">
            <link href="https://fonts.googleapis.com/css?family=Arvo" rel="stylesheet">
            <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

        </head>

        <header>


        <?php
    }

    public function nav()
    {
        ?>

            <nav>
                <a href="./index.php">
                    <h1>AZERTY</h1>
                </a>

                <div class="onglets">
                    <ul>
                        <li><a href="./index.php">Accueil</a></li>
                        <li><a href="./destination.php">Destination</a></li>

                        <?php

                        if ($_SESSION['nom'] == null) {
                            echo '<li><a href="./login.php">Se connecter</a></li>';
                        } else {
                            echo '<li><a href="./deconnexion.php">Déconnexion</a></li>';
                        }

                        ?>

                        <li><a href="#"></a></li>
                    </ul>
                    <!-- <form>
                        <input type="search" placeholder="Rechercher" size="25"> <i> </i>
                    </form> -->
                </div>
            </nav>

        </header>

        </html>

<?php }
}

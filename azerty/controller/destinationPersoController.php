<?php
require_once dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'Database.php';
require_once dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . 'configs' . DIRECTORY_SEPARATOR . 'config.php';

class destinationPerso
{
    public $database;

    public function __construct()
    {
        $this->database = new Database(URL, USERNAME, PASSWORD);
    }

    public function destinationTitre($idSite)
    {
        $destinations = $this->database->destinationPerso($idSite);

        foreach ($destinations as $destination) {
            echo '<h2 class="welcome">Bienvenu(e) à ' . $destination['nom'] . '</h2>';
        }
    }

    public function getRandomDestination($idSite)
    {
        $rand = array();
        $random = $this->database->getRandomDestinationPerso($idSite);

        for ($i = 0; $i < 1; $i++) {
            $verf = rand(0, count($random) - 1);
            if (in_array($verf, $rand)) {
                $i--;
            } else {
                $rand[] = $verf;

                echo '<img src="' . $random[$verf]['path'] . '" class="sectionBgImg" alt="' . $random[$verf]['nom'] . '"> ';
            }
        }
    }

    public function getRandomDestination2($idSite)
    {
        $rand = array();
        $random = $this->database->getRandomDestinationPerso($idSite);

        for ($i = 0; $i < count($random); $i++) {
            $verf = rand(0, count($random) - 1);
            if (in_array($verf, $rand)) {
                $i--;
            } else {
                $rand[] = $verf;

                echo '<img src="' . $random[$verf]['path'] . '" class="sectionBgImg" alt="' . $random[$verf]['nom'] . '"> ';
            }
        }
    }

    public function getDestinationWithDetails($idSite)
    {
        $destinations = $this->database->getDestinationWithDetails($idSite);

        foreach ($destinations as $destination) { ?>

            <p><?= $destination['description'] ?></p>
            by <a href="./autochtonePerso.php?idAuth=<?= $destination['idUser'] ?>"><?= ucfirst($destination['prenom']) . ' ' . strtoupper($destination['nom']) ?></a>
            <br><br>
            <br><br>
            <a onclick=apparition(); class="btn btn-destination" style="margin: 0 0 0 0;">
                Localisation
            </a>

            <?php
            if(isset($_SESSION['idUser']))
            {
                if ($_SESSION['idUser'] == $destination['idUser'])
                {
            ?>



                <a href="./ajouterMedia.php?idDest=<?= $destination['idSite'] ?>" class="btn btn-destination" style="margin-left: 15%;">
                    Ajouter des photos
                </a>
<?php           }
            }
    }
    }

    public function getRandomDestination3($idSite)
    {
        $rand = array();
        $randNom = array();
        $random = $this->database->getRandomDestinationPerso($idSite);

        foreach ($random as $randoms) {
            echo '<div class="carteImage">
                            <div class="carteImage">
                                <a href="' . $randoms['path'] . '">
                                    <div class="imageDestinationCarte">
                                    <img src="' . $randoms['path'] . '" alt="">
                                    </div>
                                </a>
                            </div>
                          </div>';
        }
    }

    public function maps($idSite)
    {
        $destinations = $this->database->destinationPerso($idSite);
        foreach ($destinations as $destination) {
            echo '<iframe src="https://maps.google.com/maps?&q=' . $destination['coordonnees'] . '&output=embed" width="100%" height="100%" frameborder="0" scrolling="no" frameborder></iframe>';
        }
    }
}

?>
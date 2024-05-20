<?php

require_once dirname(__DIR__, 1).DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'Database.php';
require_once dirname(__DIR__, 1).DIRECTORY_SEPARATOR.'configs'.DIRECTORY_SEPARATOR.'config.php';

class autochtone
{
    public $database;
    public function __construct()
    {
        $this -> database = new Database(URL, USERNAME, PASSWORD);
    }

    public function getAutochtone($idAuth)
    {

        $autochtones = $this -> database -> getAutochtone($idAuth);

        foreach($autochtones as $autochtone)
        { ?>
            
            <div class="nom">
        <p><?= $autochtone['nom'] . ' ' . $autochtone['prenom']?></p>
            <div class="contact">
                <a href="mailto:<?= $autochtone['email']?>">écrire par email</a>
                <!-- <a onclick="openChat()">contacter ici</a> -->

                <p class="email"><?= $autochtone['email']?></p>
            </div>
        </div>
            
        <?php }

    }

    public function destination($idAuth)
    {
        $destinations = $this -> database -> getAutochtoneWithDetails($idAuth); 
        // var_dump($destinations);
        $cptr = 0;

        foreach($destinations as $destination)
        {
            if($cptr <= count($destinations))
            {
                if($cptr == 0)
                {
                    echo '<p class="nombre">Nombre : <span>'. self::comptage($idAuth) . '</span></p>';
                    $cptr++;
                }

        ?>

                <div class="destination-list">
                    <a href="../html/destinationPerso.php?idDest=<?= $destination['idSite']?>"><h3><?= $destination['nom']?></h3></a>
                </div>

        <?php
        $cptr++;
            }
        }
    }

    private function comptage($idAuth)
    {
        $nbre = count($this -> database -> getAutochtoneWithDetails($idAuth));

        if($nbre == 1)
        {
            $txt = $nbre . ' site créé';
        }
        else
        {
            $txt = $nbre . ' sites créés';
        }

        return $txt;
    }
}

?>
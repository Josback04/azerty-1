<?php

require_once dirname(__DIR__, 1).DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'Database.php';
require_once dirname(__DIR__, 1).DIRECTORY_SEPARATOR.'configs'.DIRECTORY_SEPARATOR.'config.php';

class ajout
{
    public $database;
    public function __construct()
    {
        $this -> database = new Database(URL, USERNAME, PASSWORD);
    }

    public function getDestination($idDest)
    {
        $getDestinations = $this -> database -> destinationPerso($idDest);

        foreach($getDestinations as $getDestination)
        {
        ?>

                            <div class="formRow">
								<div class="formHolder">
									<input type="text" placeholder="Nom du site" class="formControl" value="<?= ucfirst($getDestination['nom'])?>" disabled>
								</div>
								<div class="formHolder">
									<input type="text" placeholder="Pays" class="formControl" value="<?= ucfirst($getDestination['pays'])?>" disabled>
								</div>
							</div>
							<div class="formRow">
								<div class="formHolder">
									<input type="text" placeholder="Email" id="description" class="formControl" value="<?= $getDestination['description']?>" disabled>
								</div>
							</div>

        <?php
        }
    }

    public function setMedia($idSite, $path)
    {
        if($path['image']['error'] == 0)
        {
            $pathInfo = pathinfo($_FILES['image']['name']);
            $extension = $pathInfo['extension'];

            $extensionAutorisees = array('jpeg', 'jpg', 'JPEG', 'JPG', 'png', 'PNG');

            if(in_array($extension, $extensionAutorisees))
            {
              if(file_exists(dirname(__DIR__, 1).DIRECTORY_SEPARATOR.'view'.DIRECTORY_SEPARATOR.'medias'.DIRECTORY_SEPARATOR.'sites'.DIRECTORY_SEPARATOR.$idSite))
              {
                move_uploaded_file($_FILES['image']['tmp_name'], dirname(__DIR__, 1).DIRECTORY_SEPARATOR.'view'.DIRECTORY_SEPARATOR.'medias'.DIRECTORY_SEPARATOR.'sites'.DIRECTORY_SEPARATOR.$idSite.DIRECTORY_SEPARATOR.basename($path['image']['name']));
                $photoPath = '../medias'.DIRECTORY_SEPARATOR.'sites'.DIRECTORY_SEPARATOR.$idSite.DIRECTORY_SEPARATOR.$path['image']['name'];

                $this -> database -> setMedia($idSite, $photoPath);
                header('Location: ./destinationPerso.php?idDest=' . $idSite);
              }
              else
              {    
                mkdir(dirname(__DIR__, 1).DIRECTORY_SEPARATOR.'view'.DIRECTORY_SEPARATOR.'medias'.DIRECTORY_SEPARATOR.'sites'.DIRECTORY_SEPARATOR.basename($idSite));
                move_uploaded_file($_FILES['image']['tmp_name'], dirname(__DIR__, 1).DIRECTORY_SEPARATOR.'view'.DIRECTORY_SEPARATOR.'medias'.DIRECTORY_SEPARATOR.'sites'.DIRECTORY_SEPARATOR.$idSite.DIRECTORY_SEPARATOR.basename($path['image']['name']));
                $photoPath = '../medias'.DIRECTORY_SEPARATOR.'sites'.DIRECTORY_SEPARATOR.$idSite.DIRECTORY_SEPARATOR.$path['image']['name'];
                
                $this -> database -> setMedia($idSite, $photoPath);
                header('Location: ./destinationPerso.php?idDest=' . $idSite);
              }  
            }
            else
            {
                echo '<script>alert("Les photos uniquement")</script>';
            }
        }
    }
}
?>
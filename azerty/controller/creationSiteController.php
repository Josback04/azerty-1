<?php

require_once dirname(__DIR__, 1).DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'Database.php';
require_once dirname(__DIR__, 1).DIRECTORY_SEPARATOR.'configs'.DIRECTORY_SEPARATOR.'config.php';

class creation
{
    public $database;
    public function __construct()
    {
        $this -> database = new Database(URL, USERNAME, PASSWORD);
    }

    public function getUser($idUser)
    {
        $getUser = $this -> database -> getUser($idUser);

        foreach($getUser as $user)
        {
        ?>

                            <div class="formRow">
								<div class="formHolder">
									<input type="text" placeholder="Prénom" class="formControl" value="<?= $user['prenom']?>" disabled>
								</div>
								<div class="formHolder">
									<input type="text" placeholder="Nom" class="formControl" value="<?= $user['nom']?>" disabled>
								</div>
							</div>
							<div class="formRow">
								<div class="formHolder">
									<input type="text" placeholder="Email" class="formControl" value="<?= $user['email']?>" disabled>
								</div>
								<div class="formHolder">
									<input type="text" placeholder="Statut" class="formControl" value="<?= $user['statut']?>" disabled>
								</div>
							</div>

        <?php
        }
    }

    public function getContinent()
    {
        $continents = $this -> database -> getRandomContinent();

        foreach($continents as $continent)
        {
            echo '<option value="'. $continent['idContinent'] .'">'. $continent['nom'] .'</option>';
        }
    }

    public function setSite($idUser, $continent, $pays, $coordonnees, $nom, $desciption, $path)
    {
        $idSite = substr(sha1($nom), 0, 10);
        $nom = strtolower($nom);
        $pays = strtolower($pays);

        if($this -> database -> getDestination($idSite) != null)
        {
            echo '<script>alert("Cette destination existe déjà !")</script>';
        }
        else
        {
            $this -> database -> setSite($idSite, $idUser, $continent, $pays, $coordonnees, $nom, $desciption);
            self::setMedia($idSite, $path);

            $this -> database -> statute($idUser);

            header('Location: ./destinationPerso.php?idDest=' . $idSite);
        }
    }

    private function setMedia($idSite, $path)
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
              }
              else
              {    
                mkdir(dirname(__DIR__, 1).DIRECTORY_SEPARATOR.'view'.DIRECTORY_SEPARATOR.'medias'.DIRECTORY_SEPARATOR.'sites'.DIRECTORY_SEPARATOR.basename($idSite));
                move_uploaded_file($_FILES['image']['tmp_name'], dirname(__DIR__, 1).DIRECTORY_SEPARATOR.'view'.DIRECTORY_SEPARATOR.'medias'.DIRECTORY_SEPARATOR.'sites'.DIRECTORY_SEPARATOR.$idSite.DIRECTORY_SEPARATOR.basename($path['image']['name']));
                $photoPath = '../medias'.DIRECTORY_SEPARATOR.'sites'.DIRECTORY_SEPARATOR.$idSite.DIRECTORY_SEPARATOR.$path['image']['name'];
                
                $this -> database -> setMedia($idSite, $photoPath);
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
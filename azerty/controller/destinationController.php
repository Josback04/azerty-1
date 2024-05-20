<?php
require_once dirname(__DIR__, 1).DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'Database.php';
require_once dirname(__DIR__, 1).DIRECTORY_SEPARATOR.'configs'.DIRECTORY_SEPARATOR.'config.php';

class destination
{
    public $database;
    public function __construct()
    {
        $this -> database = new Database(URL, USERNAME, PASSWORD);
    }

    public function getRandomDestination($precision = 'tous')
    {
        $rand = array();
        $randNom = array();
        $random = $this -> database -> getRandomDestination($precision);

        for($i = 0; $i < count($random); $i ++)
        {
            $verf = rand(0, count($random)-1);
            if(in_array($verf, $rand))
            {
                $i --;
            }
            else
            {
                if(!in_array($random[$verf]['nom'], $randNom))
                {
                    $randNom[] = $random[$verf]['nom'];

                    echo '<div class="carteImage">
                            <a href="./destinationPerso.php?idDest='. $random[$verf]['idSite'] .'">
                                <h6 class="imageTitle">'. ucfirst($random[$verf]['nom']) .'</h6>
                                <div class="imageDestinationCarte">
                                <img src="'. $random[$verf]['path'] .'" alt="'. $random[$verf]['nom'] .'">
                                </div>
                            </a>
                         </div>';
                }
                $rand[] = $verf;
                
            }
            
        }
        
    }

    public function getRandomContinent()
    {
        $rand = array();
        $random = $this -> database -> getRandomContinent();

        for($i = 0; $i < count($random); $i ++)
        {
            $verf = rand(0, count($random)-1);
            if(in_array($verf, $rand))
            {
                $i --;
            }
            else
            {
                $rand[] = $verf;

                echo '<div class="endroit">
                        <a href="./destination.php?idContinent='. $random[$verf]['idContinent'] .'">
                            <h2>'. $random[$verf]['nom'] .'</h2> 
                        </a>
                     </div>';
            }
            
        }
        
        
    }
}

?>
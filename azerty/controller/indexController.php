<?php
require_once dirname(__DIR__, 1).DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'Database.php';
require_once dirname(__DIR__, 1).DIRECTORY_SEPARATOR.'configs'.DIRECTORY_SEPARATOR.'config.php';

class index
{
    public $database;

    public function __construct()
    {
        $this -> database = new Database(URL, USERNAME, PASSWORD);
    }

    public function getRandomAuth()
    {
        $rand = array();
        $random = $this -> database -> getAllAutochtone();

        for($i = 0; $i < 4; $i ++)
        {
            $verf = rand(0, count($random)-1);
            if(in_array($verf, $rand))
            {
                $i --;
            }
            else
            {
                $rand[] = $verf;

                echo '<a href="./autochtonePerso.php?idAuth='. $random[$verf]['idUser'] .'">
                        <div class="autochtone_card">
                            <div class="card_content_autochtone">
                                <h3>'. $random[$verf]['prenom'] .'<br>'. $random[$verf]['nom'] .'</h3>
                            </div>
                        </div>
                    </a>';
            }
            
        }
        
        
    }

    public function getRandomContinent()
    {
        $rand = array();
        $random = $this -> database -> getRandomContinent();

        for($i = 0; $i < 3; $i ++)
        {
            $verf = rand(0, count($random)-1);
            if(in_array($verf, $rand))
            {
                $i --;
            }
            else
            {
                $rand[] = $verf;

                echo '<img src="'. $random[$verf]['photoPath'] .'" alt="'. $random[$verf]['nom'] .'">';
            }
            
        }
        
        
    }

    public function getRandomDestination()
    {
        $rand = array();
        $random = $this -> database -> getRandomDestination();

        for($i = 0; $i < 3; $i ++)
        {
            $verf = rand(0, count($random)-1);
            if(in_array($verf, $rand))
            {
                $i --;
            }
            else
            {
                $rand[] = $verf;

                echo '<img src="'. $random[$verf]['path'] .'" alt="'. $random[$verf]['nom'] .'">';
            }
            
        }
        
    }
}
?>
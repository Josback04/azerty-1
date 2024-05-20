<?php
require_once dirname(__DIR__, 1).DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'Database.php';
require_once dirname(__DIR__, 1).DIRECTORY_SEPARATOR.'configs'.DIRECTORY_SEPARATOR.'config.php';


class connection
{
    public $database;

    public function __construct()
    {
        $this -> database = new Database(URL, USERNAME, PASSWORD);
    }

    public function login($email, $password)
    {
        $email    = htmlspecialchars($email);
        $password = htmlspecialchars($password);
        $logins = $this -> database -> login($email, $password);

        if($logins)
        {
            foreach($logins as $login)
            {
                $_SESSION['nom'] = $login['prenom'] . ' ' . $login['nom'];
                $_SESSION['idUser'] = $login['idUser'];
            }

            header('Location: index.php');

        }

        else
        {
            $_SESSION['wrongPassword'] = 1;
        }
    }

    public function create($prenom, $nom, $email, $password)
    {
        $prenom   = htmlspecialchars($prenom);
        $nom      = htmlspecialchars($nom);
        $email    = htmlspecialchars($email);
        $idUser   = substr(sha1($email), 0, 10);  
        $password = htmlspecialchars($password);
        if($this -> database -> emailVerification($email))
        {
            $_SESSION['wrongEmail'] = 1;
        }
        else
        {
            $create = $this -> database -> create($prenom, $idUser, $nom, $email, $password);

            if($create)
            {
                echo $create;
            }
            else
            {
                self::login($email, $password);
            }
        }
        
    }
}
?>
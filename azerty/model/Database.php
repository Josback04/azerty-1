<?php
class Database
{
    //attributs
    public $database;
    public function __construct($url, $username, $password)
    {
        $this -> database = new PDO($url, $username, $password);
    }

    public function login($email, $password)
    {
        try
        {
            $login = $this -> database -> prepare('SELECT * FROM utilisateurs WHERE email = :email AND password = sha1(:password)');

            $login -> execute(array(
    
                'email' => $email,
                'password' => $password
    
            ));
        }catch(PDOException $e){
            die($e -> getMessage());
        }
        

        $logins = $login -> fetchAll(PDO::FETCH_ASSOC);

        return $logins;
    }

    public function create($prenom,$idUser , $nom, $email, $password)
    {
        try
        {
            $create = $this -> database -> prepare('INSERT INTO utilisateurs (email, idUser, password, nom, prenom, statut) VALUES (:email, :idUser, sha1(:password), :nom, :prenom, 0)');

            $create -> execute(array(
                
                'email' => $email,
                'idUser' => $idUser,
                'password' => $password,
                'nom' => $nom,
                'prenom' => $prenom,
    
            ));
        }catch(PDOException $e){
            die($e -> getMessage());
        }

    }

    public function emailVerification($email)
    {
        try
        {
            $verification = $this -> database -> prepare('SELECT * FROM utilisateurs WHERE email = :email');

            $verification -> execute(array(
    
                'email' => $email
    
            ));
        }catch(PDOException $e){
            return false;
            die;
            die($e -> getMessage());
        }
        $verifications = $verification -> fetchAll();
        return $verifications;
    }

    public function statute($idUser)
    {
        try
        {
            $statute = $this -> database -> prepare('UPDATE utilisateurs SET statut = 1 WHERE idUser = :idUser');
            
            $statute -> execute(array(
                'idUser' => $idUser
            ));
        }catch(PDOException $e){
            die($e -> getMessage());
        }
    }

    public function getAllAutochtone()
    {
        try
        {
            $all = $this -> database -> prepare('SELECT * FROM utilisateurs WHERE statut = 1');

            $all -> execute();
        }catch(PDOException $e){
            die($e -> getMessage());
        }

        $yes = $all -> fetchAll(PDO::FETCH_ASSOC);
        return $yes;
    }

    public function getRandomContinent()
    {
        try
        {
            $all = $this -> database -> prepare('SELECT * FROM continents');

            $all -> execute();

        }catch(PDOException $e){
            die($e -> getMessage());
        }

        $yes = $all -> fetchAll(PDO::FETCH_ASSOC);
        return $yes;
    }

    public function getRandomDestination($precision = 'tous')
    {
        try
        {
            if($precision == 'tous')
            {
                $all = $this -> database -> prepare('SELECT m.path, m.idSite, d.idSite, d.nom FROM medias m JOIN destinations d WHERE m.idSite = d.idSite');

                $all -> execute();
            }
            else
            {
                $all = $this -> database -> prepare('SELECT m.path, m.idSite, d.idSite, d.nom, d.continent FROM medias m JOIN destinations d WHERE m.idSite = d.idSite AND d.continent = :continent');

                $all -> execute(array(
                    'continent' => $precision
                ));
            }
            
        }catch(PDOException $e){
            die($e -> getMessage());
        }

        $yes = $all -> fetchAll(PDO::FETCH_ASSOC);
        return $yes;
    }

    public function getUser($idUser)
    {
        try
        {

            $user = $this -> database -> prepare('SELECT * FROM utilisateurs WHERE idUser = :idUser');

            $user -> execute(array(

                'idUser' => $idUser

            ));

        }catch(PDOException $e){
            die($e -> getMessage());
        }

        $users = $user -> fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }

    public function setSite($idSite, $idUser, $continent, $pays, $coordonnees, $nom, $description)
    {
        try
        {
        $setSite = $this -> database -> prepare('INSERT INTO destinations (idSite, idUser, continent, pays, coordonnees, nom, description) VALUES (:idSite, :idUser, :continent, :pays, :coordonnees, :nom, :description)');

        $setSite -> execute(array(
            'idSite' => $idSite,
            'idUser' => $idUser,
            'continent' => $continent,
            'pays' => $pays,
            'coordonnees' => $coordonnees,
            'nom' => $nom,
            'description' => $description
        ));
        }catch(PDOException $e){
            die($e -> getMessage());
        }
    }

    public function setMedia($idSite, $path)
    {
        try
        {
        $setMedia = $this -> database -> prepare('INSERT INTO medias (idSite, path) VALUES (:idSite, :path)');

        $setMedia -> execute(array(
            'idSite' => $idSite,
            'path' => $path
        ));
        }catch(PDOException $e){
            die($e -> getMessage());
        }
    }

    public function getDestination($idSite)
    {
        try
        {
        $setMedia = $this -> database -> prepare('SELECT * FROM destinations WHERE idSite = :idSite');

        $setMedia -> execute(array(
            'idSite' => $idSite
        ));
        }catch(PDOException $e){
            die($e -> getMessage());
        }

        $medias = $setMedia -> fetchAll(PDO::FETCH_ASSOC);

        return $medias;
    }

    public function getAutochtone($idUser)
    {
        try
        {
            $get = $this -> database -> prepare('SELECT * FROM utilisateurs WHERE idUser = :idUser');

            $get -> execute(array(

                'idUser' => $idUser

            ));

        }catch(PDOException $e){
            die($e -> getMessage());
        }

        $gets = $get -> fetchAll(PDO::FETCH_ASSOC);

        return $gets;
    }

    public function getAutochtoneWithDetails($idUser)
    {
        try
        {
            $get = $this -> database -> prepare('SELECT d.idUser, d.idSite, d.nom, u.idUser FROM destinations d JOIN utilisateurs u WHERE d.idUser = u.idUser AND u.idUser = :idUser');

            $get -> execute(array(

                'idUser' => $idUser

            ));

        }catch(PDOException $e){
            die($e -> getMessage());
        }

        $gets = $get -> fetchAll(PDO::FETCH_ASSOC);

        return $gets;
    }

    public function destinationPerso($idSite)
    {
        try
        {
            $get = $this -> database -> prepare('SELECT * FROM destinations WHERE idSite = :idSite');

            $get -> execute(array(

                'idSite' => $idSite

            ));

        }catch(PDOException $e){
            die($e -> getMessage());
        }

        $gets = $get -> fetchAll(PDO::FETCH_ASSOC);

        return $gets;
    }

    public function getRandomDestinationPerso($idSite)
    {
        try
        {   
                $all = $this -> database -> prepare('SELECT m.path, m.idSite, d.idSite, d.nom FROM medias m JOIN destinations d WHERE m.idSite = d.idSite AND d.idSite = :idSite');

                $all -> execute(array(
                    'idSite' => $idSite
                ));  
            
        }catch(PDOException $e){
            die($e -> getMessage());
        }

        $yes = $all -> fetchAll(PDO::FETCH_ASSOC);
        return $yes;
    }

    public function getDestinationWithDetails($idSite)
    {
        try
        {
            $get = $this -> database -> prepare('SELECT d.idUser, d.idSite, d.description, u.idUser, u.prenom, u.nom FROM destinations d JOIN utilisateurs u WHERE d.idUser = u.idUser AND d.idSite = :idSite');

            $get -> execute(array(

                'idSite' => $idSite

            ));

        }catch(PDOException $e){
            die($e -> getMessage());
        }

        $gets = $get -> fetchAll(PDO::FETCH_ASSOC);

        return $gets;
    }

    public function getGroupedMessageList($idUser)
    {
        try{

            $getGroup = $this -> database -> prepare("SELECT * FROM chat  WHERE idExpediteur = :idUser OR idDestinataire = :idUser ORDER BY id DESC");

            $getGroup -> execute(array(

                'idUser' => $idUser

            ));

        }catch(PDOException $e)
        {
            die($e -> getMessage());
        }

        $getGroups = $getGroup -> fetchAll(PDO::FETCH_ASSOC);

        return $getGroups;
    }

    public function getGroupedMessageDetails($idUser, $idOtherUser)
    {
        try{

            $getGroup = $this -> database -> prepare("SELECT id, idExpediteur, idDestinataire, message, date, vuExp, vuDes FROM chat WHERE (idExpediteur = :idUser AND idDestinataire = :idOtherUser) OR (idExpediteur = :idOtherUser AND idDestinataire = :idUser) ORDER BY date DESC LIMIT 1 ");

            $getGroup -> execute(array(

                'idUser'     => $idUser,
                'idOtherUser'=> $idOtherUser

            ));

        }catch(PDOException $e)
        {
            die($e -> getMessage());
        }

        $getGroups = $getGroup -> fetchAll(PDO::FETCH_ASSOC);

        return $getGroups;
    }

    public function getGroupedMessageUserInfo($idUser)
    {
        try{

            $getGroup = $this -> database -> prepare("SELECT * FROM utilisateurs WHERE Id_User = :idUser");

            $getGroup -> execute(array(

                'idUser'     => $idUser

            ));

        }catch(PDOException $e)
        {
            die($e -> getMessage());
        }

        $getGroups = $getGroup -> fetchAll(PDO::FETCH_ASSOC);

        return $getGroups;
    }

    public function getConvMessage($idUser, $idOtherUser)
    {
        try{

            $getConv = $this -> database -> prepare("SELECT * FROM chat WHERE (idExpediteur = :idUser AND idDestinataire = :idOtherUser) OR (idExpediteur = :idOtherUser AND idDestinataire = :idUser) ORDER BY date");

            $getConv -> execute(array(

                'idUser'     => $idUser,
                'idOtherUser'=> $idOtherUser

            ));

        }catch(PDOException $e)
        {
            die($e -> getMessage());
        }

        $getConvs = $getConv -> fetchAll(PDO::FETCH_ASSOC);

        return $getConvs;
    }

    public function sendMessage($idExpediteur, $idDestinataire, $message, $date) 
    {
        try{

            $sendMsg = $this -> database -> prepare("INSERT INTO chat (idExpediteur, idDestinataire, message, date, vuExp, vuDes) VALUES(:idExpediteur, :idDestinataire, :message, :date, 1, 0)");

            $sendMsg -> execute(array(

                'idExpediteur'  => $idExpediteur,
                'idDestinataire'=> $idDestinataire,
                'message'       => $message,
                'date'          => $date

            ));

        }catch(PDOException $e)
        {
            die($e -> getMessage());
        }
    }

    public function updateView($idUser, $idOtherUser)
    {
        try
        {

            $update = $this -> database -> prepare('UPDATE chat SET vuDes = 1 WHERE idDestinataire = :idUser AND idExpediteur = :idOtherUser');

            $update -> execute(array(
                
                'idUser' => $idUser,
                'idOtherUser' => $idOtherUser

            ));

        }catch(PDOException $e){
            die($e -> getMessage());
        }
    }

}

?>
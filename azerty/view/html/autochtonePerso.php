<?php
include('header.php');
$idUser = isset($_SESSION['idUser']) ? $_SESSION['idUser'] : null;

require_once dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'chatController.php';
require_once dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'autochtonePersoController.php';

$idAuth = isset($_GET['idAuth']) ? $_GET['idAuth'] : null;

$header  = new header('Profil', '../Css/style2.css');
$header2 = new header('Profil', '../Css/autochtonePerso.css');

// $header2->nav();
$header->nav();

$autochtone = new autochtone();
$chat = new chat();
?>

<section align="center">
    <div class="principal" style="display: flex;" id="principal">
<?php
    $autochtone -> getAutochtone($idAuth);
?>

        <div class="nom left">
            <p>Ses destinations</p>
            <div class="destination-plus">
<?php
    $autochtone -> destination($idAuth);
?>
            </div>
        </div>
    </div>

    <div class="chat" id="chat" style="display: none;">
        <a class="hide" onclick="hideChat()">X</a>
        <h3>kukwabantu bahati jonathan</h3>
        <div class="message">
<?php
    $chat -> getConvMessage($idUser, $idAuth);
?>
        </div>

        <div class="send">
            <!-- <textarea name="" id="" cols="30" rows="1" placeholder="Votre message" autofocus></textarea>
            <input type="submit" value="Envoyer"> -->
        </div>
    </div>
</section>

<script>
    function openChat()
    {
        let chat = document.getElementById("chat");
        let principal = document.getElementById("principal");

        chat.style.display = "block";
        principal.style.display = "none";
    }

    function hideChat()
    {
        let chat = document.getElementById("chat");
        let principal = document.getElementById("principal");

        chat.style.display = "none";
        principal.style.display = "flex";
    }
</script>
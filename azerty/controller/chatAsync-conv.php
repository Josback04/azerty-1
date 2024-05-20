<?php
session_start();
require('chatController.php');
$chat = new chat();

$idUser = isset($_SESSION['idUser']) ? $_SESSION['idUser'] : 'xxx';
$idOtherUser = isset($_SESSION['idOtherUser']) ? $_SESSION['idOtherUser'] : null;

$chat -> getConvMessage($idUser, $idOtherUser);
?>
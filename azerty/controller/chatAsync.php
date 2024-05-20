<?php
session_start();
require('chatController.php');
$chat = new chat();

$idUser = isset($_SESSION['idUser']) ? $_SESSION['idUser'] : 'xxx';

$chat -> getGroupedMessageList($idUser);
?>
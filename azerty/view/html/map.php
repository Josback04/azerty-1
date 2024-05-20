<?php


$ip = '102.223.130.228';

    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, "https://api.ipgeolocation.io/ipgeo?apiKey=4d77f317bf804a428075c8e36eab6971&ip=".$ip);

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $sortie = curl_exec($curl);

    var_dump($sortie);

    curl_close($curl);
?>
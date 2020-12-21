<?php
include "../codes.php";
$bdd = new PDO("mysql:host=localhost;dbname=pronofoot;charset=utf8", $bddId, $bddMdp);

$charger = $bdd->prepare("SELECT chat_id as id, chat_pseudo as pseudo, chat_message as message, chat_date as date FROM chat WHERE chat_id > :id");
$charger->execute(array('id' => $_GET['lastId']));
$ok = $charger->fetchAll();

echo json_encode($ok);
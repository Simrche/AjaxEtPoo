<?php 

session_start();
include "../codes.php";
$bdd = new PDO("mysql:host=localhost;dbname=pronofoot;charset=utf8", $bddId, $bddMdp);

$message = $bdd->prepare("INSERT INTO chat(chat_pseudo, chat_message, chat_date) VALUES(?, ?, NOW());");

if(isset($_SESSION['pseudo'])) {
    if(isset($_POST['message'])) {
        $message->execute(array($_SESSION['pseudo'], $_POST['message']));
    } else {
        echo json_encode("error => Il faut entrer un message");
    }
} else {
    echo json_encode("error => Vous n'êtes pas connecté");
}
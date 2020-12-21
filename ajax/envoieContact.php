<?php 

session_start();
include "../codes.php";
$bdd = new PDO("mysql:host=localhost;dbname=pronofoot;charset=utf8", $bddId, $bddMdp);

$contact = $bdd->prepare("INSERT INTO contact(contact_pseudo, contact_email, contact_titre, contact_message) VALUES(?, ?, ?, ?);");

if(isset($_POST['pseudo'])) {
    $contact->execute(array($_POST['pseudo'], $_POST['email'], $_POST['titre'], $_POST['message']));
}

?>
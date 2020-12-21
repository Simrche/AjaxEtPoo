<?php 

class particiController {
    public function __construct() {

    }

    public function participation($bdd) {
        $ajoutPart = $bdd->prepare("INSERT INTO participation(part_users_id, part_ligue, part_1, part_2, part_3, part_4, part_5, part_6, part_7, part_8, part_9, part_10) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");

        if(isset($_POST['jouer'])) {
            $ajoutPart->execute(array($_SESSION['pseudo'], "Ligue 1", $_POST['resultat1'], $_POST['resultat2'], $_POST['resultat3'], $_POST['resultat4'], $_POST['resultat5'], $_POST['resultat6'], $_POST['resultat7'], $_POST['resultat8'], $_POST['resultat9'], $_POST['resultat10']));
        }
    }
}
<?php 
session_start();
include "codes.php";
$bdd = new PDO("mysql:host=localhost;dbname=pronofoot;charset=utf8", $bddId, $bddMdp);
$connecter = false;

require "autoloader.php";

if(isset($_POST['envoyer'])) {
    $Sign = new InscriController($bdd);
    $SignIn = $Sign->isSignIn($bdd);
}

if(isset($_POST['connexion'])) {
    $Conn = new ConnController($bdd);
    $isCo = $Conn->isConnected($bdd);
}

if(isset($_POST['jouer'])) {
    $jouer = new particiController;
    $jouerSend = $jouer->participation($bdd);
}

if(isset($_SESSION['pseudo'])) {
  $connecter = true;
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pronofoot</title>
        <link rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    </head>

    <body>

    <div id="overlay"></div>

<header id="header">
    <div id="headerHeader">
        <a href="index.php" id="prono"><h1>Pronofoot</h1></a>
        <nav>
            <ul>
                <li><a href="championnat.php">Pronostiquez</a></li>
                <li><a href="#">Mes pronostics</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="#">Classement</a></li>
            </ul>
        </nav>
        <?php 
            if($connecter){ ?>
            <a href="profil.php" id="profil">Mon Profil</a>
            <?php } else {?>

                <div id="log">
                    <a href="#" id="connect">Connexion</a>
                    <a href="#" id="inscrip">Inscription</a>
                </div>
            <?php } ?>

        <div class="connexion">
            <div class="croix"><a href="#">✖</a></div>
            <h2>Connexion</h2>
            <form action="#" method="post">
                <div>
                    <label for="pseudo"></label>
                    <input type="text" placeholder="Pseudo" name="pseudo">
                </div>
                <div>
                    <label for="mdp"></label>
                    <input type="password" placeholder="Mot de passe" name="mdp">
                </div>
                <input type="submit" name='connexion'>
            </form>
        </div>

        <div class="inscription">
            <div class="croix"><a href="#">✖</a></div>
            <h2>Inscription</h2>
            <form action="#" method="post">
                <div>
                    <label for="pseudo"></label>
                    <input type="text" placeholder="Pseudo" name="pseudo">
                </div>
                <div>
                    <label for="email"></label>
                    <input type="text" placeholder="Email" name="email">
                </div>
                <div>
                    <label for="mdp"></label>
                    <input type="password" placeholder="Mot de passe" name="mdp">
                </div>
                <div>
                    <label for="verifMdp"></label>
                    <input type="password" placeholder="Confirmer mot de passe" name="verifMdp">
                </div>
                <input type="submit" name='envoyer'>
            </form>
        </div>

        <button id="menu-burger">&#9776;</button>
		    <div id="sidebar">
			    <div id="sidebar-body"></div>
		    </div>
		    <div id="overlayBurger"></div>
        
    </div>
            
            <section id="selectLigue1">
                <div id="ligue1">
                    <h2>Ligue 1</h2>
                    <?php if($connecter) {?>
                    <div id="choix">
                            <form action="#" method="post">
                                <datalist id="resultat">
                                  <option value="1">
                                  <option value="Nul">
                                  <option value="2">
                                </datalist>
                                <div>
                                  <label for="resultat1">METZ / LENS</label>
                                  <input list="resultat" type="text" name="resultat1">
                                </div>
                                <div>
                                  <label for="resultat2">MARSEILLE / REIMS</label>
                                  <input list="resultat" type="text" name="resultat2">
                                </div>
                                <div>
                                  <label for="resultat3">NICE / LYON</label>
                                  <input list="resultat" type="text" name="resultat3">
                                </div>
                                <div>
                                  <label for="resultat4">BREST / MONTPELLIER</label>
                                  <input list="resultat" type="text" name="resultat4">
                                </div>
                                <div>
                                  <label for="resultat5">DIJON / MONACO</label>
                                  <input list="resultat" type="text" name="resultat5">
                                </div>
                                <div>
                                  <label for="resultat6">NANTES / ANGERS</label>
                                  <input list="resultat" type="text" name="resultat6">
                                </div>
                                <div>
                                  <label for="resultat7">SAINT-ETIENNE / NIMES</label>
                                  <input list="resultat" type="text" name="resultat7">
                                </div>
                                <div>
                                  <label for="resultat8">STRASBOURG / BORDEAUX</label>
                                  <input list="resultat" type="text" name="resultat8">
                                </div>
                                <div>
                                  <label for="resultat9">LORIENT / RENNES</label>
                                  <input list="resultat" type="text" name="resultat9">
                                </div>
                                <div>
                                  <label for="resultat10">LILLE / PSG</label>
                                  <input list="resultat" type="text" name="resultat10">
                                </div>
                                <div>
                                  <label for="submit"></label>
                                  <input type="submit" name="jouer">
                                </div>
                                
                            </form>
                    </div>
                    <?php }else{?>
                      <div><a href="#" id='connectPage'>Connectez-vous pour pouvoir jouer !</a></div>
                      <?php }?>
                </div>
            </section>
        </header>

        <!-- CHAT -->

        <div class='chat'>
            <div id='chatPart'>
                <div id="message">
                    <ul>
                        
                    </ul>
                </div>
                <div id='formMessage'>
                    <?php if(isset($_SESSION['pseudo'])) {?>
                    <form action="#" method='post'>
                        <div>
                            <label for="Message"></label>
                            <input type="text" id="messageChat">
                        </div>
                        <input type="submit" name="" id="sendChat" value='envoyer'>
                    </form>
                    <?php } else {?>
                        <p>Vous devez vous connecter pour chatter !</p>
                    <?php }?>
                </div>
            </div>
            <div id='bandeau'>
                <p>CHAT</p>
            </div>
        </div>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>
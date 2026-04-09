<?php
// Inclure la classe DBConnect
require_once 'dbconnect.php';
// Inclure la classe Command
require_once 'command.php';

// Récupérer l'instance de DBConnect et PDO
$dbConnect = DBConnect::getInstance();
$pdo = $dbConnect->getPDO();
var_dump($pdo);

// Boucle principale pour les commandes
while (true) {
    $line = readline("Entrez votre commande : ");

    if (trim(strtolower($line)) === "list") {
        Command::list();
    }
    elseif (trim(strtolower($line)) === "exit") {
        echo "Au revoir!\n";
        break;
    }
    else {
        echo "Commande inconnue : $line\n";
    }
}
?>
<?php
// Inclure la classe DBConnect
require_once 'DBConnect.php';
// Inclure la classe Command
require_once 'Command.php';

// Récupérer l'instance de DBConnect et PDO
$dbConnect = DBConnect::getInstance();
$pdo = $dbConnect->getPDO();
var_dump($pdo);

// Boucle principale pour les commandes
while (true) {
    $line = readline("Entrez votre commande : ");

    if (trim(strtolower($line)) === "list") {
        Command::list();
    } elseif (preg_match('/^detail \d+$/', $line)) {
        Command::detail($line);
        // Commande sur le terminal : detail 1
    } elseif (preg_match('/^create .+, .+, .+$/', $line)) {
        Command::create($line);
        // Commande sur le terminal : create John Doe, john.doe@example.com, 1234567890
    } elseif (preg_match('/^delete \d+$/', $line)) {
        Command::delete($line);
        // Commande sur le terminal : delete 1
    } elseif (trim(strtolower($line)) === "help") {
        Command::help();
        // Commande sur le terminal : help
    } elseif (trim(strtolower($line)) === "exit") {
        echo "Au revoir!\n";
        break;
    } else {
        echo "Commande inconnue : $line\n";
    }
}
?>

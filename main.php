<?php
// Inclure la classe DBConnect
require_once 'dbconnect.php';

// Récupérer l'instance de DBConnect et PDO
$dbConnect = DBConnect::getInstance();
$pdo = $dbConnect->getPDO();

// Ajout du var_dump pour vérifier l'instance PDO
var_dump($pdo);

// Boucle principale pour les commandes
while (true) {
    $line = readline("Entrez votre commande : ");

    if (trim(strtolower($line)) === "list") {
        echo "Affichage de la liste\n";
        // Exemple : Récupérer et afficher des données depuis la base de données
        try {
            $stmt = $pdo->query("SHOW TABLES");
            $tables = $stmt->fetchAll();
            print_r($tables);
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage() . "\n";
        }
    } elseif (trim(strtolower($line)) === "exit") {
        echo "Au revoir !\n";
        break;
    } else {
        echo "Commande inconnue : $line\n";
    }
}
?>
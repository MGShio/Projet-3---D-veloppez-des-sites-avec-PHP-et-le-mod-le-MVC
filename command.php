<?php
// Inclure les classes nécessaires
require_once 'contactmanager.php';

class Command {
    public static function list(): void {
        echo "Affichage de la liste des contacts :\n";

        // Instanciation de ContactManager et récupération des contacts
        $contactManager = new ContactManager();
        $contacts = $contactManager->findAll();

        // Vérification et affichage des contacts
        if (empty($contacts)) {
            echo "Aucun contact trouvé.\n";
        } else {
            foreach ($contacts as $contact) {
                echo $contact->toString() . "\n";
            }
        }
    }
    public static function detail(string $input): void {
    // Utiliser une expression régulière pour extraire l'ID
        if (preg_match('/^detail (\d+)$/', $input, $matches)) {
        $id = (int)$matches[1];
        $contactManager = new ContactManager();
        $contact = $contactManager->findById($id);

        if ($contact) {
            echo $contact->toString() . "\n";
        } else {
            echo "Contact non trouvé.\n";
        }
        }   else {
        echo "Format incorrect. Utilisez 'detail <id>'.\n";
        }
    }

    public static function create(string $input): void {
    // Utiliser une expression régulière pour extraire les informations
        if (preg_match('/^create (.+), (.+), (.+)$/', $input, $matches)) {
        $name = $matches[1];
        $email = $matches[2];
        $phoneNumber = $matches[3];

        $contactManager = new ContactManager();
        // Ajouter la logique pour insérer le contact dans la base de données

        echo "Le contact '$name' a été créé.\n";
        } else {
        echo "Format incorrect. Utilisez 'create <name>, <email>, <phone>'.\n";
        }
    }

    public static function delete(string $input): void {
    // Utiliser une expression régulière pour extraire l'ID
        if (preg_match('/^delete (\d+)$/', $input, $matches)) {
        $id = (int)$matches[1];
        $contactManager = new ContactManager();
        // Ajouter la logique pour supprimer le contact de la base de données

        echo "Le contact avec l'ID $id a été supprimé.\n";
        } else {
        echo "Format incorrect. Utilisez 'delete <id>'.\n";
        }
    }
    public static function help(): void {
    echo "Liste des commandes disponibles :\n\n";
    echo "1. list\n";
    echo "   - Description : Affiche la liste de tous les contacts.\n";
    echo "   - Utilisation : Entrez simplement 'list'.\n\n";

    echo "2. detail <id>\n";
    echo "   - Description : Affiche les détails d'un contact spécifique.\n";
    echo "   - Utilisation : Entrez 'detail <id>', où <id> est l'identifiant du contact.\n\n";

    echo "3. create <name>, <email>, <phone>\n";
    echo "   - Description : Crée un nouveau contact.\n";
    echo "   - Utilisation : Entrez 'create <name>, <email>, <phone>', en remplaçant les valeurs par les informations du contact.\n\n";

    echo "4. delete <id>\n";
    echo "   - Description : Supprime un contact.\n";
    echo "   - Utilisation : Entrez 'delete <id>', où <id> est l'identifiant du contact.\n\n";

    echo "5. help\n";
    echo "   - Description : Affiche cette liste d'aide.\n";
    echo "   - Utilisation : Entrez simplement 'help'.\n\n";

    echo "6. exit\n";
    echo "   - Description : Quitte l'application.\n";
    echo "   - Utilisation : Entrez simplement 'exit'.\n";
    }
}
?>
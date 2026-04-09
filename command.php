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
}
?>
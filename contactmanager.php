<?php
// Inclure les classes nécessaires
require_once 'dbconnect.php';
require_once 'Contact.php';

class ContactManager {
    private $pdo;

    public function __construct() {
        $dbConnect = DBConnect::getInstance();
        $this->pdo = $dbConnect->getPDO();
    }

    public function findAll(): array {
        try {
            $stmt = $this->pdo->query("SELECT * FROM contacts");
            $contactsData = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $contacts = [];
            foreach ($contactsData as $data) {
                $contacts[] = new Contact(
                    $data['id'],
                    $data['name'],
                    $data['email'],
                    $data['phone_number']
                );
            }

            // Vérification du contenu du tableau
            var_dump($contacts);

            return $contacts;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage() . "\n";
            return [];
        }
    }
}
?>
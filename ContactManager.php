<?php
// Inclure les classes nécessaires
require_once 'DBConnect.php';
require_once 'Contact.php';

class ContactManager
{
    private $pdo;

    public function __construct()
    {
        $dbConnect = DBConnect::getInstance();
        $this->pdo = $dbConnect->getPDO();
    }

    public function findAll(): array
    {
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

    public function findById(int $id): ?Contact
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM contacts WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $contactData = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($contactData) {
                return new Contact(
                    $contactData['id'],
                    $contactData['name'],
                    $contactData['email'],
                    $contactData['phone_number']
                );
            } else {
                return null;
            }
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage() . "\n";
            return null;
        }
    }

    public function create(Contact $contact): bool
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO contacts (name, email, phone_number) VALUES (:name, :email, :phone_number)");
            $stmt->bindValue(':name', $contact->getName());
            $stmt->bindValue(':email', $contact->getEmail());
            $stmt->bindValue(':phone_number', $contact->getPhoneNumber());
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage() . "\n";
            return false;
        }
    }

    public function delete(int $id): bool
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM contacts WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage() . "\n";
            return false;
        }
    }
}

<?php

class Contact
{
    private ?int $id;
    private ?string $name;
    private ?string $email;
    private ?string $phone_number;

    public function __construct(?int $id = null, ?string $name = null, ?string $email = null, ?string $phone_number = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->phone_number = $phone_number;
    }

    // Assesseurs (getters)
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phone_number;
    }

    // Mutateurs (setters)
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    public function setPhoneNumber(?string $phone_number): void
    {
        $this->phone_number = $phone_number;
    }

    // Méthode pour convertir le contact en chaîne de caractères
    public function toString(): string
    {
        return sprintf(
            "ID: %d, Name: %s, Email: %s, Phone: %s",
            $this->id,
            $this->name ?? 'Non défini',
            $this->email ?? 'Non défini',
            $this->phone_number ?? 'Non défini'
        );
    }
}

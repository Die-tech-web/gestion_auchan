<?php

namespace App\Entity;


 class Vendeur extends Personne
{

    private string $login;
    private string $motDePasse;
    private ?array $commandes = null;
    private ?array $paiements = null;

    public function __construct(int $id = 0, string $nom = "", string $login = "", string $motDePasse = " ")
    {
        parent::__construct($id, $nom, TypeEnum::VENDEUR);
        $this->login = $login;
        $this->motDePasse = $motDePasse;
       
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function setLogin(string $login): void
    {
        $this->login = $login;
    }

    public function getMotDePasse(): string
    {
        return $this->motDePasse;
    }

    public function setMotDePasse(string $motDePasse): void
    {
        $this->motDePasse = $motDePasse;
    }
    public function getCommandes(): array
    {
        return $this->commandes;
    }
    public function addCommande(Commande $commande): void
    {
        $this->commandes[] = $commande;
    }
    public function getPaiements(): array
    {
        return $this->paiements;
    }
    public function addPaiement(Paiement $paiement): void
    {
        $this->paiements[] = $paiement;
    }



public static function toObject(array $row): static
    {
        return new static(
            $row['id'],
            $row['nom'],
            $row['login'],
            motDePasse: $row['password'] ?? '',
        );
    }

    public function toArray(Object $object): array
    {
        return [
            'id' => $this->id,
            'login' => $this->login,
            'motDepasse' => $this->motDePasse,
            'nom' => $this->nom,
            
        ];
    }
    public function toJson(Object $object): string
    {
        return json_encode($this->toArray($object));
    }

}

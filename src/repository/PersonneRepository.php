<?php
namespace App\Repository;

use App\Config\Core\AbstractRepository;
use App\Entity\Personne;
use App\Entity\Vendeur;
use App\Config\Core\Database;

class PersonneRepository extends AbstractRepository
{
    private \PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }

    /**
     * Deletes a record from the database.
     *
     * @return bool Indicates whether the deletion was successful
     */
    public function delete(): bool
    {
        return false;
    }

    public function insert(): bool
    {
        return false;
    }

    public function selectAll(): array
    {
        return [];
    }

    public function selectBy(array $filtre): array
    {
        return [];
    }

    public function selectByEmail(string $email): array
    {
        return [];
    }

    public function selectById(int $id): array
    {
        return [];
    }

    public function update(): bool
    {
        return false;
    }

    public function selectByLoginAndPassword(string $login, string $password): ?Vendeur
    {
        $stmt = $this->pdo->prepare("SELECT * FROM personne WHERE login = :login AND password = :password ");
        $stmt->execute(['login' => $login, 'password' => $password]);
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);

        // var_dump($row); // Pour débogage, à supprimer en production
        // die();
        if ($row) {
            // Vérifier si l'utilisateur est un vendeur
            if ($row['type'] === 'Vendeur') {
                return Vendeur::toObject($row);
            }
        }

        return null;
    }

    /**
     * Vérifier si un utilisateur est un vendeur
     */
    public function isVendeur(int $id): bool
    {
        $stmt = $this->pdo->prepare("SELECT type FROM personne WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);

        return $row && $row['type'] === 'vendeur';
    }

    /**
     * Récupérer tous les vendeurs
     */
    public function getAllVendeurs(): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM personne WHERE type = 'vendeur'");
        $stmt->execute();
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $vendeurs = [];
        foreach ($rows as $row) {
            $vendeurs[] = Vendeur::toObject($row);
        }

        return $vendeurs;
    }

    /**
     * Vérifier si un utilisateur est un vendeur
     */


    /**
     * Récupérer tous les vendeurs
     */

}
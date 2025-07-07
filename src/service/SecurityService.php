<?php
namespace App\Service;

use App\Repository\PersonneRepository;
use App\Entity\Vendeur;

class SecurityService
{
    private static ?SecurityService $instance = null;
    private PersonneRepository $personneRepository;

    private function __construct()
    {
        $this->personneRepository = PersonneRepository::getInstance();
    }

    public static function getInstance(): SecurityService
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function seConnecter(string $login, string $password): ?Vendeur
    {
        // Récupérer l'utilisateur par login et password (seulement les vendeurs)
        $vendeur = $this->personneRepository->selectByLoginAndPassword($login, $password);
        // var_dump($vendeur);
        // var_dump('gffg');
        // die();
        // Vérifier si l'utilisateur existe (déjà filtré par type='vendeur' dans le repository)
        if ($vendeur && $vendeur instanceof Vendeur) {

            // var_dump($vendeur);
             // Pour débogage, à supprimer en production
            //header('Location: /list');
            // Démarrer la session si pas déjà fait
            
            return $vendeur;
            // // Stocker les informations du vendeur en session
            // $_SESSION['user'] = [
            //     'id' => $vendeur->getId(),
            //     'name' => $vendeur->getName(),
            //     'role' => 'vendeur',
            //     'login' => $vendeur->getLogin()
            // ];
            
        }
        
        return null;
    }
    
    /**
     * Vérifier si l'utilisateur connecté est un vendeur
     */
    public function isVendeur(): bool
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        return isset($_SESSION['user']) && $_SESSION['user']['role'] === 'vendeur';
    }
    
    /**
     * Vérifier si l'utilisateur est connecté
     */
    public function isConnected(): bool
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        return isset($_SESSION['user']);
    }
    
    /**
     * Obtenir l'utilisateur connecté
     */
    public function getConnectedUser(): ?array
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        return $_SESSION['user'] ?? null;
    }
}
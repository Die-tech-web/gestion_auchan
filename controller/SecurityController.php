<?php
namespace App\Controller;

use App\Config\Core\AbstractController;
use App\Service\SecurityService;

class SecurityController extends AbstractController
{
    private SecurityService $securityService;

    public function __construct(SecurityService $securityService)
    {
        $this->securityService = $securityService;
    }

    public function index()
    {
        $this->renderHtml('security/login.html.php', ['showNavbar' => false]);
    }

    public function login()
    {
        $login = $_POST['login'] ?? '';
        $password = $_POST['password'] ?? '';
        // var_dump('jg');die();
            // header('Location: /list');
            // exit;
        // Validation simple sans classe Validator
        $errors = [];
        
        if (empty($login)) {
            $errors['login'] = 'Le login est requis';
        } elseif (!filter_var($login, FILTER_VALIDATE_EMAIL)) {
            $errors['login'] = 'Le format de l\'email est invalide';
        }

        if (empty($password)) {
            $errors['password'] = 'Le mot de passe est requis';
        } elseif (strlen($password) < 3) {
            $errors['password'] = 'Le mot de passe doit contenir au moins 3 caractères';
        }

        // Tentative de connexion
     
        // Si il y a des erreurs de validation
        if (!empty($errors)) {
            $this->renderHtml('security/login.html.php', [
                'showNavbar' => false,
                'error' => $errors
            ]);
            exit;
        }

        // Tentative de connexion
        // var_dump($password); // Pour débogage, à supprimer en production
        //     die();
        $vendeur = $this->securityService->seConnecter($login, $password);
        // var_dump('ok');
        // var_dump($vendeur);die();
        if ($vendeur) {
            
            session_start();
            header('Location: /list');
            exit;// Démarrer la session et rediriger vers la liste des commandes
            
            
        } else {
            // Connexion échouée - retour au login avec message d'erreur
            $this->renderHtml('security/login.html.php', [
                'showNavbar' => false,
                'error' => ['Identifiants incorrects ou vous n\'êtes pas autorisé à accéder à ce système.']
            ]);
            exit;
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: /login');
        exit;
    }

    public function store() {}
    public function create() {}
    public function destroy() {}
    public function show() {}
    public function edit() {}
}
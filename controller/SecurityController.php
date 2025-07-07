<?php
namespace App\Controller;

use App\Config\Core\AbstractController;
use App\Service\SecurityService;
use App\Config\Core\Validator;

class SecurityController extends AbstractController
{
    private SecurityService $securityService;

    public function __construct()
    {
        $this->securityService = SecurityService::getInstance();
    }

    public function index()
    {
        $this->renderHtml('security/login.html.php', ['showNavbar' => false]);
    }

    public function login()
    {
        $login = $_POST['login'] ?? '';
        $password = $_POST['password'] ?? '';
        $validator = new Validator();

        $validator->validator($login, 'login');
        $validator->validator($password, 'password');

        $errors = $validator->getErrors();

        if (!empty($errors)) {
            // Afficher la page de login avec les erreurs
            $this->renderHtml('security/login.html.php', ['error' => $errors]);
            return;
        }

        // Authentification (exemple)
        $user = $this->securityService->seConnecter($login, $password);
        if (!$user) {
            $errors['login'] = 'Identifiants invalides';
            $this->renderHtml('security/login.html.php', ['error' => $errors]);
            return;
        }

        // Connexion réussie
        $_SESSION['user'] = [
            'id' => $user->getId(),
            'role' => 'vendeur', // ou 'client' selon le cas
            'login' => $user->getLogin()
        ];
        header('Location: /list');
        exit();
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
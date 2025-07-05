<?php
namespace App\Core;

class Validator
{
    private array $errors = [];

    /**
     * Valide un champ selon son type
     */
    public function validator(string $value, string $type): void
    {
        switch ($type) {
            case 'login':
                $this->validateLogin($value);
                break;
            case 'password':
                $this->validatePassword($value);
                break;
            case 'email':
                $this->validateEmail($value);
                break;
            default:
                $this->validateRequired($value, $type);
        }
    }

    /**
     * Valide le login (email)
     */
    private function validateLogin(string $login): void
    {
        if (empty($login)) {
            $this->errors['login'] = 'Le login est requis';
            return;
        }

        if (!filter_var($login, FILTER_VALIDATE_EMAIL)) {
            $this->errors['login'] = 'Le format de l\'email est invalide';
            return;
        }

        if (strlen($login) > 255) {
            $this->errors['login'] = 'Le login ne peut pas dépasser 255 caractères';
        }
    }

    /**
     * Valide le mot de passe
     */
    private function validatePassword(string $password): void
    {
        if (empty($password)) {
            $this->errors['password'] = 'Le mot de passe est requis';
            return;
        }

        if (strlen($password) < 3) {
            $this->errors['password'] = 'Le mot de passe doit contenir au moins 3 caractères';
            return;
        }

        if (strlen($password) > 255) {
            $this->errors['password'] = 'Le mot de passe ne peut pas dépasser 255 caractères';
        }
    }

    /**
     * Valide un email
     */
    private function validateEmail(string $email): void
    {
        if (empty($email)) {
            $this->errors['email'] = 'L\'email est requis';
            return;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = 'Le format de l\'email est invalide';
        }
    }

    /**
     * Valide qu'un champ n'est pas vide
     */
    private function validateRequired(string $value, string $fieldName): void
    {
        if (empty($value)) {
            $this->errors[$fieldName] = "Le champ {$fieldName} est requis";
        }
    }

    /**
     * Vérifie si la validation est valide
     */
    public function isValid(): bool
    {
        return empty($this->errors);
    }

    /**
     * Récupère les erreurs de validation
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    /**
     * Récupère une erreur spécifique
     */
    public function getError(string $field): ?string
    {
        return $this->errors[$field] ?? null;
    }

    /**
     * Ajoute une erreur manuellement
     */
    public function addError(string $field, string $message): void
    {
        $this->errors[$field] = $message;
    }

    /**
     * Remet à zéro les erreurs
     */
    public function reset(): void
    {
        $this->errors = [];
    }
}
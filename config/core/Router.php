<?php

namespace App\Config\Core;

use App\Repository\PersonneRepository;
use App\Service\SecurityService;
use App\Controller\SecurityController;

// Inclure le fichier des middlewares (fonctions globales)
require_once __DIR__ . '/middleware.php';

class Router
{
    public static array $routes = [];

    public static function resolve()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        if (array_key_exists($uri, self::$routes)) {
            $route = self::$routes[$uri];

            // Exécuter les middlewares s'ils existent
            if (isset($route['middlewares'])) {
                foreach ($route['middlewares'] as $middleware) {
                    if (function_exists($middleware)) {
                        $middleware();
                    }
                }
            }

            $controllerName = $route['controller'];
            $actionName = $route['action'];
            if (class_exists($controllerName) && method_exists($controllerName, $actionName)) {
                // Plus besoin d'injection manuelle, tout passe par Singleton
                $controller = new $controllerName();
                return $controller->$actionName();
            } else {
                $controllerErreur = new \App\Controller\ErrorController();
                $controllerErreur->notFound();
            }
        }

        // Route par défaut
        $controller = new SecurityController();
        $controller->login();
    }
}
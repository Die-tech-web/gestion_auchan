<?php

namespace App\Config\Core;

use App\Repository\PersonneRepository;
use App\Service\SecurityService;
use App\Controller\SecurityController;

class Router
{
    public static array $routes = [];

    public static function resolve()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        if (array_key_exists($uri, self::$routes)) {
            $controllerName = self::$routes[$uri]['controller'];
            $actionName = self::$routes[$uri]['action'];
            if (class_exists($controllerName) && method_exists($controllerName, $actionName)) {
                // Si c'est SecurityController, on injecte SecurityService
                if ($controllerName === \App\Controller\SecurityController::class) {
                    $personneRepository = new \App\Repository\PersonneRepository();
                    $securityService = new \App\Service\SecurityService($personneRepository);
                    $controller = new $controllerName($securityService);
                } else {
                    $controller = new $controllerName();
                }
                return $controller->$actionName();
            } else {
                $controllerErreur = new \App\Controller\ErrorController();
                $controllerErreur->notFound();
            }
        }

        // Route par défaut
        $personneRepository = new PersonneRepository();
        $securityService = new SecurityService($personneRepository);
        $controller = new SecurityController($securityService);
        $controller->login();
    }
}
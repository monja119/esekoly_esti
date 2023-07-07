<?php

// Définition des routes
$routes = [

    // controller @ action 
    '' => 'HomePageController@index',
    '/' => 'HomePageController@index',
    '/about' => 'HomePageController@about',
    '/contact' => 'HomePageController@contact',


    '/user/profile' => 'UserController@index',
    '/user/update' => 'UserController@updateProfile',
    
    '/login' => 'AuthController@login',
    '/register' => 'AuthController@register',
    '/logout' => 'AuthController@logout',

    '/forum' => 'ForumController@index',
    '/forum/create' => 'ForumController@create',

];

// Récupération de l'URL actuelle
$currentUrl = $_SERVER['REQUEST_URI'];
 

// Recherche de la route correspondante
if (array_key_exists($currentUrl, $routes)) {
    $route = $routes[$currentUrl];
    

    // Séparation du nom du contrôleur et de l'action
    list($controllerName, $actionName) = explode('@', $route);
    
    // Inclusion du fichier du contrôleur
    require_once 'controllers/'.$controllerName . '.php';
    
    // Instanciation du contrôleur
    $controller = new $controllerName();
    
    // Appel de l'action correspondante
    $controller->$actionName();


} else {
    // search if sac exist in router
    if (preg_match('#^/sac#', $currentUrl)) {
        require_once 'controllers/SacController.php';
        (new SacController())->index();

    }
    else if (preg_match('#^/forum#', $currentUrl)) {
        require_once 'controllers/ForumController.php';
        (new ForumController())->index();

    } else {
        // recherche de parametres :
        // Recherche de la route correspondante
        $exist_arg = false;

        foreach ($routes as $route => $handler) {
            if (preg_match('#^' . $route . '$#', $currentUrl, $matches)) {
                // Séparation du nom du contrôleur et de l'action
                list($controllerName, $actionName) = explode('@', $handler);

                // Inclusion du fichier du contrôleur
                require_once 'controllers/' . $controllerName . '.php';

                // Instanciation du contrôleur
                $controller = new $controllerName();

                // Appel de l'action correspondante avec les paramètres
                // geting arguments
                $data = array_slice($matches, 1);
                $controller->$actionName(...$data);

                $exist_arg = true;
                break;
            }
        }

        // Gestion de la route non trouvée (404)
        if (!$exist_arg) {
            require_once('config/render.php');

            foreach ($routes as $key => $value) {
                if (preg_match($key, $currentUrl)) {
                    echo '/' . $key . '/' . ' and ' . $currentUrl;
                }
            }
            render('404', 'Page Introuvable');
        }
    }
}



?>
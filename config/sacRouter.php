<?php

// Définition des routes
$routes = [
    '/sac' => 'SacController@getInitSac',
    '/sac/etudiant' => 'EtudiantController@home',
    '/sac/etudiant/add' => 'EtudiantController@create',
    '/sac/etudiant/check\?id=(\d+)' => 'EtudiantController@get',

    '/sac/module' => 'ModuleController@home',
    '/sac/module/add' => 'ModuleController@create',
    '/sac/module/delete/\?id=(\d+)' => 'ModuleController@delete',
    '/sac/module/update/\?id=(\d+)' => 'ModuleController@update',


    '/sac/notes' => 'NotesController@index',
    '/sac/notes/add/\?id=(\d+)&module_id=(\d+)' => 'NotesController@addNote',
    '/sac/notes/delete/\?id=(\d+)' => 'NotesController@deleteNote',
    '/sac/notes/update/\?note_id=(\d+)&enseignant_id=(\d+)&module_id=(\d+)' => 'NotesController@updateNote',

    '/sac/edt' => 'EdtController@index',
    '/sac/edt/add/' => 'EdtController@create',
    '/sac/edt/delete/\?id=(\d+)' => 'EdtController@delete',
    '/sac/edt/update/\?id=(\d+)' => 'EdtController@update',

    '/sac/bilan' => 'BilanController@index',
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

        render('404', 'Page Introuvable');
    }
}



?>
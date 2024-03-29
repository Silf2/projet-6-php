<?php

/**
 * Système d'autoload. 
 * A chaque fois que PHP va avoir besoin d'une classe, il va appeler cette fonction 
 * et chercher dnas les divers dossiers (ici models, controllers, views, services) s'il trouve 
 * un fichier avec le bon nom. Si c'est le cas, il l'inclut avec require_once.
 */
spl_autoload_register(function($className) {
    // On va voir dans le dossier Model si la classe existe.
    if (file_exists('src/models/' . $className . '.php')) {
        require_once 'src/models/' . $className . '.php';
    }

    // On va voir dans le dossier Controller si la classe existe.
    if (file_exists('src/controllers/' . $className . '.php')) {
        require_once 'src/controllers/' . $className . '.php';
    }

    if (file_exists('src/controllers/connectedController/' . $className . '.php')) {
        require_once 'src/controllers/connectedController/' . $className . '.php';
    }

    // On va voir dans le dossier View si la classe existe.
    if (file_exists('src/views/' . $className . '.php')) {
        require_once 'src/views/' . $className . '.php';
    }
    
});
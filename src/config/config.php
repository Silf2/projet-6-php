<?php

    session_start();

    define('TEMPLATE_VIEW_PATH', './src/views/templates/'); // Le chemin vers les templates de vues.
    define('MAIN_VIEW_PATH', TEMPLATE_VIEW_PATH . 'main.php'); // Le chemin vers le template principal.

    define('DB_HOST', 'VOTRE_HOST');
    define('DB_NAME', 'VOTRE_BASE_DE_DONNÉE');
    define('DB', ['user' => 'VOTRE_USERNAME', 'pass' => 'VOTRE_MOT_DE_PASSE']);

<?php

    session_start();

    define('TEMPLATE_VIEW_PATH', './src/views/templates/'); // Le chemin vers les templates de vues.
    define('MAIN_VIEW_PATH', TEMPLATE_VIEW_PATH . 'main.php'); // Le chemin vers le template principal.

    define('DB_HOST', 'localhost');
    define('DB_NAME', 'tomtroc');
    define('DB', ['user' => 'oc', 'pass' => 'root']);
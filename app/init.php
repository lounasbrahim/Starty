<?php
    // Activer le debug d'erreur
    ini_set( 'display_errors', 1 );
    ini_set( 'display_startup_errors', 1 );
    error_reporting( E_ALL );

    // Require la config de la base de donnée et
    // certaines Constantes
    require_once ( "config/config.php" );

    // Charger les Helpers
    require_once ( "helpers/session_helper.php" );
    require_once ( "helpers/url_helper.php" );
    require_once ( "helpers/FormSanitzer.php" );
    require_once ( "helpers/FormValidator.php" );


    // Charger le Core
    require_once ( "Core/Core.php" );
    // Charger le Model Parent
    require_once ( "Core/Database.php" );
    // Charger le Controller Parent
    require_once ( "Core/Controller.php" );
    // Charger le Controller Users
    require_once ( "Controllers/Users.php" );

    // Instancier la class Core
    $init = new Core();


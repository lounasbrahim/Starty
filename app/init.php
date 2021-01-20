<?php
    //Display all erros
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // require Models and Controller
    require_once('Core/Core.php');
    require_once('Core/Database.php');
    require_once("Core/Controller.php");
    require_once ("helpers/FormSanitzer.php");
    require_once ("helpers/FormValidator.php");

require_once("Controllers/Users.php");

    // require Session Helper
    require_once 'helpers/session_helper.php';

    // require database Config & Directories Constant
    require_once ("config/config.php");

    //Instantiate core class
    $init = new Core();


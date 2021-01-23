<?php
class Controller {
    // Load a Model with a controller class
    public function model( $model ) {

        //Require model file
        require_once APPROOT . '/Models/' . $model . '.php';
        //Instantiate model
        return new $model();

    }

    // Load a Model with a controller class
    public function view( $view, $data = [] ) {

        if (file_exists( APPROOT  .'/Views/' . $view . '.phtml' ) ) {
            require_once APPROOT . '/Views/' . $view . '.phtml';
        } else {
            die( "Cette Vue n'existe pas." );
        }

    }
}

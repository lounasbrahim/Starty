<?php

/**
 * Created by PhpStorm.
 * User: Ibrahim Lounas
 */
class User
{
    private $db ;
    public function __construct()
    {

        $this->db = new Database;

    }

    public function insertUserDetails($un, $em, $pw){

        // inserrer les Valeurs dans la bdd
        $this->db->query( "INSERT INTO users( username, email, password ) VALUES ( :un , :em , :pw )" );
        $this->db->bind( ":un", $un );
        $this->db->bind( ":em", $em );
        $this->db->bind( ":pw", $pw );

        // Exectuer la query
        if ( $this->db->execute() ){
            return true;
        }else{
            return false;
        }

    }

    public function findUserByEmail( $em ){

        // Verifier si on a un user qui la meme email dans la bdd
        $this->db->query( "SELECT * FROM users WHERE email=:em" );
        $this->db->bind( ":em" , $em );

        // fetcher le resultat de la query en OBJet
        $this->db->single();

        // verifier si l'objet contient l'adresse email entrée
        if ( $this->db->rowCount() > 0 ){
            return true ;
        }else {
            return false;
        }

    }
}

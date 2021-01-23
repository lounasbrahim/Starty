<?php
    // Démarrer la Session
    session_start();

    // Message Flash a afficher lors de la redirection
    function flash ( $name = "", $message = "", $class = "alert alert-login" ){
        //  si $name est défini
        if ( !empty( $name ) ){
            /* (1) - et si aussi $_SESSION[$name] n'a pas de Valeur ($message)
            alors que $message est défini dans flash()(le $message n'est pas défini dans la session ) */
            if ( !empty( $message ) && empty( $_SESSION[$name] ) ) {
                // Enlever la Valeur de $_SESSION[$name] si elle en a déja
                if ( !empty( $_SESSION[$name] ) ){
                     unset( $_SESSION[$name] );
                }
                // Enlever la Valeur de $_SESSION[$name. "_class"] si elle en a déja
                if ( !empty( $_SESSION[$name . "_class"] ) ){
                     unset( $_SESSION[$name . "_class"] );
                }
                // Et assigner $message pour $_SESSION[$name]
                $_SESSION[$name]              = $message;
                // Aussi assigner $class pour $_SESSION[$name . "_class"]
                $_SESSION[$name . "_class"]   = $class;

            }
            /* (2) - Sinon si c'est le contraire de (1):
            $_SESSION[$name] a bien une Valeur et $message n'est pas défini */
            elseif ( empty( $message ) && !empty( $_SESSION[$name] ) ){
                // Assigner a $class la Valeur de $_SESSION[$name. "_class"}
                // si cette dernière a une Valeur (vide) sinon assinger de chaine de char Vide
                $class = !empty( $_SESSION[$name . "_class"] ) ? $_SESSION[$name . "_class"] : '' ;
                // Et imprimer la div avec la class="$class"
                // et le texte a afficher ($message qui est dans $_SESSION[$name])
                echo '<div class="'.$class.'" id="msg-flash">'. $_SESSION[$name].'</div>' ;
                // Enlever les Variable injectées a la Session
                unset( $_SESSION[$name] );
                unset( $_SESSION[$name . "_class"] );
            }
        }

    }


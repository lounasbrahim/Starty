<?php
class FormValidator {

    public static function validateUsername( $un ) {

        if(strlen( $un ) < 2 || strlen( $un ) > 25) {
            return false;
        }else {
            return  true;
        }

    }

    public static function validateEmail( $em ) {

        if( !filter_var( $em, FILTER_VALIDATE_EMAIL ) ) {
            return false;
        }else {
            return  true;
        }

    }

    public static function validatePassword( $pw ) {

        if( strlen( $pw ) < 6 || strlen( $pw ) > 25 ) {
            return false;
        }else {
            return  true;
        }

    }

    public  static function confirmPasswords( $pw, $pw2 ) {

        if ( $pw != $pw2 ){
            return false;
        }else {
            return true;
        }

    }

    public  static function validatePasswords( $pw, $pw2 ) {

        if( $pw != $pw2 && strlen( $pw ) < 5 || strlen( $pw ) > 25) {
            return false;
        }else {
            return true;
        }

    }
}
?>

<?php
    // fonction de redirection
    function redirect( $page )
    {

        header( "Location:" . URLROOT . "/" .$page );

    }

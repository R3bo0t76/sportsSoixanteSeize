<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('error_disconnected')){

    function error_disconnected(){

        $_error =& load_class('Exceptions', 'core');
        echo $_error->show_error('Vous êtes déconnecté', '', 'error_disconnected', 401);
        exit(401);
    }
}

if (!function_exists('error_rights')){

    function error_rights(){

        $_error =& load_class('Exceptions', 'core');
        echo $_error->show_error('Vous n\'etes pas autorisé', '', 'error_rights', 403);
        exit(403);
    }
}
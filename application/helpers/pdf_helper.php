<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('createPDF')){
    function createPDF(){
        include(dirname(FCPATH).DIRECTORY_SEPARATOR.'php_pdf'.DIRECTORY_SEPARATOR.'fpdf.php');
    }
}
<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('d')) {

    function d()
    {
        $args = func_get_args();

        echo '<pre>';
        echo '<u>Tools::d</u>';
        echo "\n\r";

        foreach( $args as $arg)
            var_dump($arg);

        $debug = debug_backtrace();

        if (isset($debug[0]['file']) && isset($debug[0]['line'])) {

            $indice = 0;

            if ($debug[0]['file'] == __FILE__) {

                $indice = 1;
            }

            echo "\n\r";
            echo 'Caller : '.$debug[$indice]['file'].'(l.'.$debug[$indice]['line'].')';
            echo "\n\r";
        }

        echo '</pre>';
        die('Fin !!!');
    }
}

if (!function_exists('p')) {
    function p()
    {
        $args = func_get_args();

        echo '<pre>';
        echo '<u>Tools::p</u>';
        echo "\n\r";

        foreach( $args as $arg)
            var_dump($arg);

        $debug = debug_backtrace();

        if (isset($debug[0]['file']) && isset($debug[0]['line'])) {

            echo "\n\r";
            echo 'Caller : '.$debug[0]['file'].'(l.'.$debug[0]['line'].')';
            echo "\n\r";
        }

        echo '</pre>';
    }
}

if (!function_exists('dTime')) {
    function dTime()
    {
        d(microtime(true) - $_SERVER['REQUEST_TIME_FLOAT']);
    }
}

if (!function_exists('pTime')) {
    function pTime()
    {
        p(microtime(true) - $_SERVER['REQUEST_TIME_FLOAT']);
    }
}
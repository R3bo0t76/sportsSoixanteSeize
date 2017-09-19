<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('apply_fonct')){
    /**
     * applyFunction : appliquer une fonction à tous les elements d'un tableau. A appliquer sur une valeur, une cle.
     * @param  tableau &$nom_tableau : tableau contenant les valeurs a modifier
     * @param  string $nom_fonction  : la fonction à appliquer (key, value ou both)
     * @param  string $action        : savoir sur quoi on veux l'effectuer
     * @param  tableau $var_apply     : si on veux appliquer que sur des exeptions
     * @return bool               return true ou false
     */
    function applyFunction(&$nom_tableau, $nom_fonction, $action  = 'value', $var_apply = null){
    	if (empty($nom_tableau) || !is_array($nom_tableau)) {
    		return false;
    	}

    	if (!function_exists($nom_fonction)) {
    		return false;
    	}

        $var_apply_tab = array();
        if (!is_null($var_apply)) {
            $var_apply_tab[] = $var_apply;
        }
    	if ($action == 'value') {
    		$tab_temp = array();
    		foreach ($nom_tableau as $key => $value) {
                if (is_null($var_apply)) {
                    $tab_temp[$key] = $nom_fonction($value);
                }else {
                    if (in_array($key, $var_apply_tab)) {
        			    $tab_temp[$key] = $nom_fonction($value);
                    }
                }
    		}
    		$nom_tableau = array();
    		$nom_tableau = $tab_temp;
    	}

    	if ($action == 'key') {
    		$tab_temp = array();
    		foreach ($nom_tableau as $key => $value) {
    			$key = $nom_fonction($key);
    			$tab_temp[$key] = $value;
    		}
    		$nom_tableau = array();
    		$nom_tableau = $tab_temp;
    	}

    	if ($action == 'both') {
    		$tab_temp = array();
    		foreach ($nom_tableau as $key => $value) {
    			$key = $nom_fonction($key);
    			$tab_temp[$key] = $nom_fonction($value);
    		}
    		$nom_tableau = array();
    		$nom_tableau = $tab_temp;
    	}
        return true;
    }
}

if (!function_exists('tailleFichier')){
    function tailleFichier($taille) {

        // Conversion en Go, Mo, Ko
        if ($taille >= 1073741824) { 
            $taille = round($taille / 1073741824 * 100) / 100 . " Go"; 
        } elseif ($taille >= 1048576) { 
            $taille = round($taille / 1048576 * 100) / 100 . " Mo"; 
        } elseif ($taille >= 1024) { 
            $taille = round($taille / 1024 * 100) / 100 . " Ko"; 
        } else { 
            $taille = $taille . " o"; 
        } 
        if($taille==0) {
            $taille="-";
        }

        return $taille;
    }
}
?>

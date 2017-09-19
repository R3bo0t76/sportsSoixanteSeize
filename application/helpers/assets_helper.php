<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('fichier_ajax')){
    function fichier_ajax($nom){
        return base_url().'application/views/backend/'.$nom.'.php';
    }
}

if (!function_exists('css')){
    function css($nom){
        return base_url().'assets/css/'.$nom.'.css';
    }
}

if (!function_exists('img_upload')){
    function img_upload($nom, $title = ''){
        return '<img src="'.base_url().'assets/uploads/'.$nom.'" title="'.$title.'" />';
    }
}

if (!function_exists('icon_commun')){
    function icon_commun($couleur, $nom){
        return base_url().'assets_commun/icons/'.$couleur.'/'.$nom.'.png';
    }
}

if (!function_exists('css_commun')){
    function css_commun($nom) {
        return base_url().'assets_commun/css/'.$nom.'.css';
    }
}

if (!function_exists('path_tmpls_commun')){
    function path_tmpls_commun() {
        return base_url().'assets_commun/tmpls/';
    }
}

if (!function_exists('js')) {
    function js($nom){
        return cleanPath(base_url().'assets/js/'.$nom.'.js');
    }
}

if (!function_exists('img_url')) {
    function img_url($nom){
        return base_url().'assets/images/'.$nom;
    }
}

if (!function_exists('img')){
    function img($nom, $title = ''){
        return '<img src="'.img_url($nom).'" title="'.$title.'" />';
    }
}

if (!function_exists('lien_download')){
    function lien_download($chemin, $nom){
        $document = pathinfo(base_url().$chemin.$nom);
        $return = '';
        if (($document['extension'] == 'doc') || ($document['extension'] == 'docx')){
            $return = '<a href="'.base_url().$chemin.$nom.'" target="_blank" title="'.$nom.'"><i class="fa fa-file-word-o" aria-hidden="true"></i></a>';
        }
        if (($document['extension'] == 'xls') || ($document['extension'] == 'xlsx')){
            $return = '<a href="'.base_url().$chemin.$nom.'" target="_blank" title="'.$nom.'"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a>';
        }
        if ($document['extension'] == 'pdf'){
            $return = '<a href="'.base_url().$chemin.$nom.'" target="_blank" title="'.$nom.'"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>';
        }
        if (($document['extension'] == 'gif') || ($document['extension'] == 'jpeg') || ($document['extension'] == 'jpg') || ($document['extension'] == 'JPG') || ($document['extension'] == 'png')){
            $return = '<span class="info"><a href="'.base_url().$chemin.$nom.'" target="_blank" title="'.$nom.'"><i class="fa fa-picture-o" aria-hidden="true"></i></a><span class="bulle"><img src="'.base_url().$chemin.$nom.'" style="max-width:150px;max-height:150px;"/></span></span>';
        }
        return $return;
    }
}

if (!function_exists('affichage_img')){
    function affichage_img($chemin, $nom){
		$img = '
		<a class="tooltip" href="'.$chemin.$nom.'" target="_blank">
			'.$nom.'
		<span>
			'.img_upload($nom).'
		</span>
		</a>';
        return $img;
    }
}

if (!function_exists('telechargement_document_url')){
    function telechargement_document_url(){
        return '<script src="'.base_url().'assets/jquery/multifile-master/jquery.MultiFile.js" type="text/javascript" language="javascript"></script>
		<script src="'.base_url().'assets/jquery/multifile-master/jquery.form.js" type="text/javascript" language="javascript"></script>
		<script src="'.base_url().'assets/jquery/multifile-master/jquery.MetaData.js" type="text/javascript" language="javascript"></script>';
    }
}

if (!function_exists('upload_url')){
    function upload_url(){
        return FCPATH.'assets/uploads/';
    }
}

if (!function_exists('lien_google_map')){
    function lien_google_map($adress, $adress_suite, $code_postal, $ville){
        return '<a href="https://www.google.fr/maps/place/'.str_replace(' ','+',$adress).'+'.str_replace(' ','+',$adress_suite).',+'.str_replace(' ','+',$code_postal).'+'.str_replace(' ','+',$ville).'" target="_blank">'.img('google-maps.png').'&nbsp;Voir sur Google Map</a>';
    }
}

if (!function_exists('document_pdf')){
    function document_pdf($nom, $page = null){
		if (is_null($page)){
			$doc_pdf = '<object data="'.base_url().'assets/documents/'.$nom.'.pdf" type="application/pdf" width="1024" height="768">
			alt : <a href="'.base_url().'assets/documents/'.$nom.'.pdf">test.pdf</a>
			</object>';
		}else{
			$doc_pdf = '<object data="'.base_url().'assets/documents/'.$nom.'.pdf#page='.$page.'" type="application/pdf" style="width:100%;height:724px;">
			alt : <a href="'.base_url().'assets/documents/'.$nom.'.pdf#page='.$page.'">test.pdf</a>
			</object>';
		}

        return $doc_pdf;
    }
}

if (!function_exists('export_url')){
    function export_url(){
        return '/var/www/html/intranet/Applications/Gestion_Evenements/assets/export/';
    }
}

if (!function_exists('cleanPath')) {
    function cleanPath($path)
    {
        return str_replace(array('\\', '/'), DIRECTORY_SEPARATOR, $path);
    }
}

if (!function_exists('afficheStatut')) {
    function afficheStatut($statut)
    {
        $span_statut = '<span class="label label-default" title=""></span>';
        if ($statut == 'N') {
            $span_statut = '<span class="label label-success" title="Disponible">Disponible</span>';
        }
        if ($statut == 'A') {
            $span_statut = '<span class="label label-warning" title="Non Disponible">Non Disponible</span>';
        }
        if ($statut == 'S') {
            $span_statut = '<span class="label label-danger" title="Supprimer">Supprimer</span>';
        }
        return $span_statut;
    }
}

if (!function_exists('str_to_noaccent')) {
    function str_to_noaccent($str)
    {
        $url = $str;
        $url = preg_replace('#Ç#', 'C', $url);
        $url = preg_replace('#ç#', 'c', $url);
        $url = preg_replace('#è|é|ê|ë#', 'e', $url);
        $url = preg_replace('#È|É|Ê|Ë#', 'E', $url);
        $url = preg_replace('#à|á|â|ã|ä|å#', 'a', $url);
        $url = preg_replace('#@|À|Á|Â|Ã|Ä|Å#', 'A', $url);
        $url = preg_replace('#ì|í|î|ï#', 'i', $url);
        $url = preg_replace('#Ì|Í|Î|Ï#', 'I', $url);
        $url = preg_replace('#ð|ò|ó|ô|õ|ö#', 'o', $url);
        $url = preg_replace('#Ò|Ó|Ô|Õ|Ö#', 'O', $url);
        $url = preg_replace('#ù|ú|û|ü#', 'u', $url);
        $url = preg_replace('#Ù|Ú|Û|Ü#', 'U', $url);
        $url = preg_replace('#ý|ÿ#', 'y', $url);
        $url = preg_replace('#Ý#', 'Y', $url);

        return ($url);
    }
}
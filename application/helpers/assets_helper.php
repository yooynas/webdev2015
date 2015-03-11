<?php
if ( ! defined('BASEPATH')) exit('pas d\'accès direct');

if ( ! function_exists('css_url')) {
    function css_url($nom) {
        return base_url().'assets/css/'.$nom.'.css';   
    }
}

if ( ! function_exists('js_url')) {
    function js_url($nom) {
        return base_url().'assets/js/'.$nom.'.js';   
    }
}

if ( ! function_exists('img_url')) {
    function img_url($nom) {
        return base_url().'assets/images/'.$nom;   
    }
}

if ( ! function_exists('doc_url')) {
    function doc_url($nom) {
        return base_url().'assets/documents/'.$nom;   
    }
}

if ( ! function_exists('img')) {
    function img($nom,$alt='') {
        return '<img class="img-responsive" src="'.img_url($nom).'" alt="'.$alt.'" />';   
    }
}
?>
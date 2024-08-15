<?php

if( !function_exists('view') ){
    function view($page, $data = [], $return = false){
        ob_start();
        extract($data);
        require_once(BASE_PATH.'/view/'.$page.'.php');
        if($return){
            return ob_get_clean();
        }
    }
}

$block = [];

if( !function_exists('block') ){
    function block($page){
        global $block;
        return (isset($block[$page])?$block[$page]:"");
    }
}

if( !function_exists('section') ){
    function section($page){
        ob_start();
    }
}

if( !function_exists('endSection') ){
    function endSection($page){
        global $block;
        $block[$page] = ob_get_clean();
    }
}

if( !function_exists('extendsView') ){
    function extendsView($page){
        include VIEW_PATH . $page . ".php";
    }
}
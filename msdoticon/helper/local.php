<?php

// $locals = isset($_SESSION[LOCALS_KEY]) && !empty($_SESSION[LOCALS_KEY]) ? $_SESSION[LOCALS_KEY] : 'en';

// $messages = $messages[$locals];

if( !function_exists('trans') ){
    function trans($key, $fill = []){
        $locals = isset($_SESSION[LOCALS_KEY]) && !empty($_SESSION[LOCALS_KEY]) ? $_SESSION[LOCALS_KEY] : 'en';
        require(BASE_PATH.'/public/locals/'.$locals.'/messages.php');
        if( isset($messages[$locals]) ){
            $locals = $messages[$locals];
            if( isset($locals[$key]) ){
                return vsprintf($locals[$key], $fill);
            } else {
                return $key;
            }
        } else {
            return $key;
        }
    }
}
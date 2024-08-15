<?php

if( !function_exists('load') ){
    function load($file){
        if( file_exists(BASE_PATH.'/'.$file) ){
            require(BASE_PATH.'/'.$file);
        }
    }
}

if( !function_exists('loadDir') ){
    function loadDir($dir){
        $fileList = array_diff(scandir(BASE_PATH.'/'.$dir.'/'), ['.','..']);
        if(!empty($fileList)){
            foreach($fileList as $file){
                require(BASE_PATH.'/'.$dir.'/'.$file);
            }
        }
    }
}
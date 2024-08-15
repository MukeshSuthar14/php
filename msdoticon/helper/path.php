<?php

if( !function_exists('asset') ){
    function asset($path = ''){
        return ASSET_PATH . $path;
    }
}

if( !function_exists('baseUrl') ){
    function baseUrl($path = ''){
        return SITE_URL.$path;
    }
}

if( !function_exists('basePath') ){
    function basePath($path = ''){
        return BASE_PATH.$path;
    }
}

if( !function_exists('publicPath') ){
    function publicPath($path = ''){
        return BASE_PATH.'/public/'.$path;
    }
}
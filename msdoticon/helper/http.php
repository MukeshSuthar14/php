<?php

if (!function_exists('redirect')) {
    function redirect($url)
    {
        if ($url === 'back') {
            if (isset($_SERVER['HTTP_REFERER'])) {
                header('location:' . $_SERVER['HTTP_REFERER']);
            }
        } else {
            header('location:' . SITE_URL . $url);
        }
    }
}

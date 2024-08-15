<?php

if (!function_exists('withInput')) {
    function withInput()
    {
        $inputs = array_merge((!empty($_POST) ? $_POST : []), (!empty($_GET) ? $_GET : []));
        if (!empty($inputs)) {
            flash('inputs', $inputs);
        }
    }
}

if (!function_exists('flash')) {
    function flash($key = '', $value = [])
    {
        if (empty($value)) {
            if (isset($_SESSION[FLASH_KEY][$key])) {
                return $_SESSION[FLASH_KEY][$key];
            }
        } elseif (!empty($key) && !empty($value)) {
            $_SESSION[FLASH_KEY][$key] = $value;
        } else {
            if (isset($_SESSION[FLASH_KEY])) {
                return $_SESSION[FLASH_KEY];
            }
        }
        return '';
    }
}

if (!function_exists('old')) {
    function old($key, $value = '')
    {
        if (empty($value)) {
            if (isset($_SESSION[FLASH_KEY]['inputs'][$key])) {
                return $_SESSION[FLASH_KEY]['inputs'][$key];
            }
        } else {
            return $value;
        }
        return '';
    }
}

if (!function_exists('formValidate')) {
    function formValidate($rule, $message, $flash = false)
    {
        $result['status'] = true;

        if (!empty($rule) && !empty($message)) {
        }
        if ($flash) {
        }
    }
}

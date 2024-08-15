<?php

return [

    /**
     * Define routes for web
     * 
     * example
     * [
     *  ROUTE_METHOD => 'GET',
     *  ROUTE_URI => 'default',
     *  ROUTE_MIDDLE => '',
     *  ROUTE_ACTION => 'frontend/home' 
     * ]
     */

    [ 
        ROUTE_METHOD => 'GET',
        ROUTE_URI => 'default',
        ROUTE_MIDDLE => '',
        ROUTE_ACTION => 'frontend/home' 
    ],

    [ 
        ROUTE_METHOD => 'GET', 
        ROUTE_URI => 'index.html', 
        ROUTE_MIDDLE => '',
        ROUTE_ACTION => 'frontend/home'
    ],

    [
        ROUTE_METHOD => 'GET', 
        ROUTE_URI => 'get-user/:id',
        ROUTE_MIDDLE => '',
        ROUTE_ACTION => 'frontend/getUser'
    ],

    [
        ROUTE_METHOD => 'GET', 
        ROUTE_URI => 'about-us',
        ROUTE_MIDDLE => '',
        ROUTE_ACTION => 'frontend/aboutUs'
    ],

    [
        ROUTE_METHOD => 'GET', 
        ROUTE_URI => 'contact-us',
        ROUTE_MIDDLE => '',
        ROUTE_ACTION => 'frontend/contactUs'
    ],

    [ 
        ROUTE_METHOD => 'GET',
        ROUTE_URI => '*',
        ROUTE_MIDDLE => '',
        ROUTE_ACTION => 'frontend/pageNotFound'
    ],

    [ 
        ROUTE_METHOD => 'GET', 
        ROUTE_URI => 'welcome', 
        ROUTE_MIDDLE => '',
        ROUTE_ACTION => 'welcome/index'
    ],

    [ 
        ROUTE_METHOD => 'POST', 
        ROUTE_URI => 'welcome/add', 
        ROUTE_MIDDLE => '',
        ROUTE_ACTION => 'welcome/add' 
    ],

    [
        ROUTE_METHOD => 'POST', 
        ROUTE_URI => 'add', 
        ROUTE_MIDDLE => '',
        ROUTE_ACTION => 'student/add'
    ],

    [
        ROUTE_METHOD => 'GET',
        ROUTE_URI => 'login',
        ROUTE_MIDDLE => '',
        ROUTE_ACTION => 'login/index'
    ],

    [
        ROUTE_METHOD => 'POST',
        ROUTE_URI => 'login/checkLogin',
        ROUTE_MIDDLE => '',
        ROUTE_ACTION => 'login/checkLogin'
    ],

    [
        ROUTE_METHOD => 'GET',
        ROUTE_URI => 'dashboard',
        ROUTE_MIDDLE => 'checkLogin',
        ROUTE_ACTION => 'dashboard/index'
    ],

];
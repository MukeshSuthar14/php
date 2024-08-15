<?php

return [

    /**
     * Define routes for api
     * 
     * example
     * [
     *  ROUTE_METHOD => 'get',
     *  ROUTE_URI => 'default',
     *  ROUTE_MIDDLE => '',
     *  ROUTE_ACTION => 'frontend/home' 
     * ]
     */

    [
        ROUTE_METHOD => 'GET',
        ROUTE_URI => 'api/index.html',
        ROUTE_MIDDLE => '',
        ROUTE_ACTION => 'api/login',
    ],

    [
        ROUTE_METHOD => 'GET',
        ROUTE_URI => '',
        ROUTE_MIDDLE => '',
        ROUTE_ACTION => '',
    ],

];
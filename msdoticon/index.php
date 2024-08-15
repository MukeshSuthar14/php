<?php

try {
    session_start();
    define('BASE_PATH', __DIR__);
    require_once BASE_PATH . '/system/autoload.php';
    register_shutdown_function(function () {
        unset($_SESSION[FLASH_KEY]);
    });
    $uriSegment = isset($_SERVER['PATH_INFO']) ? trim($_SERVER['PATH_INFO'], '/') : '/';
    function callUserMethod($callback, $callIndex)
    {
        if (is_string($callback[$callIndex])) {
            $callController = explode('/', $callback[$callIndex]);
            if (isset($callController[0]) && !empty($callController[0]) && file_exists(BASE_PATH . '/controller/' . $callController[0] . '.php')) {
                include BASE_PATH . '/controller/' . $callController[0] . '.php';
                if (class_exists(ucwords($callController[0]))) {
                    eval('$class = new ' . ucwords($callController[0]) . '();');
                    echo $class->{$callController[1]}($_REQUEST);
                } else {
                    throw new Exception(ucwords($callController[0]) . ' class not found in ' . BASE_PATH . '/controller/' . $callController[0] . '.php');
                }
            }
        } elseif (is_callable($callback[$callIndex])) {
            echo call_user_func($callback[$callIndex], $_REQUEST);
        }
    }
    function callUserMiddleware($middleware, $callback, $callIndex)
    {
        if (is_string($middleware[$callIndex])) {
            if (file_exists(BASE_PATH . '/middleware/' . $middleware[$callIndex] . '.php')) {
                include BASE_PATH . '/middleware/' . $middleware[$callIndex] . '.php';
                if (class_exists(ucwords($middleware[$callIndex]))) {
                    eval('$class = new ' . ucwords($middleware[$callIndex]) . '();');
                    echo $class->check($_REQUEST, function ($request) use ($callback, $callIndex) {
                        return callUserMethod($callback, $callIndex);
                    });
                } else {
                    throw new Exception(ucwords($middleware[$callIndex]) . ' class not found in ' . BASE_PATH . '/middleware/' . $middleware[$callIndex] . '.php');
                }
            }
        } elseif (is_callable($middleware[$callIndex])) {
            echo call_user_func($middleware[$callIndex], $_REQUEST);
        }
    }
    $routes = array_merge(...array_map(fn($route) => include(BASE_PATH . '/routes/' . $route), $routeList));
    $methods = array_values(array_column($routes, ROUTE_METHOD));
    $uri = array_values(array_column($routes, ROUTE_URI));
    $middleware = array_values(array_column($routes, ROUTE_MIDDLE));
    $callback = array_values(array_column($routes, ROUTE_ACTION));
    $callIndex = array_search($uriSegment, $uri);
    if ($callIndex !== false) {
        if (strtolower($methods[$callIndex]) === strtolower($_SERVER['REQUEST_METHOD'])) {
            if (isset($middleware[$callIndex]) && !empty($middleware[$callIndex])) {
                callUserMiddleware($middleware, $callback, $callIndex);
            } else {
                callUserMethod($callback, $callIndex);
            }
        } else {
            throw new Exception(strtoupper($_SERVER['REQUEST_METHOD']) . ' method not supproted with this routes. supported method is ' . strtoupper($methods[$callIndex]));
        }
    } else {
        if (array_search('default', $uri) !== false && $uriSegment === '/') {
            if (isset($middleware[$callIndex]) && !empty($middleware[$callIndex])) {
                callUserMiddleware($middleware, $callback, array_search('default', $uri));
            } else {
                callUserMethod($callback, array_search('default', $uri));
            }
        } else {
            $fallbackKey = (array_search('*', $uri));
            if ($fallbackKey !== false) {
                callUserMethod($callback, $fallbackKey);
            } else {
                throw new Exception("Url Not found");
            }
        }
    }
} catch (Exception $e) {
    if (file_exists(BASE_PATH . '/exception/MsdoticonException.php')) {
        include BASE_PATH . '/exception/MsdoticonException.php';
        if (class_exists('MsdoticonException')) {
            eval('$class = new MsdoticonException();');
            $class->render($e);
        } else {
            throw new Exception('MsdoticonException class not found');
        }
    }
}

<?php

$configList = array_diff(scandir(BASE_PATH . '/config/'), ['.', '..']);
if (!empty($configList)) {
    foreach ($configList as $config) {
        require(BASE_PATH . '/config/' . $config);
    }
}

$systemList = array_diff(scandir(BASE_PATH . '/system/'), ['.', '..', 'autoload.php']);
if (!empty($systemList)) {
    foreach ($systemList as $system) {
        require(BASE_PATH . '/system/' . $system);
    }
}

$routeList = array_diff(scandir(BASE_PATH . '/routes/'), ['.', '..']);

$helperList = array_diff(scandir(BASE_PATH . '/helper/'), ['.', '..']);
if (!empty($helperList)) {
    foreach ($helperList as $helper) {
        require(BASE_PATH . '/helper/' . $helper);
    }
}

$modelList = array_diff(scandir(BASE_PATH . '/model/'), ['.', '..']);
if (!empty($modelList)) {
    foreach ($modelList as $model) {
        require(BASE_PATH . '/model/' . $model);
    }
}

<?php
/**
 * Get query request params
 */
$scope = isset($_REQUEST['scope']) ? $scope = $_REQUEST['scope'] : null;
$action = isset($_REQUEST['action']) ?$_REQUEST['action'] : null;
$id = isset($_REQUEST['id'])? $_REQUEST['id'] : null;

/**
 * Define route
 */
$router = [
    'product' => ['view', 'listing','store'],
    'page' => ['home', 'contact','demo','searchProduct','filterByColor']
];


/**
 * Direct 404 to home page
 */
if (!array_key_exists($scope,$router) || !in_array($action, $router[$scope])) {
    $scope = 'page';
    $action = 'home';
}



/**
 * Create controller and process method
 */
$class = '\\Mvc\\Controllers\\' .ucwords($scope) . 'Controller';
$controller = new $class();
$controller->$action($id);

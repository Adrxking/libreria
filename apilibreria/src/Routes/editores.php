<?php
use Slim\Routing\RouteCollectorProxy;

$app->group('/api', function(RouteCollectorProxy $group){
    $group->get('/editores', 'App\Controllers\EditoresController:getALL');
    $group->post('/editores/new', 'App\Controllers\EditoresController:new');
});
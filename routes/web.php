<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('series', ['uses' => 'SeriesController@index']);
    $router->post('series', ['uses' => 'SeriesController@store']);
    $router->get('series/{id}', ['uses' => 'SeriesController@show']);
    $router->put('series/{id}', ['uses' => 'SeriesController@update']);
    $router->delete('series/{id}', ['uses' => 'SeriesController@destroy']);
});

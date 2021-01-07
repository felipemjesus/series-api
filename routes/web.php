<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {

    $router->group(['prefix' => 'series'], function () use ($router) {
        $router->get('', ['uses' => 'SeriesController@index']);
        $router->post('', ['uses' => 'SeriesController@store']);
        $router->get('{id}', ['uses' => 'SeriesController@show']);
        $router->put('{id}', ['uses' => 'SeriesController@update']);
        $router->delete('{id}', ['uses' => 'SeriesController@destroy']);
        $router->get('{serieId}/episodios', ['uses' => 'EpisodiosController@findBySerie']);
    });

    $router->group(['prefix' => 'episodios'], function () use ($router) {
        $router->get('', ['uses' => 'EpisodiosController@index']);
        $router->post('', ['uses' => 'EpisodiosController@store']);
        $router->get('{id}', ['uses' => 'EpisodiosController@show']);
        $router->put('{id}', ['uses' => 'EpisodiosController@update']);
        $router->delete('{id}', ['uses' => 'EpisodiosController@destroy']);
    });

});

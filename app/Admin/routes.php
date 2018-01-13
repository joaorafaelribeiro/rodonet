<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->put('veiculos/{veiculo_id}/edit/{assento_id}', 'VeiculoController@updateAssento');
    $router->delete('veiculos/{veiculo_id}/edit/{assento_id}', 'VeiculoController@deleteAssento');
    $router->get('veiculos/{veiculo_id}/edit/create', 'VeiculoController@createAssento');
    $router->resource('veiculos', 'VeiculoController');
    $router->resource('motoristas', 'MotoristaController');
    $router->resource('paradas', 'ParadaController');
    $router->resource('pessoas', 'PessoaController');
    $router->resource('viagens', 'ViagemController');
    $router->resource('bilhetes', 'BilheteController');
});

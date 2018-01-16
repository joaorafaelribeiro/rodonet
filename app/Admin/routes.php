<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->put('veiculos/{veiculo_id}/edit/{assento_id}', 'AssentoController@updateAssento');
    $router->delete('veiculos/{veiculo_id}/edit/{assento_id}', 'AssentoController@deleteAssento');
    $router->resource('assentos', 'AssentoController');
    $router->resource('veiculos', 'VeiculoController');
    $router->resource('motoristas', 'MotoristaController');
    $router->resource('paradas', 'ParadaController');
    $router->resource('pessoas', 'PessoaController');
    $router->resource('viagens', 'ViagemController');
    $router->resource('bilhetes', 'BilheteController');
});

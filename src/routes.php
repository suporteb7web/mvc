<?php

use core\Router;

$router = new Router();


//metodo get ('rota - barra simplesmente acessa o site', 'nome da classe do controller - @ em - metodo acessado')
$router->get('/', 'HomeController@index'); //read

$router->get('/novo', 'UsuariosController@add');
$router->post('/novo', 'UsuariosController@addAction');

//rotas botoes
$router->get('/usuario/{id}/editar', 'UsuariosController@edit');
$router->post('/usuario/{id}/editar', 'UsuariosController@editAction');

$router->get('/usuario/{id}/excluir', 'UsuariosController@del');

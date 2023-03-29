<?php

use core\Router;

$router = new Router();


//metodo get ('rota - barra simplesmente acessa o site', 'nome da classe do controller - @ em - metodo acessado')
$router->get('/', 'HomeController@index');

$router->get('/novo', 'UsuariosController@add');
$router->post('/novo', 'UsuariosController@addAction');

<?php
use core\Router;

$router = new Router();


//metodo get ('rota - barra simplesmente acessa o site', 'nome da classe do controller - @ - metodo acessado')
$router->get('/', 'HomeController@index');

$router->get('/fotos', 'HomeController@fotos');
$router->get('/foto/{id}', 'HomeController@foto');

$router->get('/sobre/{nome}', 'HomeController@sobreP');
$router->get('/sobre', 'HomeController@sobre');

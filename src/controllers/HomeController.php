<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Usuario;

class HomeController extends Controller {

    public function index() {
        $usuarios = Usuario::select(['id', 'nome', 'email'])->execute();

        $this->render('home', [
            'usuarios' => $usuarios
        ]);
    }

}
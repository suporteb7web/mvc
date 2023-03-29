<?php
namespace src\controllers;

use \core\Controller;

class HomeController extends Controller {

    public function index() {
        $nome = 'Elias';

        $this->render('home', ['nome'=>$nome, 'idade'=>24]);
    }

    public function fotos(){
        $this->render('fotos');
    }

    public function foto($parametros){
        echo "Acessando a foto: ".$parametros['id'];
    }

    public function sobre() {
        $this->render('sobre');
    }

    public function sobreP($args) {
        print_r($args);
    }

}
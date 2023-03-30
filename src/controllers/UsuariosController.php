<?php

namespace src\controllers;

use \core\Controller;
use \src\models\Usuario;

class UsuariosController extends Controller
{

    public function add(){
        $this->render('add');
    }

    public function addAction(){
        $name = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email');

        //usuario requerido la em cima
        if ($name && $email) {
            $data = Usuario::select()->where('email', $email)->execute();

            //verificacao inversa, se nao achou, aí insere
            if (count($data) === 0) {
                Usuario::insert([
                    'nome' => $name,
                    'email' => $email,
                ])->execute();
                //recirect to home => / 
                $this->redirect('/');
            }
        }
        $this->redirect('/novo');
    }

    public function edit($args){
        $usuario = Usuario::select()->find($args['id']);
        /* OUTROs MODOS
        ::select()->where('id', $args['id'])->one()
        substituir one por first
        */
        $this->render('edit', ['usuario'=>$usuario]);
    }

    public function editAction($args){
        $name = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email');

        if ($name && $email) {
            Usuario::update()
                ->set('nome', $name) //info a ser mudada
                ->set('email', $email) 
                ->where('id', $args['id']) //onde mudar
            ->execute();

            $this->redirect('/');
        }

        $this->redirect('/usuario/'.$args.['id'].'/editar');

    }

    public function del($args){
    }
}

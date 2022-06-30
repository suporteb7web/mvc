<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\LoginHandler;

class LoginController extends Controller {

    public function signin(){
        $flash = '';
        if(!empty($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        $this->render('login', [
            'flash' => $flash
        ]);
            
    }

    public function signinAction(){
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'passoword');
    
        if($email && $password){
            $token = LoginHandler::verifyLogin($email, $password);
            if($token) {
                $_SESSION['token'] = $token;
                $this->redirect('/');
            } else {
                $_SESSION['flash'] = 'E-mail e/ou senha não conferem.';
                $this->redirect('/login');
            }
        } else {
            $this->redirect('/login');
        }
    }

    public function signup(){
        echo 'cadastro';
    }

}
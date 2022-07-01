<?php
namespace src\handlers;
use \src\models\User;

class LoginHandler {

    public static function checkLogin(){
        //Se existir e não tiver vazia
        if(!empty($_SESSION['token'])) {
            $token = $_SESSION['token'];
            
            // Dados enviados para o token 
            $data = User::select()->where('token', $token)->execute();
            // Se achou os dados vai retornar 
            if(count($data) > 0 ){

                $loggerUser = new User();
                $loggerUser->id = $data['id'];
                $loggerUser->email = $data['email'];
                $loggerUser->name = $data['name'];
               
                return $loggerUser;

            } 

        } 

        return false;
    }

    public static function verifyLogin($email, $password) {
        $user = User::select()->where('email', $email)->one();
        if($user){
           if(password_verify($password, $user['password'])) {
                $token = md5(time().rand(0,9999).time());
                
                User::update()
                    ->set('token', $token)
                    ->where('email', $email)
                ->execute();

                return $token;
           }
        }


        return false;
    }

    public static function emailExists($email){
        $user = User::select()->where('email', $email)->one();
        return $user ? true : false;
    }

    public static function addUser($name, $email, $password, $birthdate){
        //Pega o hash da senha 
        $hash = password_hash($password, PASSWORD_DEFAULT);
        //Pega o token
        $token =   md5(time().rand(0,9999).time());
        
        //Gera o usuario 
        User::insert([
            'email' => $email,
            'password' => $hash,
            'name' => $name,
            'birtdate' => $birthdate,
            'token' => $token
        ])->execute();
        
        // E retorna o token de volta
        return $token;
    }
}
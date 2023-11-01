<?php

namespace src\handlers;

use src\models\User;

class LoginHandler
{
    public static function checkLogin()
    {
        if (!empty($_SESSION['token'])) {
            $token = $_SESSION['token'];

            $data = User::select()->where("token", $token)->get();
            $data = isset($data[0]) ? $data[0] : null;

            if (count($data) > 0) {

                $loggedUser        = new User();
                $loggedUser->id    = $data['id'];
                $loggedUser->email = $data['email'];
                $loggedUser->name  = $data['name'];

                return $loggedUser;
            }
        }

        return false;
    }

    public static function veryfiLogin($email, $password)
    {
        $user = User::select()->where("email", $email)->get();
        $user = isset($user[0]) ? $user[0] : null;
        
        if ($user) {
            if (password_verify($password, $user["password"])) {
                $token = md5(time() . rand(0, 9999) . time());

                User::update()
                    ->set("token", $token)
                    ->where("email", $email)
                    ->execute();

                return $token;
            }
        }

        return false;
    }
}

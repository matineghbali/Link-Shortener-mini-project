<?php namespace App\Helper;


use App\Contracts\AuthInterfacce;
use App\Model\Users;

class Auth implements AuthInterfacce
{

    /**
     * @param $user
     * @param bool $remember
     * @return mixed
     */
    public static function login($user)
    {
        session()->set('email' , $user->email);
        return true;
    }

    /**
     * @return mixed
     */
    public static function check()
    {
        if(session('email')) {
            $user = (new Users())->find('email' , session('email'));
            if($user)
                return true;
            session()->forget('email');
        }

        return false;
    }

    /**
     * @return mixed
     */
    public static function logout()
    {
        session_destroy();
        echo "Logout Successful.";
        exit();
    }

    /**
     * @return mixed
     */
    public static function user()
    {
        return (new Users())->find('email' , session('email'));
    }
}
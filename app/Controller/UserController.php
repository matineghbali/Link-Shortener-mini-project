<?php namespace App\Controller;

use App\Helper\Auth;
use App\Model\Users;
use Carbon\Carbon;

class UserController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        if(checkLogin())
            redirect();
    }

    public function register()
    {
        if(! request()->isPost()){
            echo "Route must be Post request." ;
            exit;
        }

        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:20',
            'confirm_password' => 'confirm:password'
        ];

        if(! $this->validation(request()->all() , $rules)) {
            exit;
        }

        $success = (new Users())->create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => md5(request('password')),
            'created_at' => Carbon::now()
        ]);

        echo 'Registered.';

//        redirect();
        exit;
    }
    public function login()
    {
        if(! request()->isPost()){
            echo "Route must be Post request." ;
            exit;
        }

        $rules = [
            'email' => 'required|email',
            'password' => 'required|min:6|max:20',
        ];

        if(! $this->validation(request()->all() , $rules)) {
            exit;
        }

        $user = (new Users())->find('email',request('email'));

        if(!$user) {
            echo 'Email not exist.';
            exit;
        }

        $login = md5(request('password')) == $user->password ;

        if(!$login) {
            echo 'Wrong password.';
            exit;
        }

        Auth::login($user );

        echo 'logged in';
//        redirect();
        exit;
    }
}
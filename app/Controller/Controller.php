<?php namespace App\Controller;

use App\Helper\Validation;
use Plasticbrain\FlashMessages\FlashMessages;

class Controller
{

    public function __construct()
    {
    }

    public function validation($data , $rules)
    {
        $validation = new Validation();

        $valid = $validation->make($data , $rules);

        if(! $valid) {
            foreach ($validation->getErrors() as $error) {
                echo $error[0] . ", ";
            }
            return false;
        }

        return true;
    }
}
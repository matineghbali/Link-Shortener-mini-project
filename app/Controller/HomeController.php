<?php namespace App\Controller;

use App\Model\Link;
use App\Model\DB;
use App\Model\Users;

class HomeController {

    public function index()
    {
        echo "Home Page";
        exit;
    }

    public function shortener()
    {
        if(empty(request('link'))){
            echo "please enter link parameter";
            exit();
        }

        if (file_exists("public/cache/".request('link').".txt"))
        {
            $myfile = fopen("public/cache/".request('link').".txt", "r")
            or die("Unable to open file!");

            $long_link = fread($myfile, 200);
            fclose($myfile);
        }
        else
        {
            $link= (new Link())->find('short_link',request('link'));
            if (!$link)
            {
                echo "link not exist";
                exit();
            }
            $myfile = fopen("public/cache/".request('link'). ".txt", "w");
            $long_link=$link->long_link;
            fwrite($myfile, $long_link);
            fclose($myfile);
        }

        externalRedirect($long_link);


    }
}
<?php namespace App\Controller\Admin;


use App\Helper\Auth;
use App\Model\Link;
use Carbon\Carbon;
use function Composer\Autoload\includeFile;

class LinkController extends AdminController
{
    public function list()
    {
        $links =(new Link())->select('id' , 'long_link' , 'short_link')->get();
        echo json_encode($links);
        exit;
    }


    public function create()
    {
        if(!request()->isPost()){
            echo "Route must be Post request." ;
            exit;
        }

        $rules = [
            'long_link' => 'required|unique:links',
        ];

        if(! $this->validation(request()->all() , $rules)) {
            exit;
        }

        $short_link_param = random(8);

        for ($i=0;$i<=5;$i++)
        {
            $link = (new Link())->find('short_link',$short_link_param);
            if($link)
                $short_link_param = random(8);
            else
                break;
        }

        (new Link())->create([
            'long_link' => request('long_link'),
            'short_link' => $short_link_param,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);

        echo "Link inserted, address link is: http://localhost:8000/shortener.php?link=$short_link_param";
        exit();
    }

    public function delete()
    {
        if(empty(request('id'))){
            echo "please enter id parameter";
            exit();
        }

        (new Link())->delete(request('id'));
        echo "deleted";
        exit();
    }

    public function update()
    {
        if(empty(request('id'))){
            echo "please enter id parameter";
            exit();
        }

        $rules = [
            'long_link' => 'required',
            'short_link' => 'required'
        ];

        if(! $this->validation(request()->all() , $rules)) {
            exit;
        }

        (new Link())->update(request('id') , [
            'long_link' => request('long_link'),
            'short_link' => request('short_link')
        ]);

        echo "updated";
        exit();
    }
}
<?php
    include __DIR__ . '/../../bootstrap/autoload.php';

    (new \App\Controller\Admin\LinkController())->update(request()->input('id' , false));
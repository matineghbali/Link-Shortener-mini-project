<?php

include __DIR__ . "./../bootstrap/autoload.php";
$user = new \App\Controller\UserController();
$user->register();
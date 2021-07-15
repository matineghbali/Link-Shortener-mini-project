<?php
/**
 * Created by PhpStorm.
 * User: roocket
 * Date: 4/13/2017
 * Time: 2:13 PM
 */

namespace App\Contracts;


interface AuthInterfacce
{
    /**
     * @param $user
     * @param bool $remember
     * @return mixed
     */
    public static function login($user);

    /**
     * @return mixed
     */
    public static function check();

    /**
     * @return mixed
     */
    public static function logout();

    /**
     * @return mixed
     */
    public static function user();
}
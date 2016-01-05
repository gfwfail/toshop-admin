<?php
namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Created by PhpStorm.
 * User: luye
 * Date: 16/1/3
 * Time: 下午12:45
 */
class Account extends Facade
{
    protected static function getFacadeAccessor() { return 'AccountService'; }

}
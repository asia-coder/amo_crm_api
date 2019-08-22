<?php
/**
 * Created by PhpStorm.
 * User: dilshod
 * Date: 22.08.19
 * Time: 9:58
 */

namespace App\Controllers;

abstract class Controller
{
    public function getTemplatePath(string $path = 'layout')
    {
        return APP_DIR . '/templates/' . $path . '.phtml';
    }
}

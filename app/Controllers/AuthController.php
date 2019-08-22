<?php
/**
 * Created by PhpStorm.
 * User: dilshod
 * Date: 22.08.19
 * Time: 14:03
 */

namespace App\Controllers;


use Klein\Request;
use Klein\Response;
use Klein\ServiceProvider as Service;

class AuthController extends Controller
{
    public function login(Request $request, Response $response, Service $service)
    {

        $service->render($this->getTemplatePath('home'));
    }
}

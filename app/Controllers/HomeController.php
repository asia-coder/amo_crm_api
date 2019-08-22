<?php
/**
 * Created by PhpStorm.
 * User: dilshod
 * Date: 22.08.19
 * Time: 10:01
 */

namespace App\Controllers;


use App\Services\AmoCRMService;
use Klein\Request;
use Klein\Response;
use Klein\ServiceProvider as Service;

class HomeController extends Controller
{
    public function index(Request $request, Response $response, Service $service)
    {

        try {
            $crm = new AmoCRMService();
            echo "<pre>";
            print_r($crm->getLastLeads());
        } catch (\Exception $e) {
            exit($e);
        }

        $service->title = "Home";
        $service->template = "home";
        $service->render($this->getTemplatePath());
    }
}

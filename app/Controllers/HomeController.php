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
        $leads = [];

        try {
            $crm = new AmoCRMService();
            /*echo "<pre>";
            print_r($crm->getLastLeads());*/
            $leads = $crm->getLastLeads();
        } catch (\Exception $e) {
            exit($e);
        }

        $service->title = "Последые сделки";
        $service->last_leads = $leads;
        $service->template = "home";
        $service->render($this->getTemplatePath());
    }
}

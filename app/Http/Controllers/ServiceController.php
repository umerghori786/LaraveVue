<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PaymentService;

class ServiceController extends Controller
{
    /**
     * service container prectice
    */
    protected $service;

    /*public function __construct(PaymentService $service)
    {
        $this->service = $service;
    }*/
    public function index(PaymentService $service)
    {
        //(new PaymentService)->doPayment();

        //$this->service->doPayment();
        //$service->doPayment();

        app('PaymentServiceContainer')->doPayment();

    }
    /**
     * display a specific resource
     * 
     */
    public function service()
    {
        //(new PaymentService)->doPayment();
        //$this->service->doPayment();
        app('PaymentServiceContainerTest')->doPayment();
    }
}

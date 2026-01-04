<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PaymentService;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

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
    public function cache()
    {   
        $users = cache::remember('users',120,function(){

            return User::all();
        });

        //Cache::flush();
        dd(Cache::get('users'));
        
        return view('cache.index',compact('users'));
    }
}

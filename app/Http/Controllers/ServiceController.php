<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PaymentService;
use App\Models\Product;
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
        //dd(optional(Cache::get('products'))->toArray());

        /*$products = cache::remember('products',120,function(){

            return Product::latest()->get();
        });*/
        $products = cache::rememberForever('products',function(){

            return Product::latest()->get();
        });

        //Cache::flush();
        dd(Cache::getStore());

        
        return view('cache.index',compact('products'));
    }
}

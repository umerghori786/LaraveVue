<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\services\PaymentService;
use App\Models\Product;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;

class ServiceController extends Controller
{
    /**
     * service container prectice
    */
    protected $service;

    public function __construct(PaymentService $service)
    {   
        $this->service = $service;
    }
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

        //gate
        /*if(!Gate::allows('product-delete', Product::first()))
        {
            abort(403);
        }*/
        //policies
        //$this->authorize('view',Product::first());

        $products = cache::rememberForever('products',function(){

            return Product::latest()->get();
        });

        //Cache::flush();
        dd(Cache::getStore());

        
        return view('cache.index',compact('products'));
    }
    public function testService(PaymentService $service)
    {
        (new PaymentService())->doPayment();
        $service->doPayment();
        $obj = new PaymentService();
        $obj->doPayment();
        $this->service->doPayment();
        app('PaymentServiceContainer')->doPayment();
    }
}

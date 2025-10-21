<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Closure;
use Illuminate\Support\Facades\Pipeline;
use App\Pipelines\ActivePipeLine;
use App\Pipelines\FilterPipeLine;

class PrecController extends Controller
{
    /**
     * show specific resource
     * 
     *return \Illuminate\Http\Response 
     */
    public function index(Request $request)
    {
        $products = Product::query();
        
        $products = Pipeline::send($products)

                  ->through([
                        new ActivePipeLine($request->status),
                        new FilterPipeLine($request->search)
                        

                  ])
                  ->thenReturn()
                  ->get();

        dd($products);          

    }
}

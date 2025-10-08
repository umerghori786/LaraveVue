<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $products = Product::latest()->paginate(10);

        if($request->ajax())
        {
            $view = view('product.data',compact('products'))->render();

            return response()->json(['html'=>$view],200);
        }
        
        return view('product.index',compact('products'));
    }
}

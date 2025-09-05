<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactUsController extends Controller
{
    /**
     * store specific resource in table
     * 
     * @params \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Resourse json
     */
    public function store(Request $request)
    {
        //Contact::create($request->all());

        $data = ['msg'=>'success'];

        return response()->json($data);
    }
}

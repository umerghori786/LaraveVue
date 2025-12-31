<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use App\imports\UsersImport;
use App\Jobs\ExcelImportUserJob;
use Illuminate\Support\Facades\Storage;

class ExcelController extends Controller
{
    public function export()
    {

        return Excel::download(new UsersExport, 'users.xlsx');
    }
    public function import()
    {   
        $users = User::get();
        return view('excel.import',compact('users'));
    }

    public function importSheet() 
    {   
        //Excel::import(new UsersImport,request()->file('file'));
        $path = request()->file('file')->store('imports', 'local');
        ExcelImportUserJob::dispatch($path);


        
        return back();

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use App\imports\UsersImport;
use App\Jobs\ExcelImportUserJob;
use App\Jobs\SendEmailJob;


class ExcelController extends Controller
{
    public function export()
    {

        return Excel::download(new UsersExport, 'users.xlsx');
    }
    public function import()
    {   
        $users = User::get();
        SendEmailJob::dispatch(User::first());
        return view('excel.import',compact('users'));
    }

    public function importSheet() 
    {   
        //Excel::import(new UsersImport,request()->file('file'));
        $path = request()->file('file')->store('imports', 'local');
        ExcelImportUserJob::dispatch($path);

        //send email using job 
        /*User::all()->each(function($user) {
            SendEmailJob::dispatch($user);
        });*/
        SendEmailJob::dispatch(User::first());
        
        return back();

    }
}

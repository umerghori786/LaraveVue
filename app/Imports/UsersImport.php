<?php

  

namespace App\Imports;

  

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Hash;
use Maatwebsite\Excel\Concerns\WithUpserts;
  

class UsersImport implements ToModel, WithHeadingRow, WithUpserts

{

    /**

    * @param array $row

    *

    * @return \Illuminate\Database\Eloquent\Model|null

    */

    public function model(array $row)
    {
        
        return new User([

            'name'     => $row['name'],
            'email'    => $row['email'], 
            'password' => Hash::make('password'),

        ]);
    }
    
    public function uniqueBy()
    {
        return 'email';
    }

}
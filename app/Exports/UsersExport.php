<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    // Get the data for export
    public function collection()
    {
        return User::select('id', 'name', 'email')->get();
    }

    // Add headings to your Excel
    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Email',
        ];
    }
}

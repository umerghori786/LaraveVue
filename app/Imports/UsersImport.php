<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Contracts\Queue\ShouldQueue;

class UsersImport implements ToModel, WithHeadingRow, WithUpserts, WithChunkReading
{
    /**
     * @param array $row
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

    /**
     * Column used for upsert (avoid duplicate entries)
     */
    public function uniqueBy()
    {
        return 'email';
    }

    /**
     * Number of rows processed at a time
     */
    public function chunkSize(): int
    {
        return 10; 
    }
}

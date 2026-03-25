<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class ExcelImportUserJob implements ShouldQueue
{
    use Queueable;

    protected $filepath;
    /**
     * Create a new job instance.
     */
    public function __construct($filepath)
    {
        $this->filepath = $filepath;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Excel::import(new UsersImport,Storage::disk('local')->path($this->filepath));

        Storage::disk('local')->delete($this->filepath);
    }
}

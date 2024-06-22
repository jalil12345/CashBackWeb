<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Company;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Log;

class AwinCommand extends Command
{
    
    protected $signature = 'fetch:Awin-data';
    protected $description = 'Command description';

    public function __construct()
    {
        parent::__construct();
    }
    
    public function handle()
    {
        
    }
}

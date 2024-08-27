<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Coupon; 
use Carbon\Carbon;

class DeleteOldCoupons extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'coupons:delete-old';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete coupons that are older than one year past their expiration date';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $oneYearAgo = Carbon::now()->subYear();

        // Assuming 'expire' is a date field in your coupons table
        Coupon::where('expire', '<', $oneYearAgo)->delete();

        $this->info('Old expired coupons have been deleted.');
        return 0;
    }
}

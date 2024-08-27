<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
          $schedule->command('event:listen');
    }
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function scheduleCjData(Schedule $schedule)
    {
        $schedule->command('fetch:cj-data'); 
        //  ->daily()
    }
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function scheduleAwinData(Schedule $schedule)
    {
        $schedule->command('fetch:Awin-data'); 
        //  ->daily()
    }
    protected function scheduleImpactData(Schedule $schedule)
    {
        $schedule->command('fetch:impact-data')->daily();
    }
    protected function deleteOldCoupons(Schedule $schedule)
    {
        // Schedule the command to run daily
        $schedule->command('coupons:delete-old')->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
    

}

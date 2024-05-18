<?php

namespace App\Listeners;

use App\Events\SubCategoryCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Company;
use Illuminate\Support\Facades\Log;

class UpdateCompanyRateOnSubCategoryCreate implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SubCategoryCreated  $event
     * @return void
     */
    public function handle(SubCategoryCreated $event)
    {
        Log::info('SubCategoryCreated event triggered.');
        $company = $event->subCategory->company;
        $company->rate = $company->highestSubRate();
        $company->save();
    }
}

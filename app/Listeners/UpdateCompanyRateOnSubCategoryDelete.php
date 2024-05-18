<?php

// UpdateCompanyRateOnSubCategoryDelete.php

namespace App\Listeners;

use App\Events\SubCategoryDeleted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Company;
use Illuminate\Support\Facades\Log;

class UpdateCompanyRateOnSubCategoryDelete
{
    public function handle(SubCategoryDeleted $event)
    {
        Log::info('SubCategoryCreated event triggered.');
        $company = $event->subCategory->company;
        $company->rate = $company->highestSubRate();
        $company->save();
    }
}

<?php
// UpdateCompanyRateOnSubCategoryUpdate.php

namespace App\Listeners;

use App\Events\SubCategoryUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Company;

class UpdateCompanyRateOnSubCategoryUpdate
{
    public function handle(SubCategoryUpdated $event)
    {
        $company = $event->subCategory->company;
        $company->rate = $company->highestSubRate();
        $company->save();
    }
}

<?php

namespace App\Events;

use App\Models\SubCategory;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SubCategoryDeleted
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $subCategory;

    public function __construct(SubCategory $subCategory)
    {
        $this->subCategory = $subCategory;
    }
}

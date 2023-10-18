<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cache;
use App\Models\Company; 

class LastModifiedMiddleware
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        // Fetch the most recently updated company
        $latestCompany = Company::orderBy('updated_at', 'desc')->first();

        // Set the Last-Modified header based on the latest company's update time.
        $lastModified = $latestCompany && $latestCompany->updated_at 
                ? $latestCompany->updated_at->toRfc7231String() 
                : now()->toRfc7231String();

        $response->header('Last-Modified', $lastModified);

        // Compare with the If-Modified-Since request header.
        $ifModifiedSince = $request->header('If-Modified-Since');
        if ($ifModifiedSince && strtotime($ifModifiedSince) >= strtotime($lastModified)) {
            $response->setStatusCode(304);
            $response->setContent(null);
        }

        return $response;
    }
}


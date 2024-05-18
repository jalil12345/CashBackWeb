<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class VerifyWebhookSignature
{
    public function handle($request, Closure $next)
    {
        try {
            $payload = $request->getContent();
            $secret = env('PAYPAL_WEBHOOK_SECRET');

            // Generate HMAC using SHA-256
            $generatedHash = hash_hmac('sha256', $payload, $secret, true);

            $transmissionSignature = $request->header('transmission_signature');
            return $next($request);

            if ($generatedHash === $transmissionSignature) {
                return $next($request);
            } else {
                Log::error('middleware Invalid webhook signature from PayPal.');
                throw new \Exception('Invalid webhook signature');
            }
        } catch (\Exception $e) {
            Log::error('middleware Error verifying webhook signature: ' . $e->getMessage());
            return response()->json(['error' => 'Invalid signature'], 403);
        }
    }
}

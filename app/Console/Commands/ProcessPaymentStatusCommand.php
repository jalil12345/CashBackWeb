<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use App\Events\PaymentCreated;
use App\Models\Payment;
class ProcessPaymentStatusCommand extends Command
{
    protected $signature = 'event:listen';
    
    protected $description = 'Execute the ProcessPaymentStatus event listener';

    public function handle()
    {
        // Log a message indicating that the command is being executed
        Log::info('Command is being executed.');

        // You likely need to retrieve a Payment instance here (replace with your logic)
        $payment = Payment::where('status', 'PENDING')->first(); 

        // Dispatch the PaymentCreated event with the Payment instance
        if ($payment) { 
            PaymentCreated::dispatch($payment);
        } else {
            Log::info('Command No pending payments found to trigger PaymentCreated event.');
        }

        // Log a message indicating that the command has finished executing
        Log::info('Command execution completed.');
    }
}

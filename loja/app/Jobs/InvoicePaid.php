<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvoicePaidMail;

class InvoicePaid implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(private Order $order)
    {

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $user = $this->order->user;

        Mail::to($user)->send(new InvoicePaidMail($this->order, $user));
    }
}

<?php

namespace App\Console\Commands;

use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CompleteOnCheckOut extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:complete_checkout';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Completing checkout status';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Booking::where('checkout', 'LIKE', '%' .  Carbon::now()->format('M/d/Y') .  '%')->update([
            'booking_status' => 'Complete',
            'completed_at' => Carbon::now(),
        ]);

        $this->info('Completing checkout status!');
    }
}

<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Poll;


class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
//         Commands\Inspire::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
//        Log::info('This is some useful information.');
//        $polls = Poll::get();
//        $polls = Poll::where('status', 'opened')->
//        orderBy('created_at', 'desc')->get();
//        Log::info($polls);

        $schedule->call(function () {
        $polls = Poll::where('status', 'opened')->
        orderBy('created_at', 'desc')->get();

            Log::info("Yes crons are working");
        });
    }
}

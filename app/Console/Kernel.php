<?php

namespace App\Console;

use App\Jobs\OrdersExpire;
use App\Jobs\OrdersRefund;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->job(new OrdersRefund())->everyFiveMinutes();

        $schedule->job(new OrdersExpire())->everyFiveMinutes();

        // $schedule->call(function () {
        //     Log::channel("database")->info("Scheduler attivo");
        // })->everyMinute()->emailOutputTo('emanuele@atrio.it');

        $schedule->command('queue:work --queue=orders,default --tries=3 --stop-when-empty')->withoutOverlapping()->everyMinute();

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}

<?php

namespace App\Listeners;

use App\Events\ClientCreated;
use App\Jobs\SaveClientDataToCSV;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class LogToLogEntries implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, SerializesModels;

    /**
     * The name of the queue the job should be sent to.
     *
     * @var string|null
     */
    public $queue = 'logentries';

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param ClientCreated $event
     *
     * @return void
     */
    public function handle(ClientCreated $event)
    {
        $client = $event->client;
        $file = $event->file;
        SaveClientDataToCSV::dispatch($file, $client);
        Log::info('A New Client Created : '.$client['first_name']);
    }
}

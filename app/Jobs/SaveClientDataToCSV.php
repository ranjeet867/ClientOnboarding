<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;
use File;
use League\Csv\Writer;

class SaveClientDataToCSV implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $client;
    protected $file;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($file, $client)
    {
        $this->client = $client;
        $this->file = $file;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Log::info('A New Client Created 2');
        $checkFile = File::exists($this->file);

        // To capitalize the first character
        $formatter = function (array $row): array {
            return array_map('ucfirst', $row);
        };

        $writer = Writer::createFromPath($this->file, 'a');
        $writer->addFormatter($formatter);

        if (!$checkFile) {
            $writer->insertOne(['First Name', 'Last Name', 'DOB', 'Mobile', 'E-mail', 'Nationality', 'Address', 'Gender', 'Country',
                'City', 'State', 'Zip', 'Education',]); //Inserting Header
        }

        $data = $writer->insertOne($this->client);

    }

}

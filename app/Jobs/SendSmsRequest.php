<?php

namespace App\Jobs;

use RuntimeException;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Http;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendSmsRequest implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $validatedData;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($validatedData)
    {
        $this->validatedData = $validatedData;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $response = Http::post('https://jsonplaceholder.typicode.com/posts', [
            'title' => $this->validatedData['title'],
            'body' => $this->validatedData['body'],
        ]);
        
        if ($response->failed()) {

            //now()->addSeconds(15 * $this->attempts());
            // The attempts() method returns the number of times the job
            // has been attempted. If it's the first run, attempts() will return 1.

            throw new RuntimeException("Failed to connect ", $response->status());
        }
    }
}

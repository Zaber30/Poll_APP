<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Testing\Fluent\Concerns\Interaction;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendWelcomEmailJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public $name;
    public $email;
    public function __construct($name,$email)
    {
        $this->name=$name;
        $this->email=$email;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //Log::info("Queued Job: sending welcome email to {$this->email}");
        $subject="Welcome to Our main Application!";
        $message="<h1>hello {$this->name}</h1>
        <p>Welcome to our application nice </p>
        ";
        Mail::send([], [], function ($mail) use($subject,$message){
        
            $mail->to($this->email)
            ->subject($subject)
            ->html($message);
        });
    }
}

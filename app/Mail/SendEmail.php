<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('sender@mahasiswa.com')
            ->view('myemail')
            ->with(
                [
                    'name' => 'Michelle',
                ])
            ->attach(public_path('\mahasiswa.csv'), [
                'as' => 'mahasiswa.csv',
                'mime' => 'text/csv',
            ]);
    }
}

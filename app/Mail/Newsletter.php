<?php

namespace Savva\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use Savva\Url;
use Carbon\Carbon;

class Newsletter extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $items;

    public function __construct()
    {
        $this->items=Url::get()->where('updated_at','>',Carbon::now()->subWeek());
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.newsletter');
    }
}

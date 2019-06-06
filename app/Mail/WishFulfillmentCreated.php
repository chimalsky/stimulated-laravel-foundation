<?php

namespace App\Mail;

use App\Fulfillment;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WishFulfillmentCreated extends Mailable implements ShouldQueue 
{
    use Queueable, SerializesModels;

    public $fulfillment;

    /**
     * Create a new message instance.
     *
     * @param App\Fulfillment $fulfillment
     * @return void
     */
    public function __construct(Fulfillment $fulfillment)
    {
        $this->fulfillment = $fulfillment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->fulfillment->wish->title)
            ->view('emails.wish.fulfillment.created');
    }
}

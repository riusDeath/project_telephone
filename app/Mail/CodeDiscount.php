<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CodeDiscount extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $code_discount;

    public function __construct($code_discount)
    {
        $this->code_discount = $code_discount;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('vuthithuy10197@gmail.com')
                    ->view('email.user.discount_code')
                    ->with([
                        'code_discount' => $this->code_discount,
                    ]);
    }
}

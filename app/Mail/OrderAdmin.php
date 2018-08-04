<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderAdmin extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $order;
    protected $cart;


    public function __construct($order, $cart)
    {
        $this->order = $order;
        $this->cart = $cart;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('vuthithuy10197@gmail.com')
                    ->view('email.admin.checkOrder')
                    ->with([
                        'order' => $this->order,
                        'cart' => $this->cart,
                    ]);
    }
}

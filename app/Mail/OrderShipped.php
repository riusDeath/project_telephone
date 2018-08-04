<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    protected $order;
    protected $cart;
    
    public function __construct($order, $cart)
    {
        $this->order = $order;
        $this->cart = $cart;
    }

    
    public function build()
    {
        return $this->from('vuthithuy10197@gmail.com')
                    ->view('email.user.checkOrder')
                    ->with([
                        'order' => $this->order, 
                        'cart' => $this->cart,
                    ]);
    }
}

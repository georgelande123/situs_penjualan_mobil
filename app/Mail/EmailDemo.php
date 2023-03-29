<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailDemo extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($buyer)
    {
        //

        // $this->mailData = $data['mailData'];
        $this->nama_pembeli=$buyer->nama_pembeli;
        $this->email_pembeli=$buyer->email_pembeli;
        $this->no_hp=$buyer->no_hp;
        $this->nama_mobil=$buyer->stock->nama_mobil;
        $this->jumlah_mobil=$buyer->jumlah_mobil;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('Email.demoEmail')
                    ->with('nama_pembeli', $this->nama_pembeli)
                    ->with('email_pembeli', $this->email_pembeli)
                    ->with('no_hp', $this->no_hp)
                    ->with('nama_mobil', $this->nama_mobil)
                    ->with('jumlah_mobil', $this->jumlah_mobil);
    }
}

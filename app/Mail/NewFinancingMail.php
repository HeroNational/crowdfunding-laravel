<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewFinancingMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $projet=null;
    private $montant=null;
    private $user=null;

    public function __construct($projet,$montant,$user)
    {
        $this->projet=$projet;
        $this->montant=$montant;
        $this->user=$user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from("crowdcollect@crowdcollect.com")
                    ->subject('Nouveau projet financé sur la plateforme')
                    //->attach(Storage::url($this->projet->image))
                    //->attach(public_path(Storage::path($this->projet->user->avatar)))
                    ->view('emails.financing',["projet"=>$this->projet,"montant"=>$this->montant,"user"=>$this->user]);
    }
}

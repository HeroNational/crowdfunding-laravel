<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewProjectMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $projet=null;
    public function __construct($projet)
    {
        $this->projet=$projet;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from("crowdcollect@crowdcollect.com")
                    ->subject('Nouveau projet soumis sur la plateforme')
                    //->attach(Storage::url($this->projet->image))
                    //->attach(public_path(Storage::path($this->projet->user->avatar)))
                    ->view('emails.projet',["projetinfo"=>$this->projet]);
    }
}

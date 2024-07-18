<?php

namespace App\Mail;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use App\Models\Company;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $contact;

    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    public function build()
    {
        $company = Company::find($this->contact->company_id);

        return $this->view('admin.emails.contact', [
            'contact' => $this->contact,
            'company_name'=> $company->name
        ])->subject('Quick Discussion!');
    }
}
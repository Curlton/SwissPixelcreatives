<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactForm extends Component
{
    // Added new fields from the mirrored HTML
    public $name = '';
    public $company = '';
    public $phone = '';
    public $email = '';
    public $country = '';
    public $message = 'What can we do for you ?'; // Default text from original
    public $successMessage = '';

    protected $rules = [
        'name' => 'required|min:3',
        'company' => 'required',
        'phone' => 'required',
        'email' => 'required|email',
        'country' => 'required',
        'message' => 'required|min:10',
    ];

    public function submit()
    {
        $data = $this->validate();

        try {
            // Sends all fields (name, company, phone, email, country, message)
            Mail::to('ssenonotonny8@gmail.com')->send(new ContactFormMail($data));

            $this->reset(['name', 'company', 'phone', 'email', 'country', 'message']);
            $this->successMessage = 'Thank you! Your message has been sent successfully.';
        } catch (\Exception $e) {
            Log::error("Mail error: " . $e->getMessage());
            session()->flash('error', 'Could not send email. Please try again later.');
        }
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}

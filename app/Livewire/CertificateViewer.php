<?php
namespace App\Livewire;

use Livewire\Component;

class CertificateViewer extends Component
{
    public $showViewer = false;
    public $certificateUrl;

    public function toggleView()
    {
        $this->showViewer = !$this->showViewer;
        
        // Point to the secure route created in Step 1
        if ($this->showViewer) {
            $this->certificateUrl = route('certificate.view', ['filename' => 'company_cert.pdf']);
        }
    }

    public function render()
    {
        return view('livewire.certificate-viewer')
             ->layout('components.layouts.site');
    }
}

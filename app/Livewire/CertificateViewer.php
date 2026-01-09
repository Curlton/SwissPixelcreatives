<?php

namespace App\Livewire;
use Livewire\Attributes\Title;
use Livewire\Component;

class CertificateViewer extends Component
{
    #[Title('CertificateViewer')]
    public $showViewer = false;
    public $certificateUrl;

    public function mount()
    {
        // Pre-set the route so the iframe is ready to load immediately on click
        $this->certificateUrl = route('certificate.view', ['filename' => 'company_cert.pdf']);
    }

    public function toggleView()
    {
        $this->showViewer = !$this->showViewer;
    }

    public function render()
    {
        return view('livewire.certificate-viewer')
             ->layout('components.layouts.site');
    }
}
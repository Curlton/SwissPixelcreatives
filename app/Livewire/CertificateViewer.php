<?php
namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Locked; // Recommended for 2026

class CertificateViewer extends Component
{
    #[Title('Certificate Viewer')]
    public $showViewer = false;

    #[Locked] // Prevents front-end manipulation of the URL
    public $certificateUrl;

    public function mount()
    {
        // Fix: Use 'certificate' as the key to match your Route definition
        $this->certificateUrl = route('certificate.view', ['certificate' => 'certificate.pdf']);
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

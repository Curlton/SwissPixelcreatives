<?php

namespace App\Livewire;
use Livewire\Attributes\Title;
use Livewire\Component;

class Faqs extends Component
{
    #[Title('Faqs')]
    public $faqs = [
        [
            'question' => 'How do I start the optimization process?',
            'answer' => 'Simply click the "Drive Now" button on your dashboard. Ensure your balance is positive to begin a new set of tasks.'
        ],
        [
            'question' => 'What happens if I encounter a merged product?',
            'answer' => 'Merged products are special high-value tasks. If your balance becomes negative, you must clear the difference to complete the set and withdraw your earnings.'
        ],
        [
            'question' => 'When can I withdraw my profits?',
            'answer' => 'Withdrawals are available once you complete the required number of tasks in your current set. Processing usually takes 1-24 hours.'
        ],
    ];

    public function render()
    {
        return view('livewire.faqs')
            ->layout('components.layouts.site');
    }
}


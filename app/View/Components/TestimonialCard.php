<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TestimonialCard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $customerProfile,
        public string $customerName,
        public string $message,
        public int $stars,
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.testimonial-card');
    }
}

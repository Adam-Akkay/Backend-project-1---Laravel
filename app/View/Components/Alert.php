<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Alert extends Component
{
    /**
     * The alert type (success, error, warning, info)
     */
    public string $type;

    /**
     * The alert message
     */
    public string $message;

    /**
     * Create a new component instance.
     */
    public function __construct(string $type = 'info', string $message = '')
    {
        $this->type = $type;
        $this->message = $message;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.alert');
    }

    /**
     * Get the CSS classes for the alert based on type
     */
    public function getClasses(): string
    {
        return match($this->type) {
            'success' => 'bg-green-100 border-green-400 text-green-700',
            'error' => 'bg-red-100 border-red-400 text-red-700',
            'warning' => 'bg-yellow-100 border-yellow-400 text-yellow-700',
            'info' => 'bg-blue-100 border-blue-400 text-blue-700',
            default => 'bg-gray-100 border-gray-400 text-gray-700',
        };
    }
}

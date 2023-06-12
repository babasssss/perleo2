<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SelectEtatArticle extends Component
{
    public $etatArticles;

    /**
     * Create a new component instance.
     */
    public function __construct($etatArticles)
    {
        $this->etatArticles = $etatArticles;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.select-etat-article');
    }
}

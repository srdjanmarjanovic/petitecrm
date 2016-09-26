<?php

namespace App\Http\ViewComposers;
use App\Company;
use Illuminate\View\View;

class AllCompanies
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with(['companies' => Company::all()]);
    }
}
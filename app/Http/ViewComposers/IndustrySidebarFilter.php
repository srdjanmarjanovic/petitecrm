<?php
namespace App\Http\ViewComposers;

use App\Company;
use App\Industry;
use Illuminate\View\View;
/**
* Industry sidebar filter.
*/
class IndustrySidebarFilter
{
	/**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $industries = Industry::has('companies')->get()->sortByDesc(function($industry) {
            return count($industry->companies);
        });

        $no_industry_count = Company::has('industry', '=', 0)->count();

        $view->with(compact('industries', 'no_industry_count'));
    }
}
<?php
namespace App\Http\ViewComposers;

use App\Company;
use App\Contact;
use Illuminate\View\View;
/**
* Company sidebar filter.
*/
class CompanySidebarFilter
{
	/**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $companies = Company::has('contacts')->get()->sortByDesc(function($company) {
            return count($company->contacts);
        });

        $no_company_count = Contact::has('company', '=', 0)->count();

        $view->with(compact('companies', 'no_company_count'));
    }
}
<?php

namespace App\Http\Controllers;

use App\Company;
use App\Contact;
use App\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;

class CompaniesFilterController extends CompanyController
{
    /**
      * Filter companies by tag.
     */
    public function filterWithoutTags()
    {
        $companies = Company::has('tags', '=', 0)->orderBy('updated_at', 'DESC')->paginate(10);
        
        return view('companies.index', compact('companies'))->with(['context' => $this->context]);
    }

    /**
     * Filter contacts by tag.
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function filterByTag($id)
    {
        $companies = Company::whereHas('tags', function ($query) use ($id) {
                $query->where('id', '=', $id);
            })->orderBy('updated_at', 'DESC')->paginate(10);

        // @TODO implement no_industry
        return view('companies.index', compact('companies'))->with(['context' => $this->context]);
    }
}

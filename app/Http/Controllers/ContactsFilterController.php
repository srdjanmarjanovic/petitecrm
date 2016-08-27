<?php

namespace App\Http\Controllers;

use App\Company;
use App\Contact;
use App\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;

class ContactsFilterController extends ContactController
{
    public function filterWithoutCompany()
    {
        $contacts = Contact::has('company', '=', 0)->orderBy('updated_at', 'DESC')->paginate(10);

        $companies = Company::has('contacts')->get()->sortByDesc(function($company) {
            return count($company->contacts);
        });

        $no_company_count = $contacts->count();

        return view('contacts.index', compact('contacts', 'companies', 'no_company_count'))->with(['context' => $this->context]);
    }

    public function filterWithoutTags()
    {
        $contacts = Contact::has('tags', '=', 0)->orderBy('updated_at', 'DESC')->paginate(10);

        $companies = Company::has('contacts')->get()->sortByDesc(function($company) {
            return count($company->contacts);
        });

        $no_company_count = Contact::has('company', '=', 0)->count();
        
        return view('contacts.index', compact('contacts', 'companies', 'no_company_count'))->with(['context' => $this->context]);
    }

    /**
     * Filter contacts by company.
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function filterByCompany($id)
    {
        $contacts = Contact::where('company_id', $id)->orderBy('updated_at', 'DESC')->paginate(10);

        return view('contacts.index', compact('contacts'))->with(['context' => $this->context]); 
    }

    /**
     * Filter contacts by tag.
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function filterByTag($id)
    {
        $contacts = Contact::whereHas('tags', function ($query) use ($id) {
                $query->where('id', '=', $id);
            })->orderBy('updated_at', 'DESC')->paginate(10);

        return view('contacts.index', compact('contacts'))->with(['context' => $this->context]);
    }
}

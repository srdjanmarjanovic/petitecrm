<?php

namespace App\Http\Controllers;

use App\Company;
use App\Contact;
use App\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;

class ContactsFilterController extends Controller
{
    /**
     * Filter contacts by company.
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function filterByCompany($id)
    {
        $contacts = Contact::where('company_id', $id)->orderBy('updated_at', 'DESC')->paginate(10);

        $companies = Company::has('contacts')->get()->sortByDesc(function($company) {
            return count($company->contacts);
        });

        $tags = Tag::has('contacts')->get()->sortByDesc(function($tag) {
            return count($tag->contacts);
        });

        return view('contacts.index', compact('contacts', 'companies', 'tags'));
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

        $companies = Company::has('contacts')->get()->sortByDesc(function($company) {
            return count($company->contacts);
        });

        $tags = Tag::has('contacts')->get()->sortByDesc(function($tag) {
            return count($tag->contacts);
        });

        return view('contacts.index', compact('contacts', 'companies', 'tags'));
    }
}

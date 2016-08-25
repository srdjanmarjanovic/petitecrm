<?php

namespace App\Http\Controllers;

use App\Company;
use App\Contact;
use App\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;

class ContactsFilterController extends Controller
{
    public function filterWithoutCompany()
    {
        $contacts = Contact::has('company', '=', 0)->orderBy('updated_at', 'DESC')->paginate(10);

        $companies = Company::has('contacts')->get()->sortByDesc(function($company) {
            return count($company->contacts);
        });

        $tags = Tag::has('contacts')->get()->sortByDesc(function($tag) {
            return count($tag->contacts);
        });

        $no_company_count = $contacts->count();
        $no_tag_count = Contact::has('tags', '=', 0)->count();

        return view('contacts.index', compact('contacts', 'companies', 'tags', 'no_tag_count', 'no_company_count')); 
    }

    public function filterWithoutTags()
    {
        $contacts = Contact::has('tags', '=', 0)->orderBy('updated_at', 'DESC')->paginate(10);

        $companies = Company::has('contacts')->get()->sortByDesc(function($company) {
            return count($company->contacts);
        });

        $tags = Tag::has('contacts')->get()->sortByDesc(function($tag) {
            return count($tag->contacts);
        });

        $no_company_count = Contact::has('company', '=', 0)->count();
        $no_tag_count = $contacts->count();
        
        return view('contacts.index', compact('contacts', 'companies', 'tags', 'no_tag_count', 'no_company_count')); 
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

        $companies = Company::has('contacts')->get()->sortByDesc(function($company) {
            return count($company->contacts);
        });

        $tags = Tag::has('contacts')->get()->sortByDesc(function($tag) {
            return count($tag->contacts);
        });

        $no_company_count = Contact::has('company', '=', 0)->count();
        $no_tag_count = Contact::has('tags', '=', 0)->count();

        return view('contacts.index', compact('contacts', 'companies', 'tags', 'no_tag_count', 'no_company_count')); 
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

        $no_company_count = Contact::has('company', '=', 0)->count();
        $no_tag_count = Contact::has('tags', '=', 0)->count();

        return view('contacts.index', compact('contacts', 'companies', 'tags', 'no_tag_count', 'no_company_count')); 
    }
}

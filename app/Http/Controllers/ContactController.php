<?php

namespace App\Http\Controllers;

use App\Company;
use App\Contact;
use App\Http\Requests\CreateContactRequest;
use App\Http\Requests\EditContactRequest;
use App\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;

class ContactController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $contacts = Contact::orderBy('updated_at', 'desc')->paginate(10);
        $companies = Company::take(5)->get();
        $tags = Tag::take(5)->get();

        return view('contacts.index', ['contacts' => $contacts, 'companies' => $companies, 'tags' => $tags]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return view('contacts.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateContactRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateContactRequest $request)
    {
        $contact = new Contact();

        $contact->first_name = $request->get('first_name');
        $contact->last_name = $request->get('last_name');
        $contact->email = $request->get('email');
        $contact->phone = $request->get('phone');
        $contact->company_id = $request->get('company_id');
        $contact->role = $request->get('role');
        $contact->save();

        // @TODO attach tags
        // @TODO set note

        return redirect(route('contacts.all'))->withStatus(['class' => 'success', 'message' => 'Success message']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('contacts.show', ['contact' => Contact::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /** @var Contact $contact */
        $contact = Contact::findOrFail($id);

        /** @var Company[] $companies */
        $companies = Company::all();

        /** @var Tag[] $tags */
        $tags = Tag::all();

        return view('contacts.edit', compact('contact', 'companies', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditContactRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditContactRequest $request, $id)
    {
        /** @var Contact $contact */
        $contact = Contact::findOrFail($id);
        $contact->update($request->except(['_method', '_token']));

        return redirect(route('contact.single', $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /** @var Contact $contact */
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return back();
    }

    /**
     * Show the form for importing contacts.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showImportForm()
    {
        return view('contacts.import');
    }

    /**
     * Do import contacts.
     */
    public function doImport()
    {
        dd('implement this');
    }

    /**
     * @param $request
     */
    public function getFilterConditions($request)
    {
//        if (($filter = $request->get('filter')) && $ids = () ) {
//            if (in_array(strtolower($filter), ['company', 'tag'])) {
//                $conditions['filter'] = $filter;
//            }
//        }
    }
}

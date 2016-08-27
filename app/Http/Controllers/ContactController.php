<?php
namespace App\Http\Controllers;

use App\Company;
use App\Contact;
use App\Http\Requests\ManageContactRequest;
use App\Tag;
use Exception;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use LogicException;
use Symfony\Component\HttpFoundation\JsonResponse;

class ContactController extends Controller
{
    /**
     * @var string
     */
    protected $context = 'contacts';

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $contacts = Contact::orderBy('updated_at', 'desc')->paginate(10);

        return view('contacts.index', compact('contacts'))->with(['context' => $this->context]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        $tags = Tag::all();
        return view('contacts.create', compact('companies', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ManageContactRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ManageContactRequest $request)
    {
        $contact = Contact::create($request->except('_token', '_method'));

        if ($contact && $contact instanceof Contact) {
            return redirect(route('contacts.all'))->with('status', ['type' => 'success', 'message' => 'Contact added successfully!']);
        }

        return redirect()->back()->withErrors(['error' => '? Bummer! Something went wrong :(']);
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
     * @param ManageContactRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ManageContactRequest $request, $id)
    {
        /** @var Contact $contact */
        $contact = Contact::findOrFail($id);
        $contact->update($request->except(['_method', '_token', '_back']));

        $redirect = Input::get('_back',  route('contact.single', $id));

        return redirect($redirect);
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
        $back = Input::get('backpath') ? Input::get('backpath') : back();

        try {
            $result = $contact->delete();
            if (!$result) {
                throw new LogicException();
            }
        } catch(Exception $e) {
            return redirect($back)->withErrors('? Bummer! Something went wrong :(');
        }

        return redirect($back)->with('status', ['type' => 'success', 'message' => 'Contact deleted successfully!']);
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
}

<?php

namespace App\Http\Controllers;

use App\Company;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use App\Http\Requests\ManageCompanyRequest;

class CompanyController extends Controller
{
    /**
     * @var string
     */
    protected $context = 'companies';

   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::orderBy('updated_at', 'desc')->paginate(10);
        
        return view('companies.index', compact('companies'))->with(['context' => $this->context]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\ManageCompanyController  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ManageCompanyRequest $request)
    {
        $company = Company::create($request->except('_token', '_method'));

        if ($company && $company instanceof Company) {
            return redirect(route('companies.all'))->with('status', ['type' => 'success', 'message' => 'Company added successfully!']);
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
        $company = Company::findOrFail($id);

        return view('companies.show', compact('company'))->with(['context' => $this->context]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::findOrFail($id);

        return view('companies.edit', compact('company'))->with(['context' => $this->context]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /** @var Company $company */
        $company = Company::findOrFail($id);
        $back = !empty(Input::get('backpath')) ? Input::get('backpath') : route('companies.all');

        try {
            $result = $company->delete();
            if (!$result) {
                throw new LogicException();
            }
        } catch(Exception $e) {
            return redirect($back)->withErrors('? Bummer! Something went wrong :(');
        }

        return redirect($back)->with('status', ['type' => 'success', 'message' => 'Company deleted successfully!']);        
    }
}

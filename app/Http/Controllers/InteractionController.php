<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interaction;
use App\Contact;

use App\Http\Requests;

class InteractionController extends Controller
{
    /**
     * Get interactions for contact.
     *
     * @return \Illuminate\Http\Response
     */
    public function getInteractionsForContact($id)
    {
        $contact = Contact::find($id);
        if (!($contact instanceof Contact)) {
            throw new \Exception("Contact with ID {$id} does not exist");
        }

        $interactions = Interaction::where(function($query) use ($contact) {
                                 $query->where('sender_type', '=', Contact::class)
                                        ->where('sender_id', '=', $contact->id);
                             })      
                             ->orWhere(function($query) use ($contact) {
                                 $query->where('receiver_type', '=', Contact::class)
                                           ->where('receiver_id', '=', $contact->id);
                             })->get();
        return $interactions;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
}

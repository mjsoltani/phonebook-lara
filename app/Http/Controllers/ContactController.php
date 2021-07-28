<?php

namespace App\Http\Controllers;

use App\Http\Resources\ContactResource;
use App\Models\contact;
use App\Models\contacts;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param contact $contact
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json( 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Contact $contact)
    {
        $contact->create();
        return response()->json('created');
    }

    /**
     * Display the specified resource.
     *
     * @return ContactResource
     */
    public function show(contact $contact)
    {
        return new ContactResource($contact);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Contact $contact)
    {
        $contact->update();
        return response()->json(['message' =>'updated']);
    }

    /**
     * Remove the specified resource from storage.
     * @param contact $contact
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return response()->json(['message'=>'deleted'],200);
    }
    private function validateContact(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'phone'=>'required'
        ]);
    }
    public function getContactofgroup(Group $group)
    {
        $group->contacts()->create();
        return  ContactResource::collection($group->contacts);

    }
}

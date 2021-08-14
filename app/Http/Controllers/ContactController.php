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
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @param contact $contact
     * @param Group $group
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request, Contact $contact, Group $group)
    {
        $this->validateContact($request);
        $contact->create(
            [
                'name' => $request->name,
                'phone' => $request->phone,
                'description' => $request->description,
                'image' => $this->uploadImage($request),
                'is_admin' => $request->is_admin,
            ]
        );
        return response()->json('created');
    }

    /**
     * Display the specified resource.
     *
     * @param Group $group
     * @param contact $contact
     * @return ContactResource
     */
    public function show(Group $group, contact $contact)
    {
        return new ContactResource($contact);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param contact $contact
     * @param Group $group
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Contact $contact, Group $group)
    {
        $contact->update();
        return response()->json(['message' => 'updated']);
    }

    /**
     * Remove the specified resource from storage.
     * @param contact $contact
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Group $group, Contact $contact)
    {
        $contact->delete();
        return response()->json(['message' => 'deleted']);
    }

    private function validateContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'image' => 'required',
        ]);
    }

    public function getContactofgroup(Group $group)
    {

        return ContactResource::collection($group->contacts);

    }

    private function uploadImage($request)
    {
        return $request->hasfile('image')
            ? $request->image->store('public')
            :null;
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Resources\GroupCollection;
use App\Http\Resources\GroupResource;
use App\Models\Group;
use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        $groups= Group::paginate(20);
        $resource = GroupResource::collection($groups);
        return response()->json($resource);
    }
    public function show(Group $group)
    {
        return new GroupResource($group);
    }

    public function store(User $user,Request $request)
    {
        $this->validateGroup($request);
        $group = new Group();
        $group->user_id = $user->id;
        $group->name =  $request->name;
        $group->save();
        $contact_id = [];
        foreach ($request->contact_id as $contact)
        {
            $contact_id[] = $contact;
        }

        $group->contacts()->attach($contact_id);

//        $group->contacts()->createMany($request->contact_id);

        return response()->json
        (
            [
                'message' => 'create',
            ]
        );
    }

    public function update(Request $request,Group  $group)
    {
        $group= $group->update($request->all());
        return response()->json
        (
            [
                'message' => 'updated'
            ]
        );
    }
    public function destroy(Group  $group)
    {
        $group->delete();
        return response()->json
        (
            [
                'message' => 'deleted'
            ]
        );
    }

    private function validateGroup(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string',
                'contact_id'=> 'required|array'
            ]
        );
    }


}

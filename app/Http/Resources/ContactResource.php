<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return
            [
                'id'=> $this->id,
                'name'=> $this->name,
                'phone'=> $this->phone,
                'is_admin'=> $this->is_admin,
                $this->mergeWhen($request->with_contact==="true",
                    [
                        'group'=> GroupResource::collection($this->groups)
                    ])
            ];
    }
}

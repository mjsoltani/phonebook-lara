<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GroupResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return
        [
            'id' => $this->id,
            'name'=> $this->name,
            'user_id'=> $this->users,
            $this->mergeWhen($request->with_contact==="true",
            [
                'contact'=>new ContactResource($this->contact)
            ])
        ];
    }
}

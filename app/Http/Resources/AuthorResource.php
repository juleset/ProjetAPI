<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'firstname' => $this->firstname,
            'birthday' => $this->birthday,
            'death_date' => $this->death_date,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            //'books' => url("api/books/{$this->author_id}")
        ];
    }
}

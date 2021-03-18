<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
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
            'id' =>  $this->id,
            'name' =>  $this->name,
            'publish_date' => $this->publish_date,
            'status' =>  $this->status,
            'author' =>new AuthorResource($this->author),
            'category' => url("api/categories/{$this->category_id}"),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

        ];
    }
}

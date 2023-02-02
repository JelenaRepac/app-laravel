<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TVShowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap = 'tvShow';
    public function toArray($request)
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'description' => $this->resource->description,
            'studio' => $this->resource->studio,
            'presenter' => $this->resource->presenter
        ];
    }
}

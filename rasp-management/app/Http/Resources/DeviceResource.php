<?php

namespace App\Http\Resources;

use App\Models\Phrase;
use Illuminate\Http\Resources\Json\JsonResource;

class DeviceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'uuid' => $this->id,
            'playlist' => new PlaylistResource($this->playlist),
            'phrases' => PhrasesCollection::collection($this->phrases)
        ];
    }
}

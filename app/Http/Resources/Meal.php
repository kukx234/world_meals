<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\TagsResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\IngredientsResource;

class Meal extends JsonResource
{
    public function toArray($request)
    {
        $lang = $request->get('lang');

        $translated = $this->translate($lang);

        return [
            'id' =>$this->id,
            'title' => $translated->title,
            'description' => $translated->description, 
            'status'=> $this->status,
            'category' => new CategoryResource($this->whenLoaded('category')),
            'tags' => TagsResource::collection($this->whenLoaded('tag')),
            'ingredients' => IngredientsResource::collection($this->whenLoaded('ingredient')),
        ];
    }
}

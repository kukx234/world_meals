<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    
    public function toArray($request)
    {
        $lang = $request->get('lang');
        $translated = $this->translate($lang);

        return [
            'id' => $this->id,
            'title' => $translated->title,
            'slug' => $translated->slug,
        ];
    }
}

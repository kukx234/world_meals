<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\MealWith;

class MealRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'tag' => 'nullable|min:1',
            'category' => 'nullable|min:1',
            'lang' => 'required|in:hr,en',
            'with' => [
                'nullable',
                new MealWith, 
            ]
        ];
    }
}

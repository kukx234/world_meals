<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class MealWith implements Rule
{
    
    public function passes($attribute, $value)
    {
        $withs = explode(',', $value);
        
        foreach ($withs as $with) {
            if(!in_array($with, ['tag', 'ingredient', 'category'])){
                return false;
            }
        }
        return true;
    }

    
    public function message()
    {
        return 'Unsupported value for :attribute. Allowed values are: tag, ingredient, category';
    }
}
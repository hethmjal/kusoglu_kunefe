<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ArrayAtLeastOneRequired implements Rule
{
    public $quantity =[];
    
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($quantity)
    {
        
       // dd($quantity);
          $this->quantity = $quantity;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $quantity = $this->quantity;
        
   //  dd($quantity);
        if(!empty($quantity)){
        foreach ($quantity as $arrayElement) {
            if (isset($arrayElement)) {
                return true;
            }
        }
     }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'الرجاء اختيار منتج اولا ثم ادخال الكمية المطلوبة';
    }
}
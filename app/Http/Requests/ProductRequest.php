<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
         return [
            'descripcion'=>'required',
            'cantidad' => 'required|numeric|min:0',
            'precio_prov' => 'required|numeric|min:0',
            'precio_vent' => 'required|numeric|min:0',
            'categories_id' => 'required',
            'providers_id' => 'required',
            ];
        
    }
}

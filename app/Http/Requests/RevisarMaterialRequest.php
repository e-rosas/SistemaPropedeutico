<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RevisarMaterialRequest extends FormRequest
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
            'material_id' => 'required|integer',
            'estado' => 'required|integer',
            'comentarios' => 'max:500',
        ];
    }
}

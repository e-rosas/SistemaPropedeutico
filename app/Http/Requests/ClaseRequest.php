<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClaseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'materia' => 'required|max:255|min:1',
            'hora_inicio' => 'required',
            'hora_final' => 'required',
            'dias' => 'required|max:255|min:1',
            'salon' => 'required|max:255|min:1',
            'capacidad' => 'required|integer|min:1',
            'grupo_id' => 'required|integer',
            'materia_id' => 'required|integer',
            'docente_id' => 'required|integer',
        ];
    }
}

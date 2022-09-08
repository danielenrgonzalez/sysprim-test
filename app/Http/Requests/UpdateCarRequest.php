<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCarRequest extends FormRequest
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
            'model_id' => ['required', 'exists:App\Models\ModelOfBrand,id'],
            'plate' => ['required', 'string', 'max:255', 'exists:App\Models\Car'],
            'year' => ['required'],
            'color' => ['required'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'model_id' => 'modelo',
            'plate' => 'placa',
            'year' => 'año',
            'color' => 'color',
        ];
    }
}

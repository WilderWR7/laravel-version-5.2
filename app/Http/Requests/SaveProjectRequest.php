<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'=> 'required',
            'url'=>['required','unique:projects'], //evita ingresar datos repetidos en la columan URL
            'description'=> ['required','min:5']
        ];
    }
    public function messages() {
        return [
            'title.required'=> __('El proyecto nesecita un titulo')
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class SaveProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // return Gate::allows('create-projects');
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // request()->route('project'); === $this->route('project')

        return [
            'title'=> 'required',
            'url'=>['required',
                Rule::unique('projects')->ignore($this->route('project')) //evita ingresar datos repetidos en la columan URL e ignora la regla cuando existe $project
            ],
            'category_id'=> [
                'required',
                'exists:categories,id'//verifica que la categoria exista en la base de datos
            ],
            'image'=> [
                request()->route('project')?'nullable':'required',
                // 'image',
                // 'dimensions:radio=16/9',
                // 'dimensions:width=600,height=400',
                // 'dimensions:min_width=600,min_height=400',
                // 'max:2000', tamaño maximo de 2mb
                'mimes:jpeg,png',
            ],
            'description'=> ['required','min:5'],

        ];
    }
    public function messages() {
        return [
            'title.required'=> __('El proyecto nesecita un titulo')
        ];
    }
}

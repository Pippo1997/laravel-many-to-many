<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required', Rule::unique('projects')->ignore($this->project), 'max:150'],
            'content' => ['nullable'],
            'type_id' => ['nullable', 'exists:types,id'],
            'technologies' => ['exists:technologies,id']
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Il titolo è richiesto',
            'title.unique' => 'E\ già presente questo titolo',
            'title.max' => 'Il titolo può essere lungo al massimo 150 cratteri',
            'type_id.exists' => 'Il Tipo selezionato non è valido',
            'technologies.exists' => 'La tecnologia selezionata non è valida'
        ];
    }
}

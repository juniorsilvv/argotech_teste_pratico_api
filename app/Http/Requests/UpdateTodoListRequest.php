<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTodoListRequest extends FormRequest
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
            'title' => [
                'required',
                function ($attr, $value, $fails) {
                    /**
                     * Colocando a primeira letra como maiuscula
                     */
                    $this->replace([$attr => ucwords($value)]);
                }
            ],
            'description' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Título da tarefa é obrigátorio',
            'description.required' => 'Descrição da tarefa é obrigátorio'
        ];
    }
}

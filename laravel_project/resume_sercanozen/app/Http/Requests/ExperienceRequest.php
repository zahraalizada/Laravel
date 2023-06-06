<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExperienceRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'date' => 'required|max:255',
            'task_name' => 'required|max:255',
            'company_name' => 'required|max:255'
        ];
    }


    public function messages()
    {
        return [
            'date.required' => "Calisma tarihi girilmesi zorunludur",
            'date.max' => "Calisma tarihi alani icin en fazla 255 karakter girebilirsiniz",
            'task_name.required' => "Pozisyon bilgisi girilmesi zorunludur",
            'task_name.max' => "Pozisyon alani icin en fazla 255 karakter girebilirsiniz",
            'company_name.required' => "Sirket ismi girilmesi zorunludur",
            'company_name.max' => "Sirket ismi alani icin en fazla 255 karakter girebilirsiniz"

        ];
    }
}

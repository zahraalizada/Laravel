<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EducationAddRequest extends FormRequest
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
            "education_date" => "required|max:255",
            "university_name" => "required|max:255",
            "university_branch" => "required|max:255",
        ];
    }

    public function messages()
    {
        return [
            'education_date.required' => "Egitim tarihi girilmesi zorunludur",
            'education_date.max' => "Egitim tarihi alani icin en fazla 255 karakter girebilirsiniz",
            'university_name.required' => "Universite adi girilmesi zorunludur",
            'university_name.max' => "Universite adi alani icin en fazla 255 karakter girebilirsiniz",
            'university_branch.required' => "Universite bolumu girilmesi zorunludur",
            'university_branch.max' => "Universite bolumu alani icin en fazla 255 karakter girebilirsiniz"

        ];
    }
}

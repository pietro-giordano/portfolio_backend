<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSkillRequest extends FormRequest
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
                  'name' => [
                        'required',
                        'min:6',
                        'max:255',
                        Rule::unique('skills')->ignore($this->skill->id)
                  ],
                  'description' => 'nullable|min:20|max:65000',
                  'logo' => 'nullable|image',
                  'documentation' => 'nullable|min:20|max:255'
            ];
      }
}

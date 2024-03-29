<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSkillRequest extends FormRequest
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
                  'name' => 'required|max:255|unique:skills,name',
                  'description' => 'nullable|min:20|max:65000',
                  'logo' => 'nullable|mimetypes:image/jpg,image/jpeg,image/svg,image/png,image/bmp',
                  'documentation' => 'nullable|min:20|max:255'
            ];
      }
}

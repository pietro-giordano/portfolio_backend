<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
                  'name' => 'required|min:6|max:255|unique:projects,name',
                  'description' => 'nullable|min:20|max:65000',
                  'video' => 'nullable|file|mimetypes:video/avi,video/mpeg,video/mp4',
                  'github' => 'nullable|min:20|max:255',
                  'skills' => 'nullable|array|exists:skills,id'
            ];
      }
}

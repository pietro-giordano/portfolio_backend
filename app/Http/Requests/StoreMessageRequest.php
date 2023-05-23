<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMessageRequest extends FormRequest
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
                  'name' => 'required|min:6|max:255',
                  'email' => 'required|email:rfc,dns|min:6|max:255',
                  'email_object' => 'nullable|min:6|max:255',
                  'mobile_country_code' => 'nullable|regex:/^[0-9+]+$/|min:2|max:10',
                  'mobile' => 'nullable|numeric|digits:10',
                  'message' => 'required|min:10|max:65000'
            ];
      }
}

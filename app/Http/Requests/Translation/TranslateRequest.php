<?php

namespace App\Http\Requests\Translation;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Response;

class TranslateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * if fail, will response forbidden error
     */
    public function authorize(): bool
    {
        $authorize = true;
        if($authorize)
        {
            return true;  
        }
        else
        {
            throw new HttpResponseException(response()->error("Forbidden",Response::HTTP_FORBIDDEN));
        }
        
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "text" => "required|string",
            "target" => "string",
        ];
    }

    /**
     * response first validation error message for api when validation fail
     * @param Validator $validator
     */
    public function failedValidation(Validator $validator)
    {
        $error = $validator->errors()->first();
        throw new HttpResponseException(response()->error($error,Response::HTTP_UNPROCESSABLE_ENTITY));
        
    }
}

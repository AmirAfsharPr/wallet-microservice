<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class MainRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    /**
     * @param Validator $validator
     * @return mixed
     */
    protected function failedValidation(Validator $validator): mixed
    {
        throw new HttpResponseException(
            response()->json([
                'status' => 'error',
                'status_code' => 400,
                'message' => 'اطلاعات ارسال شده معتبر نمی باشد!',
                'errors' => call_user_func_array('array_merge', array_values($validator->errors()->toArray()))
            ], 400)
        );
    }
}

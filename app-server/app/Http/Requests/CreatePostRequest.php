<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'titile' =>'required',
            'address' =>'required',
            'file' =>'required',
        ];
    }
    public function messages() {
        return [
            'titile.required' => '場所を入力してください。',
            'address.required' =>'住所を入力してください。',
            'file.required' =>'画像を選択してください。',
        ];
    }
}

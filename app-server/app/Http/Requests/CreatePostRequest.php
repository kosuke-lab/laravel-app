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
            'title' =>'required',
            'address' =>'required',
            'category_id' => 'required',
            'city_id'=> 'required',
           
        ];
    }
    public function messages() {
        return [
            'title.required' => '場所を入力してください。',
            'address.required' =>'住所を入力してください。',
            'category_id.required' => 'カテゴリーを選択してください。',
            'city_id.required' =>  '市区町村を選択してください。'
        ]; 
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateStoryRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'slug' => 'required|unique:stories',
            'name' => 'required'

        ];
    }
    public function messages(){
        return [
            'slug.required' => 'Slug không được để trống',
            'slug.unique'   => 'Slug này đã đã tồn tại',
            'name.required' => 'Tên Truyện không được bỏ trống',
        ];
    }
    public function attributes(){
        return [
            'name' => 'Tên truyện',
            'slug' => 'Slug truyện'
        ];
    }
}

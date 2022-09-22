<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateGenresRequest extends FormRequest
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
            'slug' => 'required|unique:genres',
            'name' => 'required|unique:genres'

        ];
    }
    public function messages(){
        return [
            'slug.required' => 'Slug không được để trống',
            'slug.unique'   => 'Thể loại đã tồn tại',
            'name.required' => 'Tên thể loại không được bỏ trống',
            'name.unique'   => 'Tên thể loại đã tồn tại'
        ];
    }
    public function attributes(){
        return [
            'name' => 'Tên thể loại',
            'slug' => 'Slug thể loại'
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchSizeRequest extends FormRequest
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
            'length_min' => 'required',
            'length_max' => 'required',
            'width_min' => 'required',
            'width_max' => 'required',
            'height_min' => 'required',
            'height_max' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'length_min.required' => 'Hãy nhập giá trị chiều dài nhỏ nhất',
            'length_max.required' => 'Hãy nhập giá trị chiều dài lớn nhất',
            'width_min.required' => 'Hãy nhập giá trị chiều rộng nhỏ nhất',
            'width_max.required' => 'Hãy nhập giá trị chiều rộng lớn nhất',
            'height_min.required' => 'Hãy nhập giá trị chiều cao nhỏ nhất',
            'height_max.required' => 'Hãy nhập giá trị chiều cao lớn nhất',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
            'name'=>'unique:vp_products,prod_name',
            'img' =>'image'
        ];
    }
    public function messages(){
        return [
            'name.unique'=> 'Sản phẩm đã tồn tại',
            'img'=>'Hình không hợp lệ'
        ];
    }
}

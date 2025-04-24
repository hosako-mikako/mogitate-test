<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
            'name' => ['required'],
            'price' => ['required', 'numeric', 'digits_between:0,10000'],
            'image' => ['nullable', 'mimes:png,jpeg'],
            'description' => ['required', 'max:120'],
            'season' => ['required', Rule::in(['spring', 'summer', 'autumn', 'winter'])],
            'seasons.*' => 'string|in:spring,summer,autumn,winter'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '商品名を入力してください',
            'price.required' => '値段を入力してください',
            'price.numeric' => '数値で入力してください',
            'price.digits_between:0,10000' => '0～10000円以内で入力してください',
            'image.required' => '商品画像を登録してください',
            'image.mimes:png,jpeg' => '「.png」または「.jpeg」形式でアップロードしてください',
            'description.required' => '商品説明を入力してください',
            'description.max:120' => '120文字以内で入力してください',
            'season.required' => '季節を選択してください',
            'season.in' => '正しい季節を選択してください'
        ];
    }
}

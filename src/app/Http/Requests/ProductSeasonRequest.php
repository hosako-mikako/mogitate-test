<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductSeasonRequest extends FormRequest
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
            'product_id' => ['required', 'integer', 'exists:products,id'],
            'season_id' => ['required', 'integer', 'exists:seasons,id']
        ];
    }

    public function messages()
    {
        return [
            'product_id.required' => '商品IDを選択してください',
            'product_id.integer' => '商品IDは整数でなければなりません',
            'product_id.exists' => '選択された商品IDは存在しません',
            'season_id.required' => '季節IDを選択してください',
            'season_id.integer' => '季節IDは整数でなければなりません',
            'season_id.exists' => '選択された季節IDは存在しません'
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'between:0,10000'],
            // 'image' => ['required', 'mimes:jpg,jpeg,png', 'max:2048'],
            'season_id' => 'required|array|min:1',
            'description' => ['required', 'string', 'max:120'],
        ];
    }
        public function messages()
    {
        return [
            'name.required' => '商品名を入力してください',
            'name.string' => '商品名を文字列で入力してください',
            'name.max' => '商品名を255文字以下で入力してください',
            'price.required' => '値段を入力してください',
            'price.numeric' => '数値で入力してください',
            'price.between' => '0~10000円以内で入力してください',
            // 'image.required' => '商品画像を登録してください',
            // 'image.mimes' => '「.png」または「.jpeg」形式でアップロードしてください',
            'season_id.required' => '季節を選択してください',
            'description.required' => '商品説明を入力してください',
            'description.string' => '商品説明を文字列で入力してください',
            'description.max' => '商品説明を120文字以下で入力してください',
        ];
    }
}

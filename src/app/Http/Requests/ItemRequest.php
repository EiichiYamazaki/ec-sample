<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Enum\ItemEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ItemRequest extends FormRequest
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
            'name'         => ['required', 'max:255'],
            'description'  => ['required', 'max:400'],
            'price'        => ['required', 'digits_between:1,10'],
            'is_published' => ['required', Rule::in(array_keys(ItemEnum::cases()))],
        ];
    }

    /**
     * messages
     * @return array
     */
    public function messages()
    {
        return [
            'name.required'         => ':attributeは必須です。',
            'name.max'              => ':attributeは255文字以下で入力してください。',
            'description.required'  => ':attributeは必須です。',
            'description.max'       => ':attributeは400文字以下で入力してください。',
            'price.required'        => ':attributeは必須です。',
            'price.digits_between'  => ':attributeは10桁以下で入力してください。',
            'is_published.required' => ':attributeは必須です。',
            'is_published.in'       => ':attributeを正しく入力してください。',
        ];
    }

    /**
     * attributes
     * @return array
     */
    public function attributes()
    {
        return [
            'name'         => '名前',
            'description'  => '説明',
            'price'        => '金額',
            'is_published' => '公開・非公開',
        ];
    }
}

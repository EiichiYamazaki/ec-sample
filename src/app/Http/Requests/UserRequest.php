<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class UserRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'name'            => ['required', 'string', 'max:255'],
            'email'           => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'        => ['required', 'confirmed', Rules\Password::defaults()],
        ];
    }

    /**
     * messages
     */
    public function messages(): array
    {
        return [
            'name.required'              => ':attributeは必須です。',
            'name.string'                => ':attributeは文字列で入力してください。',
            'name.max'                   => ':attributeは255文字以下で入力してください。',
            'email.required'             => ':attributeは必須です。',
            'email.string'               => ':attributeは文字列で入力してください。',
            'email.email'                => '正しいメールアドレスの形式で入力してください。',
            'email.max'                  => ':attributeは255文字以下で入力してください。',
            'email.unique'               => 'すでに登録済みのメールアドレスです。',
            'password.required'          => ':attributeは必須です。',
            'password.confirmed'         => '確認用のパスワードが間違っています。',
        ];
    }

    /**
     * attributes
     */
    public function attributes(): array
    {
        return [
            'name'            => '名前',
            'email'           => 'メールアドレス',
            'password'        => 'パスワード',
        ];
    }
}

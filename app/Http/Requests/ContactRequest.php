<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize()
    {
        // 認可を行う場合はtrueを返す
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
            'company' => 'nullable|string|max:255',
            'message' => 'required|string|max:1000',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '氏名は必須です。',
            'name.string' => '氏名は文字列でなければなりません。',
            'name.max' => '氏名は255文字以内で入力してください。',
            'email.required' => 'メールアドレスは必須です。',
            'email.email' => '有効なメールアドレス形式で入力してください。',
            'email.max' => 'メールアドレスは255文字以内で入力してください。',
            'company.string' => '会社名は文字列でなければなりません。',
            'company.max' => '会社名は255文字以内で入力してください。',
            'message.required' => '問い合わせ内容は必須です。',
            'message.string' => '問い合わせ内容は文字列でなければなりません。',
            'message.max' => '問い合わせ内容は1000文字以内で入力してください。',
        ];
    }
}


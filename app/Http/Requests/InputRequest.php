<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class InputRequest extends FormRequest
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
            'content' => 'required|max:255',
            'limit' => 'nullable|date_format:"Y-m-d H:i:s"|after:now',
        ];
    }

    /**
     * エラーメッセージ
     * @return array
     */
    public function messages()
    {
        return [
            'content.required' => 'タスクを入力してください',
            'content.string' => 'タスク内容が長すぎます',
            'limit.date_format' => '入力値のフォーマットが不正です(YYYY-MM-DD HH:MM:SS)',
            'limit.after' => '現在より後の日時を指定してください'
        ];
    }
}

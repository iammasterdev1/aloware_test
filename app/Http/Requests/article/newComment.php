<?php

namespace App\Http\Requests\article;

use Illuminate\Foundation\Http\FormRequest;

class newComment extends FormRequest
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
            'name' => 'required' ,
            'article_id' => 'required|exists:articles,id' ,
            'comment' => 'required' ,
            'reply_to' => 'exists:comments,id'

        ];
    }
}

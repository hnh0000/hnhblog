<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CommentRequest extends FormRequest
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
        $rules = [];
        $article_id = $this->article_id;

        // 添加评论
        if ($this->routeIs('comments.store')) {
            $rules = [
                'article_id' => ['required', 'exists:articles,id'],
                // p_id 必须与 r_id 一同出现，并且 p_id 必须存在于 comment 数据库中,并且 article_id 等于传过来的 article_id
                'p_id' => ['required_with:r_id',
                    Rule::exists('comments','id')->where(function ($query) use ($article_id) {
                        $query->where('article_id', $article_id)->where('p_id', 0);
                    }),
                ],
                'r_id' => ['required_with:p_id', 'exists:users,id'],
                'content' => ['required', 'string', 'between:0,5000'],
            ];
        }

        return $rules;
    }
}

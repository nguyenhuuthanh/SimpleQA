<?php


namespace App\Http\Requests\Api;


use App\Constants\QuestionStatus;

class QuestionStoreRequest extends ApiRequest
{
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'content' => 'required|max:255',
            'status' => 'required|in:'.join(',', QuestionStatus::getValues()),
        ];
    }
}

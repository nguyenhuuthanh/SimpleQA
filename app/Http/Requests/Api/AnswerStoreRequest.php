<?php


namespace App\Http\Requests\Api;


use App\Constants\AnswerStatus;

class AnswerStoreRequest extends ApiRequest
{
    public function rules()
    {
        return [
            'answer' => 'required',
            'question_id' => 'required',
            'status' => 'required|in:'.join(',', AnswerStatus::getValues()),
        ];
    }
}

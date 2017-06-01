<?php


namespace App\Http\Requests\Api;

use App\Constants\AnswerStatus;

class AnswerUpdateRequest extends AnswerStoreRequest
{
    public function rules()
    {
        return [
            'answer' => 'required',
            'status' => 'required|in:'.join(',', AnswerStatus::getValues()),
        ];
    }
}

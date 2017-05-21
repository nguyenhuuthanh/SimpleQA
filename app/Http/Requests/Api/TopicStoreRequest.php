<?php


namespace App\Http\Requests\Api;


class TopicStoreRequest extends ApiRequest
{
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'description' => 'required|max:255',
        ];
    }
}

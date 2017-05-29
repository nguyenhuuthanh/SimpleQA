<?php


namespace App\Constants;


use App\Helpers\Enum;

class QuestionStatus extends Enum
{
    const VISIBLE = 'visible';
    const CLOSED = 'closed';
    const DRAFT = 'draft';
}

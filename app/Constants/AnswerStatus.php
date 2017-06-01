<?php


namespace App\Constants;


use App\Helpers\Enum;

class AnswerStatus extends Enum
{
    const PENDING = 'pending';
    const APPROVED = 'approve';
    const DRAFT = 'draft';
    const DELETED = 'delete';
}

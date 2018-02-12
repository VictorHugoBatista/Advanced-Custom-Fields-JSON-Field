<?php

namespace VictorHugoBatista\AcfJsonField;

use VictorHugoBatista\AcfJsonField\Contracts\FieldBehavior;

class JsonField
{
    private $fieldBehavior;

    public function __construct(FieldBehavior $fieldBehavior)
    {
        $this->fieldBehavior = $fieldBehavior;
    }

    public function getField($fieldName, $postId = '')
    {
        return $this->fieldBehavior->getField($fieldName, $postId);
    }
}

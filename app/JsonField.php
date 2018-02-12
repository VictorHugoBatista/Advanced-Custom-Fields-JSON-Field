<?php

namespace VictorHugoBatista\AcfJsonField;

use VictorHugoBatista\AcfJsonField\Contracts\Field;

class JsonField
{
    private $fieldBehavior;

    public function __construct(Field $fieldBehavior)
    {
        $this->fieldBehavior = $fieldBehavior;
    }

    public function getField($fieldName, $postId = '')
    {
        return $this->fieldBehavior->getField($fieldName, $postId);
    }
}

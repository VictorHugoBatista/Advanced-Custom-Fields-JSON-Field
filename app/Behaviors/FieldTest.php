<?php

namespace VictorHugoBatista\AcfJsonField\Behaviors;

use VictorHugoBatista\AcfJsonField\Contracts\FieldBehavior;

class FieldTest implements FieldBehavior
{
    private $fields = [];

    public function __construct($fields)
    {
        $this->fields = $fields;
    }

    public function getField($fieldName, $postId = '')
    {
        if (! array_key_exists($fieldName, $this->fields)) {
            return false;
        }
        return $this->fields[$fieldName];
    }
}

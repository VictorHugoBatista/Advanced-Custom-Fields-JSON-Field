<?php

namespace VictorHugoBatista\AcfJsonField\Contracts;

interface FieldBehavior
{
    public function getField($fieldName, $postId = '');
}

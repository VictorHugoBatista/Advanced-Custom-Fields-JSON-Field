<?php

namespace VictorHugoBatista\AcfJsonField\Contracts;

interface Field
{
    public function getField($fieldName, $postId = '');
}

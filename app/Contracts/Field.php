<?php

namespace VictorHugoBatista\AcfJsonField\Contracts;

interface Field
{
    public function getField($field_name, $post_id = '');
}

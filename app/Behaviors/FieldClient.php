<?php

namespace VictorHugoBatista\AcfJsonField\Behaviors;

use VictorHugoBatista\AcfJsonField\Contracts\FieldBehavior;

class FieldClient implements FieldBehavior
{
    public function getField($fieldName, $postId = '')
    {
        if (! function_exists('get_field')) {
            return '';
        }
        $content = get_field($fieldName, $postId);
        if (! $content) {
            return '';
        }
        return $content;
    }
}

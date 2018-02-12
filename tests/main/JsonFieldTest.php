<?php

use VictorHugoBatista\AcfJsonField\JsonField;
use VictorHugoBatista\AcfJsonField\Behaviors\FieldMock;

class JsonFieldTest extends \PHPUnit\Framework\TestCase
{
    public function testClassJsonFieldExists()
    {
        $this->assertEquals(true, class_exists(JsonField::class));
    }

    public function testClassFieldMockExists()
    {
        $this->assertEquals(true, class_exists(FieldMock::class));
    }
}

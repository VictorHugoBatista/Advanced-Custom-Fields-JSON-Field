<?php

use VictorHugoBatista\AcfJsonField\JsonField;
use VictorHugoBatista\AcfJsonField\Behaviors\FieldTest;

class JsonFieldTest extends \PHPUnit\Framework\TestCase
{
    public function testClassJsonFieldExists()
    {
        $this->assertEquals(true, class_exists(JsonField::class));
    }

    public function testClassFieldTestExists()
    {
        $this->assertEquals(true, class_exists(FieldTest::class));
    }
}

<?php

use VictorHugoBatista\AcfJsonField\JsonField;
use VictorHugoBatista\AcfJsonField\Behaviors\FieldMock;

class JsonFieldTest extends \PHPUnit\Framework\TestCase
{
    private $jsonField;

    public function setUp()
    {
        parent::setUp();
        $this->jsonField = new JsonField(new FieldMock([
            'empty_field' => '',
            'one_level_field' => '{"test1":"Elgg zanga mzinga ning","test2":"zimbra ebay wesabe spotify, skype"}',
            'two_levels_field' => '{"test1":"Cotweet ning","test2":"nuvvo reddit twones lala","test4":{"subteste1":"elgg mog hojoki","subteste2":""}} ',
        ]));
    }

    public function testClassJsonFieldExists()
    {
        $this->assertEquals(true, class_exists(JsonField::class));
    }

    public function testClassFieldMockExists()
    {
        $this->assertEquals(true, class_exists(FieldMock::class));
    }

    public function testJsonFieldGetsContent()
    {
        $this->assertEquals([], $this->jsonField->getField('empty_field'));
    }
}

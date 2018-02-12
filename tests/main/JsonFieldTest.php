<?php

use VictorHugoBatista\AcfJsonField\JsonField;
use VictorHugoBatista\AcfJsonField\Behaviors\FieldMock;

class JsonFieldTest extends \PHPUnit\Framework\TestCase
{
    /**
     * Implementação de JsonField com mock.
     * @var VictorHugoBatista\AcfJsonField\JsonField
     */
    private $jsonField;

    /**
     * Inicializa o objeto $this->jsonField mockado.
     */
    public function setUp()
    {
        parent::setUp();
        $this->jsonField = new JsonField(new FieldMock([
            'empty_field' => '',
            'one_level_field' => '{"test1":"Elgg zanga mzinga ning","test2":"zimbra ebay wesabe spotify, skype"}',
            'two_levels_field' => '{"test1":"Cotweet ning","test2":"nuvvo reddit twones lala","test4":{"subteste1":"elgg mog hojoki","subteste2":""}} ',
        ]));
    }

    /**
     * Testa a existência da classe JsonField.
     */
    public function testClassJsonFieldExists()
    {
        $this->assertEquals(true, class_exists(JsonField::class));
    }

    /**
     * Testa a existência da classe FieldMock.
     */
    public function testClassFieldMockExists()
    {
        $this->assertEquals(true, class_exists(FieldMock::class));
    }

    /**
     * Testa se o método JsonField::getField retorna apenas arrays.
     * @dataProvider providerFieldNames
     */
    public function testJsonFieldGetsContent($fieldName, $_)
    {
        $content = $this->jsonField->getField($fieldName);
        $this->assertTrue(is_array($content));
    }

    /**
     * Testa se o método JsonField::getField retorna os dados corretamente.
     * @dataProvider providerFieldNames
     */
    public function testJsonFieldContentNumber($fieldName, $itemsCount)
    {
        $content = $this->jsonField->getField($fieldName);
        $this->assertEquals($itemsCount, count($content));
    }

    /**
     * Adiciona os nomes dos campos à serem checkados (e o número de subcampos).
     * @return array
     */
    public function providerFieldNames()
    {
        return [
            ['non_existent_field', 0],
            ['empty_field', 0],
            ['one_level_field', 2],
            ['two_levels_field', 3],
        ];
    }
}

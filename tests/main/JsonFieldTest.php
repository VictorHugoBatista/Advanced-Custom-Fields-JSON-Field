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
            'empty_field_2' => '[]',
            'two_registers_field' => '[{"title":"teste 1","value":"valor 1"},{"title":"teste 2","value":"valor 2"}]',
            'three_registers_field' => '[{"title":"teste 1","value":"valor 1"},{"title":"teste 2","value":"valor 2"},{"title":"teste 3","value":"valor 3"}]',
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
            ['empty_field_2', 0],
            ['two_registers_field', 2],
            ['three_registers_field', 3],
        ];
    }
}

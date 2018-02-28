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
            'acf_value_field' => '[{"test-1":"test 1"},{"test-1":"test 2"},{"test-1":"test 3"}]',
            'acf_option_field' => '[{"label":"test 1","slug":"test-1"},{"label":"test 2","slug":"test-2"}]',
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
     * @dataProvider providerFieldValues
     */
    public function testJsonFieldGetsContent($fieldName, $_)
    {
        $content = $this->jsonField->getField($fieldName);
        $this->assertTrue(is_array($content));
    }

    /**
     * Testa se o método JsonField::getField retorna os dados corretamente.
     * @dataProvider providerFieldValues
     */
    public function testJsonFieldContentNumber($fieldName, $values)
    {
        $content = $this->jsonField->getField($fieldName);
        $this->assertEquals(count($values), count($content));
    }

    /**
     * Testa o método JsonField::getField retorna o array corretamente.
     * @dataProvider providerFieldValues
     */
    public function testJsonFieldValues($fieldName, $values)
    {
        $content = $this->jsonField->getField($fieldName);
        $this->assertEquals($values, $content);
    }

    /*
     * Valores esperados nos testes dos campos mockados.
     */
    public function providerFieldValues()
    {
        return [
            ['non_existent_field', []],
            ['empty_field', []],
            ['empty_field_2', []],
            [
                'acf_value_field',
                [
                    ['test-1' => 'test 1'],
                    ['test-1' => 'test 2'],
                    ['test-1' => 'test 3'],
                ],
            ],
            [
                'acf_option_field',
                [
                    [
                        'label' => 'test 1',
                        'slug' => 'test-1',
                    ],
                    [
                        'label' => 'test 2',
                        'slug' => 'test-2',
                    ],
                ],
            ],
        ];
    }
}

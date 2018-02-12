<?php

namespace VictorHugoBatista\AcfJsonField\Behaviors;

use VictorHugoBatista\AcfJsonField\Contracts\FieldBehavior;

/**
 * Adiciona comportamento de mock à classe JsonField. O método
 * JsonField::GetField retorna os campos adicionados pelo construtor.
 * Uso:
 *   new JsonField(new FieldMock([
 *     'field_name_1' => '{}',
 *     'field_name_2' => '{"test1":"Elgg zanga mzinga ning","test2":"zimbra ebay wesabe spotify, skype"}',
 *   ]));
 * @package VictorHugoBatista\AcfJsonField\Behaviors
 */
class FieldMock implements FieldBehavior
{
    /**
     * Campos mockados.
     * @var array
     */
    private $fields = [];

    /**
     * Inicializa os campos mockados.
     * @param $fields
     */
    public function __construct($fields)
    {
        $this->fields = $fields;
    }

    /**
     * Retorna o conteúdo de um campo JSON.
     * @param string $fieldName Nome do campo.
     * @param string $postId Id do post (opcional).
     * @return array|string Conteúdo do campo JSON.
     */
    public function getField($fieldName, $postId = '')
    {
        if (! array_key_exists($fieldName, $this->fields)) {
            return '';
        }
        return $this->fields[$fieldName];
    }
}

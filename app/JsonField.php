<?php

namespace VictorHugoBatista\AcfJsonField;

use VictorHugoBatista\AcfJsonField\Behaviors\FieldClient;
use VictorHugoBatista\AcfJsonField\Contracts\FieldBehavior;

/**
 * Retorna os valores dos campos json. Utiliza as implementações de FieldBehavior.
 * @package VictorHugoBatista\AcfJsonField
 */
class JsonField
{
    /**
     * Comportamento do método $this->getField.
     * @var FieldBehavior
     */
    private $fieldBehavior;

    /**
     * Compoetamento padrão do método $this->getField.
     * @var string
     */
    private $fieldBehaviorDefault = FieldClient::class;

    /**
     * JsonField constructor.
     * @param FieldBehavior $fieldBehavior Comportamento do método $this->getField.
     */
    public function __construct(FieldBehavior $fieldBehavior = null)
    {
        $this->fieldBehavior =
            $fieldBehavior instanceof FieldBehavior ? $fieldBehavior : new $this->fieldBehaviorDefault;
    }

    /**
     * Retorna o conteúdo de um campo JSON.
     * @param string $fieldName Nome do campo.
     * @param string $postId Id do post (opcional).
     * @return array Conteúdo do campo JSON.
     */
    public function getField($fieldName, $postId = '')
    {
        $content = $this->fieldBehavior->getField($fieldName, $postId);
        return '' !== $content ? json_decode($content, true) : [];
    }
}

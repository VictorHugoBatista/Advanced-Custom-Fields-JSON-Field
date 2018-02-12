<?php

namespace VictorHugoBatista\AcfJsonField\Behaviors;

use VictorHugoBatista\AcfJsonField\Contracts\FieldBehavior;

/**
 * Adiciona o comportamento normal à classe JsonField,
 * retornando os campos armazenados no banco no método JsonField::GetField.
 * Uso: new JsonField(new FieldClient());
 * @package VictorHugoBatista\AcfJsonField\Behaviors
 */
class FieldClient implements FieldBehavior
{
    /**
     * Retorna o conteúdo de um campo JSON.
     * @param string $fieldName Nome do campo.
     * @param string $postId Id do post (opcional).
     * @return array|string Conteúdo do campo JSON.
     */
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

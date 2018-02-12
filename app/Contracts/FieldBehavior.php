<?php

namespace VictorHugoBatista\AcfJsonField\Contracts;

/**
 * Interface FieldBehavior
 * @package VictorHugoBatista\AcfJsonField\Contracts
 */
interface FieldBehavior
{
    /**
     * Retorna o conteúdo de um campo JSON.
     * @param $fieldName Nome do campo.
     * @param string $postId Id do post (opcional).
     * @return array Conteúdo do campo JSON.
     */
    public function getField($fieldName, $postId = '');
}

<?php

namespace StrehleDe\CamundaClient\Variable;
/**
 * Class CamundaDateVariable
 * @package StrehleDe\CamundaClient\Variable
 */
class CamundaDateVariable extends CamundaVariable
{
    /**
     * CamundaBooleanVariable constructor.
     * @param bool $value
     */
    public function __construct($value = '')
    {
        parent::__construct(CamundaVariable::TYPE_DATE, $value);
    }


    /**
     * @param mixed $value
     * @return CamundaVariable
     */
    public function setValue($value): CamundaVariable
    {
        return parent::setValue($value);
    }
}
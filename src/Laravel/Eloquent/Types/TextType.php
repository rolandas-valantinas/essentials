<?php

namespace JordanDobrev\Essentials\Laravel\Eloquent\Types;

use JordanDobrev\Essentials\Exceptions\Error;

/**
 * Class TextType
 *
 * @package JordanDobrev\Essentials\Laravel\Eloquent\Types
 */
class TextType extends Type
{
    /**
     * @var integer
     */
    public $min;

    /**
     * @var integer
     */
    public $max;

    /**
     * @param int $max
     *
     * @return $this
     */
    public function max(integer $max)
    {
        $this->max = $max;

        return $this;
    }

    /**
     * @param int $min
     *
     * @return $this
     */
    public function min(integer $min)
    {
        $this->min = $min;

        return $this;
    }

    function validate($attribute, $value)
    {
        if (!is_string($value)) {
            throw new Error(':attribute must be a string');
        }
    }
}

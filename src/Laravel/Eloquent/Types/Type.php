<?php

namespace JTDSoft\Essentials\Laravel\Eloquent\Types;

/**
 * Class Type
 *
 * @package JTDSoft\Essentials\Laravel\Eloquent\Types
 */
abstract class Type
{
    /**
     * @var bool
     */
    public $nullable = false;

    /**
     * @var
     */
    public $default;

    /**
     * @var bool
     */
    public $has_default = false;

    /**
     * @param bool $nullable
     *
     * @return $this
     */
    public function nullable(bool $nullable = true)
    {
        $this->nullable = $nullable;

        $this->default(null);

        return $this;
    }

    /**
     * @param mixed $default
     *
     * @return $this
     */
    public function default($default)
    {
        if (!is_null($default)) {
            $default = $this->cast($default);

            $this->validate('default value', $default);
        }

        $this->default     = $default;
        $this->has_default = true;

        return $this;
    }

    abstract public function validate($attribute, $value);

    public function cast($value)
    {
        return $value;
    }

    public function toPrimitive($value)
    {
        return $value;
    }
}

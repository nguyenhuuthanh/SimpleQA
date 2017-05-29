<?php
namespace App\Helpers;

use ReflectionClass;

/**
 * Enum implementation for PHP, alternative to \SplEnum.
 *
 * Uses reflection to get list of constants for a given enum subclass, but results are statically cached.
 */
abstract class Enum implements \JsonSerializable
{
    /**
     * Cache of the class constants
     * @var null
     */
    private static $constCacheArray = null;

    /**
     * Valid value, passed to Enum class. It matched with one of the class constants.
     * @var mixed
     */
    private $value;

    /**
     * Enum constructor.
     * @param mixed $value
     * @throws \UnexpectedValueException
     */
    public function __construct($value)
    {
        if (!static::isValidValue($value)) {
            throw new \UnexpectedValueException('Value not a const in enum ' . get_class($this));
        }

        $this->value = $value;
    }

    /**
     * Returns scalar value of this enum.
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Compares given enum value to another value
     * @param Enum|mixed $value A scalar value or another Enum to compare with
     * @return bool true if values are equal, false otherwise
     */
    public function equalsTo($value)
    {
        if (is_object($value) && $value instanceof Enum) {
            return $value->getValue() == $this->value;
        }
        return $value == $this->value;
    }

    /**
     * An array of all constants in this enum (keys are constant names).
     * @return array
     */
    public static function getConstants(): array
    {
        if (self::$constCacheArray == null) {
            self::$constCacheArray = [];
        }
        $calledClass = get_called_class();
        if (!array_key_exists($calledClass, self::$constCacheArray)) {
            $reflect = new ReflectionClass($calledClass);
            self::$constCacheArray[$calledClass] = $reflect->getConstants();
        }
        return self::$constCacheArray[$calledClass];
    }

    /**
     * Get all values
     *
     * @return array
     */
    public static function getValues()
    {
        return array_values(static::getConstants());
    }

    /**
     * Checks if given value is valid for this enum class.
     * @param mixed $value  A value to check
     * @param bool  $strict If strict comparison should be used or not
     * @return bool True of value is valid, false otherwise
     */
    public static function isValidValue($value, $strict = true): bool
    {
        $values = array_values(self::getConstants());
        return in_array($value, $values, $strict);
    }

    /**
     * Converts value to a string
     * @return string
     */
    public function __toString()
    {
        return (string)$this->value;
    }

    /**
     * @return string
     */
    public function jsonSerialize()
    {
        return $this->__toString();
    }
}

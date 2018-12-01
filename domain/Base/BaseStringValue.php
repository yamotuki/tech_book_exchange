<?php

namespace Domain\Base;

abstract class BaseStringValue
{
    private $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function rawValue(): string
    {
        return $this->value;
    }

    public function equals(BaseStringValue $another): bool
    {
        return $this->value === $another->rawValue();
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
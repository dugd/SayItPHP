<?php

namespace SayIt\Models;

class Language
{
    private $code;
    private $name;

    public static function getDefault()
    {
        return new self('uk', 'Ukrainian');
    }

    public function __construct($code, $name)
    {
        $this->name = $name;
        $this->code = $code;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getCode()
    {
        return $this->code;
    }
}

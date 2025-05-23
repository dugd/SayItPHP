<?php

namespace SayIt\Models;


class Alphabet
{
    private $id;
    private $name;
    private $languageCode;

    public function __construct($id, $name, $languageCode)
    {
        $this->id = $id;
        $this->name = $name;
        $this->languageCode = $languageCode;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getLanguageCode()
    {
        return $this->languageCode;
    }
}

<?php

namespace App\Charts\DataTypes;

class Date
{
    public $value;

    public function __construct(\DateTime $datetime)
    {
        $this->value = $datetime;
    }

    /**
     * Returns the javascript string used by the Google Charts API
     */
    public function getJsString()
    {
        // In JS months are 0 indexed
        return 'Date(' . $this->value->format('Y') . ', ' . ($this->value->format('m') - 1) . ', ' . $this->value->format('d') . ')';
    }
}

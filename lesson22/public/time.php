<?php

use JetBrains\PhpStorm\Pure;

class Time {

    protected $time = null;

    public function __construct($time = null)
    {
        $this->time = $time ?: time();
    }

    #[Pure] public function __toString(): string
    {
        return date('d/m/Y H:i:s', $this->time);
    }

    public function tomorrow(): Time
    {
        return new self($this->time + 24*60*60);
    }

    public function yesterday(): Time
    {
        return new self($this->time - 24*60*60);
    }
}

$today = new Time();

$today2 = new Time();


echo "<p>Hoy es {$today2}</p>";

$tomorrow = $today->tomorrow(); // $tomorrow es ahora un objeto de la clase Time

echo "<p>Mañana será {$tomorrow}</p>";

echo "<p>Pasado mañana será {$tomorrow->tomorrow()}</p>";

echo "<p>Ayer fue {$today->yesterday()}</p>";





